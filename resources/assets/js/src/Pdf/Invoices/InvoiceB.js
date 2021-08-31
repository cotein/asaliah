import QrAfip from '../QrAfip';
import InvoiceTypeB from "./InvoiceTypeB";
import collect from 'collect.js';
import LogoPiamond from '../Img/LogoPiamond';
import BackGroundWater from '../Img/BackGroundWater';

class InvoiceB extends InvoiceTypeB {

    constructor(BillCbteTipo){
        super()

        this.BillCbteTipo = BillCbteTipo;
        
    }

    invoice_details(data){

        let height_position = 103;
        let width_position = 0;
        let options = {};
        
        collect(data).each((item, index) => {
            /* console.log('produtos InvoiceB');
            console.log(item); */
            height_position = height_position + 5;
            width_position = 14;

            options = {
                lineHeightFactor : 1.2,
                maxWidth : 15,
                align : 'center'
            }
            this.pdf.text(item.quantity + '', width_position, height_position, options);

            width_position = 24;
            options = {
                lineHeightFactor : 1.2,
                maxWidth : 100,
                align : 'left'
            }
            this.pdf.text(item.product_name, width_position, height_position, options);
        
            width_position = 179;
            options = {
                lineHeightFactor : 1.2,
                maxWidth : 20,
                align : 'right'
            }
            let unit_price = ((parseFloat(item.neto_import) + parseFloat(item.iva_import) ) / parseInt(item.quantity));
            if (item.hasOwnProperty('unit_price_invoiceB')) {
                this.pdf.text(this.CurrencyFormat(item.unit_price_invoiceB) , width_position, height_position, options);
            }else{
                this.pdf.text(this.CurrencyFormat(unit_price) , width_position, height_position, options);
            }
 
            width_position = 200;
            options = {
                lineHeightFactor : 1.2,
                maxWidth : 23,
                align : 'right'
            }
            
            this.pdf.text(this.CurrencyFormat(item.total_raw), width_position, height_position, options);
            
            if ( height_position > 160 ) {
                this.heightPosition_add_page = false;
                this.pdf.addPage();
                height_position = 103;
            }
        });
    }

    structure_scaffold(data){
        let titles = ['ORIGINAL', 'DUPLICADO'];
        let titles_collection = collect(titles);
        let pageCount = 0;
        titles_collection.each((title, index_title) => {
            
            let items = collect(data.products);
            let split_collection = items.split(Math.ceil(items.count() / 16));
            /* console.log('split_collection');
            console.log('split_collection');
            console.log(split_collection); */
            
            split_collection.each((split, index) => {
                this.write_text(
                    [
                        'Pág. '+ parseInt(index + 1) + ' de ' + split_collection.count()
                    ],
                    false,
                    8,
                    155,
                    270,
                );
                //this.addLogo((data.company.logo_base64));
                this.pdf.addImage(LogoPiamond.base_64(), 'PNG', 10, 6, 77, 29);
                if (split_collection.count() == index + 1) {
                    
                    this.totals(data.totals);
                }
                let qr = new QrAfip(
                    1, //version qr
                    data.date,
                    data.company.cuit,
                    data.ptoVta,
                    data.docTipo,
                    data.cbte_desde,
                    this.total_invoice(data.totals),
                    'PES',
                    
                    //* //TODO :
                    //* 'Agregar el campo moneda_id' y cotización de la moneda en la tabla sale invoice
                    //*/
                    1, //cotización de la moneda 
                    data.customer_purchaser_document,
                    data.customer.id_number,
                    'E',
                    data.cae,
                    1, //version qr
                    data.date,
                    data.company.cuit,
                    data.ptoVta,
                    data.docTipo,
                    data.cbte_desde,
                    this.total_invoice(data.totals),
                    'PES',
                    
                    //TODO :
                    //* 'Agregar el campo moneda_id' y cotización de la moneda en la tabla sale invoice
                    //*/
                    1, //cotización de la moneda 
                    data.customer_purchaser_document,
                    data.customer.id_number,
                    'E',
                    data.cae);
                this.pdf.addImage(qr.generate_qr(), 'PNG', 10, 261, 35, 35);
                this.cae(data.cae, data.caeVto);
                this.leftVerticalBorder();
                this.rightVerticalBorder();
                this.topBorder();
                this.bottomBorder();
                this.headerLeft();
                this.headerRight();
                this.invoice_type(data.invoice_letter);
                this.dividerHeader();
                this.code201();
                this.pdf.addImage(BackGroundWater.base_64(), 'PNG', 10, 110, 190, 100);
                this.pay_condition();
                this.horizontalLine(this.margin_left,this.first_line_height,this.margin_right,this.first_line_height);
                this.horizontalLine(this.margin_left,this.first_line_height+10,this.margin_right,this.first_line_height+10);
                this.horizontalLine(this.margin_left,103,this.margin_right,103);
                this.horizontalLine(this.margin_left,103,this.margin_right,103);
                

                this.verticalLine(this.margin_left + 15, 103, this.margin_left + 15,  this.margin_bottom - (this.one_cm() * 4))
                this.verticalLine(this.margin_right - 42, 103, this.margin_right - 42,  this.margin_bottom - (this.one_cm() * 4))
                this.verticalLine(this.margin_right - 21, 103, this.margin_right - 21,  this.margin_bottom - (this.one_cm() * 4))

                this.internal_footer();
                /* console.log('data.customer');
                console.log(data.customer);
                console.log('data.customer'); */
                this.customer_data(data.customer.name, data.customer.address, data.customer.inscription, data.customer.id_number, data.docTipo);
                this.headers_invoice_data(data.bill_type);
                this.leftHeaderCompanyData(data.company);
                this.rightHeaderCompanyData(data.cuit, data.company.iibb_conv, data.company.activity_init);
                this.invoice_type_name(data.voucher, data.voucher_number, data.date);
                this.invoice_original(title);
                this.invoice_details(split);
                
                
                
                if (this.heightPosition_add_page) {
                    
                    this.pdf.addPage();
                }
                pageCount = this.pdf.internal.getNumberOfPages();
            });
        });

        this.pdf.deletePage(pageCount)
    }
}

export default InvoiceB;