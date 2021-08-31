import 'jspdf-autotable'
import jsPDF from 'jspdf';
import bwipjs from 'bwip-js';
import NumerosALetras from './NumerosALetras';
import { add } from 'lodash';

class BasePdf {

    constructor(){
        this.A4 = {
            orientation: 'p',
            unit: 'mm',
            format: 'a4',
            putOnlyUsedFonts:true,
            floatPrecision: 16 // or "smart", default is 16
        }
        /**
         * largo de la hoja A4 29,7 cm
         * largo del recuadro 27 cm
         * 10 % 2,7 cm
         * fuera de recuadro 2 cm
         */
        this.margin_left = 7;
        this.margin_right = 200;
        this.margin_top = 5;
        this.margin_bottom = 260;
        /**
         * first_line_height es después de customer data
         */
        this.first_line_height = 85;

        this.pdf = new jsPDF(this.A4);

    }
    

    leftVerticalBorder(){
        this.pdf.setLineWidth(0.5);
        this.pdf.line(this.margin_left, this.margin_top, this.margin_left, this.margin_bottom);
    }

    rightVerticalBorder(){
        this.pdf.setLineWidth(0.5);
        this.pdf.line(this.margin_right, this.margin_top, this.margin_right, this.margin_bottom);
    }

    topBorder(){
        this.pdf.setLineWidth(0.5);
        this.pdf.line(this.margin_left, this.margin_top, this.margin_right, this.margin_top);
    }

    bottomBorder(){
        this.pdf.setLineWidth(0.5);
        this.pdf.line(this.margin_left, this.margin_bottom, this.margin_right, this.margin_bottom);
    }

    first_header_height(){
        return this.margin_top * 11;
    }

    headerLeft(){
        this.pdf.line(this.margin_left,
        this.first_header_height(),
        this.middle_width(),
        this.first_header_height());
    }

    invoice_type(invoice_letter='Z'){
        this.pdf.setFontSize(20);
        this.pdf.setFontType("bold");
        this.pdf.text(invoice_letter,96.5, 12);
        this.pdf.rect(93, 5, 13, 10);
    }

    headerRight(){
        this.pdf.line(
            this.middle_width(),
            this.first_header_height(),
            this.margin_right,
            this.first_header_height()
        );
    }

    leftHeaderCompanyData(company){
        let size_text = 8;
        let interline = 5;
        let height_position = 38;

        let print_data = [
            'Razón social: ' + company.name,
            'Domicilio: ' + company.address,
            'Condición frente al IVA: ' + company.inscription
        ]

        print_data.forEach((element, index) => {
            this.write_text(
                [
                    element
                ],
                true,
                size_text,
                this.first_column_text() - 5,
                height_position,
                interline,
                {
                    maxWidth : 95
                }
            );
            
            if(index == 1)
            {
                height_position = height_position + 8;
            }else{
                height_position = height_position + interline;
            }
        });
        
    }

    rightHeaderCompanyData(cuit = 12345678, iibb = 'iibb', act = '22/04/1973'){
        this.write_text(
            [
                'CUIT: ' + cuit,
                'Ingresos Brutos: ' + iibb,
                'Fecha inicio de Actividades: ' + act
            ],
            true,
            8,
            105,
            41,
            5
        );
    }

    invoice_type_name(voucher = null, voucher_number = null, date){
        console.log('ppppppppppppppppppssssss');
        console.log(voucher,voucher_number,date);
        let voucher_width = this.pdf.getTextDimensions(voucher);
        let size_text = 16;
        if (voucher_width.w > 50) {
            size_text = 9;
        }
        this.write_text(
            [
                voucher,
            ],
            true, //bold
            size_text, //size text
            110, //width posi.
            18, //heigh posi
            5
        );

        this.write_text(
            [
                voucher_number,
            ],
            true,
            16,
            110,
            26,
            5
        );
        this.write_text(
            [
                'Fecha: ' + date,
            ],
            true,
            12,
            110,
            33,
            5
        );
    }

    invoice_original(text='ORIGINAL'){
        this.write_text(
            [
                text,
            ],
            false,
            8,
            110,
            11,
            5
        );
    }

    dividerHeader(){
        this.pdf.line(
            this.middle_width(),
            23,
            this.middle_width(),
            this.first_header_height()
        );
    }

