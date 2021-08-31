import collect from 'collect.js';
import ProviderBasePdf from './ProviderBasePdf';
import BackGroundWater from './../Img/BackGroundWater';

class ProviderOrderPaymentPdf extends ProviderBasePdf{

    table(headers=[], body, total, startY=100)
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
                fontSize : 10
            },
            tableWidth: 180,
            head: [
                ['#', 'Comprobante', 'Fecha', 'Número', 'Importe']
            ],
            body: body,
            foot : [['', '', '',  'Total a pagar', total]]
          })
    }

    toArray(data)
    {
        return collect(data).sortBy('number').map((d, index) => {
            return [
                index + 1,
                d.name,
                d.date,
                d.number,
                d.total 
            ]
            
        }).toArray();
    }

    structure_scaffold(data)
    {
        this.leftVerticalBorder();
        this.rightVerticalBorder();
        this.topBorder();
        this.bottomBorder();
        this.headerLeft();
        this.headerRight();
        this.invoice_type('O');
        this.dividerHeader();
        this.write_text(
            [
                'FECHA: ' + data.data.date
            ],
            true, //bold
            16, //size text
            110, //width posi.
            34, //heigh posi
            5
        );
        this.pdf.addImage(BackGroundWater.base_64(), 'PNG', 10, 110, 190, 100);
        this.code201();
        this.invoice_type_name('ORDEN DE PAGO', 'N° '+data.data.number);
        this.leftHeaderCompanyData(data.company);
        this.customer_data(data.data.provider_name, data.data.provider_address, data.data.provider_inscription, data.data.provider_number, 'null');
        this.rightHeaderCompanyData(data.company.cuit, data.company.iibb_conv, data.company.activity_init);
        this.horizontalLine(this.margin_left,this.first_line_height,this.margin_right,this.first_line_height);
        this.horizontalLine(this.margin_left,this.first_line_height+10,this.margin_right,this.first_line_height+10);
        //this.horizontalLine(this.margin_left,103,this.margin_right,103);
        this.addLogo((data.company.logo_base64));
        this.table(null, this.toArray(data.data.items), data.data.total,100) ;
    }

}

export default ProviderOrderPaymentPdf;