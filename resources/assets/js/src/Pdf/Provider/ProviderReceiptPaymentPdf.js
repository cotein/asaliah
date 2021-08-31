import collect, { Collection } from 'collect.js';
import ProviderBasePdf from './ProviderBasePdf';
import BackGroundWater from './../Img/BackGroundWater';

class ProviderReceiptPaymentPdf extends ProviderBasePdf{

    constructor(){
        super();
        this.startY = 88;
    }
    
    tableOrder(headers=[], body, total, startY)
    {
        this.pdf.autoTable({
            startY : startY,
            theme: 'plain',
            columnStyles: { 4: { halign: 'right'} },
            headStyles: { 
                fillColor: [192,192,192],
                textColor: [255,255,255], 
            },
            footStyles : { 
                fillColor: [255,255,255],
                textColor: [0,0,0], 
                halign: 'right'
            },
            styles : {
                fontSize : 8
            },
            tableWidth: 180,
            head: [headers],
            body: body,
            foot : [['', '', '',  'Total a pagar', total]]
        });
    }

    tableCancelationDocument(headers, body, total, startY)
    {
        this.pdf.autoTable({
            startY : startY,
            theme: 'plain',
            columnStyles: { 6: { halign: 'right'} },
            headStyles: { 
                fillColor: [0,100,0],
                textColor: [255,255,255], 
            },
            footStyles : { 
                fillColor: [255,255,255],
                textColor: [0,0,0], 
                halign: 'right'
            },
            styles : {
                fontSize : 8
            },
            tableWidth: 180,
            head: [headers],
            body: body,
            foot : [['', '', '', '', '', 'Total a pagar', total]]
        });
    }

    orders(data)
    {
        let headers = [
            'ORDEN DE PAGO',
            'COMPROBANTE',
            'NÚMERO',
            'FECHA',
            'IMPORTE',
        ];

        let body = collect(data.orders).sortBy('number').map((o, index) => {
            
            return collect(o.invoices).map((invoice, i) => {
                return [
                    o.number,
                    invoice.voucher,
                    invoice.number,
                    invoice.date,
                    invoice.total,
                ];
            });
        }).flatten().toArray();
        this.tableOrder(headers, body, data.total_orders, this.startY )
        
    }

    cancelationDocument(data)
    {
        let cds = collect(data.cancelation_documents);

        let headers = [
            '#',
            'Tipo',
            'Banco',
            'Nùmero',
            'Propietario',
            'Venc.',
            'Importe'
        ];

        if (data.receipt_with_debt != null) {
            console.log('data.receipt_with_debt');
            console.log(data.receipt_with_debt);
            collect(data.receipt_with_debt).map((receipt, i) => {
                console.log('receipt');
                console.log(receipt);
                cds.push({
                    type : 'RECIBO',
                    bank : '---',
                    number : receipt.number,
                    owner : '---',
                    date : receipt.date,
                    import : receipt.total
                })
            });
        }

        
        let body = cds.sortBy('expirate_date').map((cd, index) => {
            return [
                index + 1,
                cd.type,
                cd.bank,
                cd.number,
                cd.owner,
                cd.expirate_date,
                cd.import
            ];
        }).toArray();
        console.log('body ///////////////////////////////////////');
        console.log(body);
        let total = cds.sum('total_raw');
        let count = cds.count();
        
        this.startY = this.startY + (count * 10) + 16;
        this.write_text(
            [
                'Documentos que cancelan el pago'
            ],
            true, //bold
            12, //size text
            15, //width posi.
            this.startY - 1.5, //heigh posi
            5
        );
        this.tableCancelationDocument(headers, body, data.total_paid, this.startY )
    }

    receiptWithDebt(receipts)
    {
        let rwd = collect(receipts);
        
        let headers = [
            '#',
            'Nùmero',
            'Fecha',
            'Importe'
        ];

        let body = rwd.map((r, index) => {
            return [
                index + 1,
                r.number,
                r.date,
                r.total
            ];
        }).toArray();
        
        let total = rwd.sum('total_raw');
        let count = rwd.count();
        
        this.startY = this.startY + (count * 10) + 16;
        this.write_text(
            [
                'Recibos de pago adeudados'
            ],
            true, //bold
            12, //size text
            15, //width posi.
            this.startY - 1.5, //heigh posi
            5
        );
        this.tableReceiptWithDebt(headers, body, total, this.startY );
    }

    toArray(data)
    {
        return collect(data).sortBy('number').map((i, index) => {
            return [
                index + 1,
                i.number,
                i.voucher,
                i.date,
                i.total 
            ]
            
        }).toArray();
    }

    diff_import(diff_import)
    {
        if (diff_import > 0) {
            let interline = 5;
            this.write_text(
                [
                    'RECIBO ADEUDADO - A SALDAR: ' + this.CurrencyFormat(diff_import)
                ],
                true,
                10,
                50,
                273,
                interline,
                {
                    maxWidth : 100
                }
            );
        }

        if (diff_import < 0) {
            let interline = 5;
            this.write_text(
                [
                    'SALDO A SU FAVOR: ' + this.CurrencyFormat(diff_import*-1)
                ],
                true,
                10,
                80,
                273,
                interline,
                {
                    maxWidth : 100
                }
            );
        }
    }

    structure_scaffold(data)
    {
        this.leftVerticalBorder();
        this.rightVerticalBorder();
        this.topBorder();
        this.bottomBorder();
        this.headerLeft();
        this.headerRight();
        this.invoice_type('R');
        this.dividerHeader();
        this.write_text(
            [
                'FECHA: ' + data.data.created_at
            ],
            true, //bold
            16, //size text
            110, //width posi.
            34, //heigh posi
            5
        );
        this.pdf.addImage(BackGroundWater.base_64(), 'PNG', 10, 110, 190, 100);
        this.code201();
        this.invoice_type_name('RECIBO DE PAGO', 'N° '+data.data.number);
        this.leftHeaderCompanyData(data.company);
        this.customer_data(data.data.provider_name, data.data.provider_address, data.data.provider_inscription, data.data.provider_number, 'null');
        this.rightHeaderCompanyData(data.company.cuit, data.company.iibb_conv, data.company.activity_init);
        this.horizontalLine(this.margin_left,this.first_line_height,this.margin_right,this.first_line_height);
        //this.horizontalLine(this.margin_left,this.first_line_height+10,this.margin_right,this.first_line_height+10);
        this.addLogo((data.company.logo_base64));
        this.orders(data.data) ;
        this.cancelationDocument(data.data);
    }

}

export default ProviderReceiptPaymentPdf;