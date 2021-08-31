import QrAfip from '../QrAfip';
import BasePdf from "../BasePdf";
import collect from 'collect.js';
import BackGroundWater from '../Img/BackGroundWater';

class InvoicePdf extends BasePdf {
    
    constructor(BillCbteTipo){
        super()

        this.BillCbteTipo = BillCbteTipo;
        this.heightPosition_add_page = true;
    }
    
    pay_condition(condition = '', fch_vto = '')
    {
        /* this.write_text(
            [

                'REFERENCIA COMERCIAL: 49676' ,
                
            ],
            true,
            8,
            this.first_column_text(),
            80,
            5
        );

        this.write_text(
            [
                'CBU del Emisor: 0720050220000001317518  Alias CBU: FIGURA.OBOE.SOTANA'
            ],
            true,
            10,
            this.first_column_text(),
            this.first_line_height - 10.5,
            this.interline()
        ); */

        this.write_text(
            [
                //'Condición de Pago: Otros medios de pago habilitados por BCRA' 
                'Condición de Pago:'
            ],
            true,
            10,
            this.first_column_text() - 3.5,
            this.first_line_height + 6.5,
            this.interline()
        );

        this.write_text(
            [
                'Fecha de Vencimiento: ' 
            ],
            true,
            10,
            this.first_column_text() * 7.5,
            this.first_line_height + 6.5,
            this.interline()
        );
    }

    totals(totals){

        let height_position = this.margin_bottom - 40;
        this.pdf.setFontSize(12);
        this.pdf.setFontType("bold");

        collect(totals).each((total) => {
            height_position = height_position + 5;
            let options = {};
            
            options = {
                lineHeightFactor : 1.2,
                maxWidth : 100,
                align : 'right'
            }
            if (total instanceof Array) {
                if (total[0].value > 0) {
                    this.pdf.text(total[0].name , this.first_column_text() * 8.5, height_position, options);
                }
            }else{
                if (total.value > 0) {
                    this.pdf.text(total.name , this.first_column_text() * 8.5, height_position, options);
                }
            }
            
            options = {
                lineHeightFactor : 1.2,
                maxWidth : 100,
                align : 'right'
            }
            if (total instanceof Array) {
                if (total[0].value > 0) {
                    this.pdf.text(this.CurrencyFormat(total[0].value) , this.first_column_text() * 11.5, height_position, 
                    options);
                }
            }else{
                if (total.value > 0) {
                    this.pdf.text(this.CurrencyFormat(total.value) , this.first_column_text() * 11.5, height_position, 
                    options);
                }
            }
            
            if (total instanceof Array) {
                if (total[0].name == 'Total') {
                    this.total_a_letras(total[0].value);
                }
            }else{
                if (total.name == 'Total') {
                    this.total_a_letras(total.value);
                }
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

        this.horizontalLine(
            this.margin_left, 
            this.margin_bottom - (this.one_cm() * 0.8),
            this.margin_right,
            this.margin_bottom - (this.one_cm() * 0.8),
        );
        
    }
//
    generate_afip_code(cuit, cbte, ptovta, cae, fchvto){
        let text = cuit + cbte + '000'+ptovta + cae + fchvto;
        let dig_v = this.digVerificador(text);
        let barcode = text + dig_v;
        this.barcode(barcode);
    }

    cae(cae, cae_vto){
        this.pdf.setFontSize(8);
        let width_position = 155;

        let height_position = 282

        let options = {
            lineHeightFactor : 1.2,
            maxWidth : 50,
            align : 'left'
        }
        this.pdf.text('CAE: '+ cae, width_position, height_position, options);

        this.pdf.text('F. Vto. '+ cae_vto, width_position, height_position + 5, options);

    }

    digVerificador(digVerificador){
			/* 
				RUTINA PARA EL CALCULO DEL DIGITO VERIFICADOR
			    Se considera para efectuar el cálculo el siguiente ejemplo:
			    01234567890
			    Etapa 1: Comenzar desde la izquierda, sumar todos los caracteres ubicados en las posiciones impares.
			    0 + 2 + 4 + 6 + 8 + 0 = 20
			    Etapa 2: Multiplicar la suma obtenida en la etapa 1 por el número 3.
			    20 x 3 = 60
			    Etapa 3: Comenzar desde la izquierda, sumar todos los caracteres que están ubicados en las posiciones pares.
			    1 + 3 + 5+ 7 + 9 = 25
			    Etapa 4: Sumar los resultados obtenidos en las etapas 2 y 3.
			    60 + 25 = 85
			    Etapa 5: Buscar el menor número que sumado al resultado obtenido en la etapa 4 dé un número múltiplo de 10. Este será el valor del dígito verificador del módulo 10.
			    85 + 5 = 90
			    De esta manera se llega a que el número 5 es el dígito verificador módulo 10 para el código 01234567890
			    Siendo el resultado final:
			    012345678905

			    Código de barras que usa "Interleaved 2 of 5"

			    - C.U.I.T. (Clave Unica de Identificación Tributaria) del emisor (11 caracteres).
			    - Código de tipo de comprobante (2 caracteres).
			    - Punto de venta (4 caracteres).
			    - Código de Autorización de Impresión (14 caracteres).
			    - Fecha de vencimiento (8 caracteres). YYYYMMDD
			    - Dígito verificador (1 carácter).			
			*/
			let sumaPar=0;
			let sumaImpar=0;
			for (let i=0; i < digVerificador.length ; i++) { 
				if ((i+1) % 2 != 0) {
					sumaImpar=sumaImpar+Number(digVerificador[i]);
				}else{
					sumaPar=sumaPar+Number(digVerificador[i]);
				}
			}
			let etapa2 = sumaImpar*3;
			let etapa4=etapa2+sumaPar;

			for (let i=0; i < 10; i++) { 
				if ((etapa4+i) % 10==0) {			
					return i;
				}
			}

    }
    
    obs(obs)
    {
    }

    total_invoice(totals)
    {
        let result = [];
        collect(totals).map((i) => {
            console.log(i);
            collect(i).map((ii)=> {
                console.log('ii');
                console.log(ii);
                if (ii.name == 'Total') {
                    result.push(ii.value)
                }
            });
            
        });
        console.log(result);
        return result[0];
       
    }
    
}

export default InvoicePdf;