import collect from 'collect.js';
import BasePdf from '../BasePdf';
import LogoPiamond from '../Img/LogoPiamond';
class ReciboBasePdf extends BasePdf {
   
    table(headers, body, total, startY=this.one_cm() * 9.2)
    {

        this.pdf.autoTable({
            startY : startY,
            theme: 'plain',
            headStyles: { 
                fillColor: [0, 0, 0],
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
            foot : [['', '',  'Total', total]]
          })
    }

    sale_invoices_caption()
    {
        let interline = 5;
        this.write_text(
            [
                'COMPROBANTES DE VENTA'
            ],
            true,
            10,
            this.first_column_text() - 3,
            this.one_cm() * 9,
            interline,
            {
                maxWidth : 85
            }
        );
    }
    
    cancelation_documents_caption(top)
    {
        let interline = 5;
        this.write_text(
            [
                'COMPROBANTES DE CANCELACIÓN'
            ],
            true,
            10,
            this.first_column_text() - 3,
            top,
            interline,
            {
                maxWidth : 85
            }
        );
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
    
    structure_scaffold(data){
        
        this.leftVerticalBorder();
        this.rightVerticalBorder();
        this.topBorder();
        this.bottomBorder();
        this.headerLeft();
        this.headerRight();
        this.invoice_type('R');
        this.invoice_type_name('RECIBO', data.number);
        this.leftHeaderCompanyData(data.company);
        this.rightHeaderCompanyData();
        this.dividerHeader();
        this.code201();
        this.customer_data(data.customer.name, data.customer.address, data.customer.inscription, data.customer.cuit_number, data.customer.cuit);
        this.horizontalLine(this.margin_left,this.first_line_height,this.margin_right,this.first_line_height);
        this.sale_invoices_caption();
        this.cancelation_documents_caption(data.receipt_cancelation_documents.startY-2);
        this.table(data.receipt_invoices.headers, data.receipt_invoices.body, data.receipt_invoices.total);
        if (! collect(data.receipt_cancelation_documents).isEmpty()) {
            this.table(data.receipt_cancelation_documents.headers, data.receipt_cancelation_documents.body, data.receipt_cancelation_documents.total, data.receipt_cancelation_documents.startY);
        }
        this.diff_import(data.diff_import);
        
        this.pdf.addImage(LogoPiamond.base_64(), 'PNG', 10, 6, 77, 29);
        //this.addLogo((data.logo));
    }
}

export default ReciboBasePdf;
