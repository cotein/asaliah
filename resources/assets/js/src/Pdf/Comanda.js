import BasePdf from './BasePdf';
import collect from 'collect.js';
import Whathsapp from './Img/Whatsapp';
class Comanda extends BasePdf{

    constructor(){
        super();

        this.height = 6;
        this.x1_first_line = this.margin_top;
        this.x2_first_line = this.margin_right;
        this.x_position_text = 10;
        this.global_y_position = 10;
    }

    firstHorizontalLine()
    {
        this.horizontalLine(this.x1_first_line, this.global_y_position, this.x2_first_line, this.global_y_position);
    }
    
    first_row_text(customer='')
    {   
        let text = [
            {attr : 'CLIENTE: ', text : customer},
        ];

        let x_position=this.x_position_text; 
        this.global_y_position = this.global_y_position + 5

        collect(text).each((i, index)=>{
            
            this.write_text(
                [
                    i.attr + ' ' + i.text,
                ],
                true,
                8,
                x_position,
                this.global_y_position,
                5
            );
            x_position = x_position + this.x_position_text + 60;
        });
    }

    operator(op='')
    {   
        let text = [
            {attr : 'OPERADOR: ', text : op},
        ];

        let x_position=this.x_position_text; 
        this.global_y_position = this.global_y_position + 5

        collect(text).each((i, index)=>{
            
            this.write_text(
                [
                    i.attr + ' ' + i.text,
                ],
                true,
                8,
                x_position,
                this.global_y_position,
                5
            );
            x_position = x_position + this.x_position_text + 60;
        });
    }

    second_row_text(address='')
    {   
        let x_position=this.global_x_position + 5; 
        this.global_y_position = this.global_y_position + 5;
        
            this.write_text(
                [
                    'DOMICILIO: ' + address,
                ],
                true,
                8,
                this.x_position_text,
                this.global_y_position,
                5
            );
            x_position = x_position + this.x_position_text + 60;
    }

    third_row_text(cellphone, phone1, phone2, phone3, cv='')
    {   
        let x_position=this.global_x_position + 5; 
        this.global_y_position = this.global_y_position + 5;
        let condition = (cv != '') ? cv : '---';
            this.write_text(
                [
                    'TEL. : ' + cellphone +''+ phone1 +''+ phone2 +''+ phone3 + '  ' + 'CV: ' + condition,
                ],
                true,
                8,
                this.x_position_text,
                this.global_y_position,
                5
            );
            x_position = x_position + this.x_position_text + 60;
    }

    fourth_row_text(code, date, delivery_date, origin)
    {   
        this.global_y_position = this.global_y_position + 5;

        let text = [
            {attr : 'PEDIDO Nº: ', text : code},
            {attr : 'F. EMISIÓN: ', text : date},
            {attr : 'F. ENTREGA: ', text : delivery_date},
            {attr : 'ORIGEN: ', text : origin},
        ];

        let x_position=this.x_position_text; 
        
        collect(text).each((i, index)=>{
            
            this.write_text(
                [
                    i.attr + ' ' + i.text,
                ],
                true,
                8,
                x_position,
                this.global_y_position,
                5
            );
            x_position = x_position + this.x_position_text + 40;
        });
    }

    fifth_row_text(items)
    {
        let x_position=this.x_position_text; 
        
        this.global_y_position = this.global_y_position + 5;

        collect(items).each((i, index)=>{

            let txt_attributes_width = this.pdf.getTextWidth(i.product_attributes);

            let lines = txt_attributes_width / 190;

            let txt =  [
                'PRODUCTO: ' + i.product_name,  
                'ATRIBUTOS: ' + i.product_attributes,
                'CANTIDAD: ' + i.quantity,
            ];

            txt.forEach((element, index) => {
                if (lines > 1 && index == 2) {
                    this.global_y_position = this.global_y_position + 5;
                }

                this.pdf.text(element, x_position, this.global_y_position, {maxWidth : 190});

                this.global_y_position = this.global_y_position + 5;
            });
            
            //this.global_y_position = this.global_y_position + 5;
        });
    }

    comments(comments)
    {
        let x_position=this.x_position_text; 
        
        if (comments) {

            collect(comments).each((comment, index)=>{

                this.global_y_position = this.global_y_position + 5;
    
                this.write_text(
                    [
                        comment.description
                    ],
                    true,
                    8,
                    x_position,
                    this.global_y_position,
                    5,
                    {
                        maxWidth : 190
                    }
                );
                
            });
        }
    }

    secondHorizontalLine()
    {
        this.global_y_position = this.global_y_position + 7
        this.horizontalLine(this.x1_first_line, this.global_y_position, this.x2_first_line, this.global_y_position);
    }
    
    generate(data){
        
        if (Array.isArray(data)) {
            collect(data).each((d, index) => {
                this.firstHorizontalLine(this.x1_first_line, this.global_y_position, this.x2_first_line, this.global_y_position);
                this.first_row_text(d.customer);
                this.operator(d.op);
                this.second_row_text(d.address);
                this.third_row_text(d.cellphone, d.phone1, d.phone2, d.phone3, d.cv);
                this.fourth_row_text(d.code, d.emition_date, d.delivery_date, d.origin)    
                this.fifth_row_text(d.items);
                this.comments(d.comments);
                this.secondHorizontalLine(this.x1_first_line, this.global_y_position, this.x2_first_line, this.global_y_position);

                if(this.global_y_position > 250)
                {
                    this.pdf.addPage();

                    this.global_y_position = 10;
                }
            });
            
        }else{
            this.firstHorizontalLine(this.x1_first_line, this.global_y_position, this.x2_first_line, this.global_y_position);
            this.first_row_text(data.customer, data.cv, data.op);
            this.second_row_text(data.address);
            this.third_row_text(data.cellphone, data.phone1, data.phone2, data.phone3);
            this.fourth_row_text(data.code, data.emition_date, data.delivery_date, data.origin);    
            this.fifth_row_text(data.items);
            this.comments(data.comments);
            this.secondHorizontalLine(this.x1_first_line, this.global_y_position, this.x2_first_line, this.global_y_position);
        }
    }
}

export default Comanda;