    code201(){
        this.pdf.setFontSize(8);
        this.pdf.setFontType("normal");
        this.pdf.text('Código 201',92, 19);
        /* this.pdf.setFontSize(8);
        this.pdf.setFontType("bold");
        this.pdf.text('ORIGINAL',92.5, 22); */
    }
    customer_data(customer = null, address = null, iva = null, cuit = null, docTipo=null)
    {
        let address_customer = '';

        if(address instanceof Array) {
            address_customer = address[0];
        }else{
            address_customer = address;
        }

        let text = [
            'SEÑOR/ES: ' + customer,
            'DOMICILIO: ' + address_customer,
            'COND. IVA: ' + iva,
        ];

        this.pdf.setFontSize(10);
        this.pdf.setFontType("bold");

        let height_position = this.first_header_height() + 1.5;

        text.forEach((t, index) => {
            let dim = this.pdf.getTextDimensions(t);
            if (dim.w > 181) {
                let array_text = this.pdf.splitTextToSize(t, 181);

                array_text.forEach((line, i) => {
                    height_position = height_position + (i + 3);
                    this.pdf.text(line, this.first_column_text(), height_position);
                })
            }else{
                height_position = height_position + (index + 3);
                this.pdf.text(t, this.first_column_text(), height_position);
            }
        });
        /* this.write_text(
            [
                'SEÑOR/ES: ' + customer,
                'DOMICILIO: ' + address,
                'COND. IVA: ' + iva,
            ],
            true,
            10,
            this.first_column_text(),
            this.first_header_height() + 7,
            this.interline()
        ); */
        this.write_text(
            [
                docTipo + ': ' + cuit
            ],
            true,
            10,
            this.middle_width() + this.quarter_width() - this.one_cm(),
            this.first_header_height() + 7 + (this.interline() * 3), // 3 por que la ubico en la cuarta linea de texto
            this.interline()
        );

    }
    

    total_a_letras(value)
    {
        let NumLetras = new NumerosALetras;
        
        let txt = NumLetras.NumeroALetras(value, {
            plural: "PESOS",
            singular: "PESO",
            centPlural: "CENTAVOS",
            centSingular: "CENTAVO"
        });

        this.write_text(
            [
                'Son Pesos: ' + txt
            ],
            true,
            8,
            this.first_column_text() - (this.one_cm() / 2),
            this.margin_bottom - 2.5,
            this.interline()
        );
    }

    addImage(data){
        this.pdf.addImage(data, 'PNG', 50, 50);
    }

    CurrencyFormat(value) {
        return new Intl.NumberFormat('es-AR',
            {
                style:"currency",
                currency:"ARS", 
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
                useGrouping : true,
            }).format(parseFloat(value));
    }  

    /* base_64(photo){
        let canvas, ctx, dataURL, base64;
        canvas = document.createElement("canvas");
        let img = new Image();
        img.crossOrigin = 'Anonymous';

        img.src = photo;
        ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        dataURL = canvas.toDataURL("image/png");
        base64 = dataURL.replace(/^data:image\/png;base64,/, "");
        console.log(dataURL); 
        return dataURL;
    } */

    total_width(){
        return (this.margin_right - this.margin_left);
    }

    total_height(){
        return (this.margin_bottom - this.margin_top);
    }

    middle_width(){
        return  (this.total_width() / 2) + (this.margin_left / 2);
    }

    quarter_width(){
        return  this.middle_width() / 2;
    }

    middle_height(){
        return this.total_height() / 2;
    }

    quarter_height(){
        return  this.middle_height() / 2;
    }

    one_cm(){
        return 10;
    }

    horizontalLine(x1,y1,x2,y2, style='S'){
        this.pdf.line(x1,y1,x2,y2, style);
    }

    verticalLine(x1,y1,x2,y2, style='S'){
        this.pdf.line(x1,y1,x2,y2, style);
    }

    interline(value = 6){
        return value;
    }

    first_column_text(){
        return this.margin_left + this.one_cm();
    }

    addLogo(img){
        this.pdf.addImage(img, 'PNG', 10, 6, 77, 29);
    }
    /**
     * 
     * @param {*} array_text 
     * @param {*} bold 
     * @param {*} size_text 
     * @param {*} width_position 
     * @param {*} height_position 
     * @param {*} interline 
     * @param {*} options 
     */

    write_text(array_text, bold=false, size_text, width_position, height_position, interline, options = false){
        
        this.pdf.setFontSize(size_text);
        
        if (bold) {
            this.pdf.setFontType("bold");
        } else {
            this.pdf.setFontType("normal");
        }

        array_text.forEach((element, index) => {
            
            if (options) {
                this.pdf.text(element, width_position, height_position, options);
            }else{
                this.pdf.text(element, width_position, height_position);
            }
            height_position = height_position + interline;

        });
    }

    barcode(text){
        
        let canvas = document.createElement("canvas");

        try {
            bwipjs.toCanvas(canvas,
            {
                bcid:        'interleaved2of5',       // Barcode type
                text:        text,    // Text to encode
                height:      11,              // Bar height, in millimeters
                includetext: true,            // Show human-readable text
                textxalign:  'center',        // Always good to set this
            });
        } catch (e) {
            console.log(e);
        } 
       
        let imgData = canvas.toDataURL();

        this.pdf.addImage(imgData, 'PNG', 10, 280, 100, 9);
    }

    print(){
        this.pdf.save('a4.pdf');
    }

}

export default BasePdf;