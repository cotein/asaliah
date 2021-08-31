
import BasePdf from "./BasePdf";
import collect from 'collect.js';
import Whatsapp from './Img/Whatsapp';
import LogoPiamond from './Img/LogoPiamond';
import BackGroundWater from './Img/BackGroundWater';
import DeliveryReceipt from './Img/DeliveryReceipt';
import WarrantyCertificate from './Img/WarrantyCertificate';

class PedidoClientePdf extends BasePdf {
    
    constructor(){
        super()
    }

    customer_constant_text_data(customer = null, address = null, iva = null, cuit = null, cbte_tipo=null, doctTipo='CUIT', betweenStreets='', cellphone='', phone1='', phone2='', phone3=''){

        let streets = (betweenStreets == null) ? 'Sin informar' : betweenStreets;
        
        let text = [
            'SEÑOR/ES : ' + customer,
            'DOMICILIO : ' + address,
               //'Cond. IVA: ' + iva,
            'ENTRE CALLES : ' + streets
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
                    this.pdf.text(line, this.first_column_text(), height_position, {lineHeightFactor : 1.80});
                })
            }else{
                height_position = height_position + (index + 3);
                this.pdf.text(t, this.first_column_text(), height_position, {lineHeightFactor : 1.80});
            }
        });

        let tel = '';
        
        if(cellphone){
            tel = cellphone;
        }

        if(phone1){
            tel = tel + ' ' + phone1;
        }

        if(phone2){
            tel = tel + ' ' + phone2;
        }

        if(phone3){
            tel = tel + ' ' + phone3;
        }

        this.write_text(
            [
                'TEL.: ' + tel
            ],
            true,
            10,
            this.first_column_text(),
            this.first_header_height() + 7 + (this.interline() * 3), // 3 por que la ubico en la cuarta linea de texto
            this.interline(),
            {
                maxWidth : 131
            }
        );
        this.write_text(
            [
                doctTipo + ': ' + cuit
            ],
            true,
            10,
            this.middle_width() + this.quarter_width() - this.one_cm(),
            this.first_header_height() + 7 + (this.interline() * 3), // 3 por que la ubico en la cuarta linea de texto
            this.interline()

        );

        this.write_text(
            [
                'CANTIDAD'
            ],
            true,
            7,
            this.first_column_text() - 8,
            this.first_line_height + 15,
            this.interline()
        );

        this.write_text(
            [
                'DESCRIPCIÓN'
            ],
            true,
            7,
            this.first_column_text() * 3.5,
            this.first_line_height + 15,
            this.interline()
        );
    }

    details(split, customer_type_id){
        let height_position = 103;
        let width_position = 0;
        let options = {};

        collect(split).each((item, index) => {
            height_position = height_position + 5;
            width_position = 14;
            options = {
                lineHeightFactor : 1.7,
                maxWidth : 15,
                align : 'center'
            }
            this.pdf.text(item.quantity.toString(), width_position, height_position, options);

            //##### DESCRIPTION ######
            width_position = 24;
            options = {
                lineHeightFactor : 1.7,
                maxWidth : 150,
                align : 'left'
            }

            let product_name_width = this.pdf.getTextDimensions(item.product_name);
            let height_position_total = 0;
            let acumulate = 0;
            if (product_name_width.w > 145) {
                let array_text = this.pdf.splitTextToSize(item.product_name, 145);
                array_text.forEach((line, i) => {
                    this.pdf.text(line, width_position, height_position, options);
                    height_position = height_position + (i + 3);
                    acumulate = acumulate + i + 3
                });
                height_position_total = height_position - (acumulate);

            }else{
                this.pdf.text(item.product_name, width_position, height_position, options);
                height_position = height_position + (index + 3);
            }

            //##############################################
            
            width_position = 200;
            options = {
                lineHeightFactor : 1.7,
                maxWidth : 23,
                align : 'right'
            }
            
            this.pdf.text(item.total, width_position, height_position_total, options);

            if (customer_type_id == 1 && height_position > 160 ) {
                
                //this.pdf.addPage();
                height_position = 103;
            }
            if (customer_type_id == 2 && height_position > 200 ) {
                
                //this.pdf.addPage();
                height_position = 103;
            }
        });

    }

    internal_footer(){
        this.horizontalLine(
            this.margin_left, 
            this.margin_bottom - (this.one_cm() * 4),
            this.margin_right,
            this.margin_bottom - (this.one_cm() * 4),
        );

       /*  this.horizontalLine(
            this.margin_left, 
            this.margin_bottom - (this.one_cm() * 0.8),
            this.margin_right,
            this.margin_bottom - (this.one_cm() * 0.8),
        ); */
        
    }

    WhatsappNumber()
    {
        this.write_text(
            [
                'WHATSAPP - COMUNIQUESE CON NOSOTROS AL +54-9-11-6034-2181'
            ],
            true,
            8,
            this.first_column_text() - (this.one_cm() / 2),
            this.margin_bottom - 2.5,
            this.interline()
        );
    }

    addLogo(img){
        this.pdf.addImage(img, 'PNG', 10, 6, 77, 29);
    }

    structure_scaffold(data){
        let titles = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
        //let titles = ['ORIGINAL'];

            collect(titles).each((title, index_title) => {

                let items = collect(data.items);

                let coef_minorista = (data.customer_type_id == 1) ? 6 : 9;

                let split_collection = items.split(Math.ceil(items.count() / coef_minorista));
                
                split_collection.each((split, split_index)=>{
                    this.write_text(
                        [
                            'Pág. '+ parseInt(split_index + 1) + ' de ' + split_collection.count()
                        ],
                        false,
                        8,
                        155,
                        270,
                    );
                    //this.addLogo((data.company.logo_base64));
                    this.pdf.addImage(LogoPiamond.base_64(), 'PNG', 10, 6, 77, 29);
                    this.pdf.addImage(BackGroundWater.base_64(), 'PNG', 10, 110, 190, 100);
                    this.leftVerticalBorder();
                    this.rightVerticalBorder();
                    this.topBorder();
                    this.bottomBorder();
                    this.invoice_type('X');
                    this.headerLeft();
                    this.headerRight();
                    this.dividerHeader();
                    this.code201();
                    this.horizontalLine(this.margin_left,this.first_line_height,this.margin_right,this.first_line_height);
                    this.horizontalLine(this.margin_left,this.first_line_height+10,this.margin_right,this.first_line_height+10);
                    this.horizontalLine(this.margin_left,103,this.margin_right,103);
                    this.horizontalLine(this.margin_left,103,this.margin_right,103);
                        
                    this.verticalLine(this.margin_left + 15, 103, this.margin_left + 15,  this.margin_bottom - (this.one_cm() * 4))
                    this.verticalLine(this.margin_right - 21, 103, this.margin_right - 21,  this.margin_bottom - (this.one_cm() * 4))
                    
                    this.internal_footer();
                    let customer_betweenStreets = collect(data.customer_addresses).first(address => {
                        if (address.name == data.delivery_address) {
                            return address;
                        }
                    })

                    this.customer_constant_text_data(data.customer, data.pedido_delivery_address.name, data.customer_inscription_name, data.customer_document_number, null, data.customer_DocTipo, data.pedido_delivery_address.between_streets, data.customer_cellphone, data.customer_phone1, data.customer_phone2, data.customer_phone3);
                    this.leftHeaderCompanyData(data.company);
                    this.rightHeaderCompanyData(data.company.cuit, data.company.iibb_conv, data.company.activity_init);
                    this.invoice_type_name('REMITO', data.voucher_number, data.date);
                    this.invoice_original(title);
                    if (split_index == 0 && data.customer_type_id == 1 && index_title == 0) {
                            
                        this.WhatsappNumber();
                        this.pdf.addImage(Whatsapp.base_64(), 'PNG', 77, 180, 50, 50);
                    }
                    this.details(split, data.customer_type_id);
                    this.write_text(
                        (data.print_comments) ? collect(data.print_comments).toArray() : [],
                            false, 8, 10, 240, 5,
                            {
                                maxWidth : 187
                            }
                        );

                    if (data.customer_type_id == 1 && index_title > 0) {
                        
                        this.pdf.addImage(DeliveryReceipt.base_64(), 'PNG', 50, 155, 80, 80);
                        this.pdf.addImage(DeliveryReceipt.base_64(), 'PNG', 50, 155, 80, 80) ;
                    } 
                    if (data.customer_type_id == 1) {
                        
                    }
                    this.pdf.addPage();
                    
            });

        });

        this.pdf.addImage(WarrantyCertificate.base_64(), 'PNG', 10, 10, 190, 260);
        this.pdf.addImage(WarrantyCertificate.base_64(), 'PNG', 10, 10, 190, 260);
    }
}

export default PedidoClientePdf;