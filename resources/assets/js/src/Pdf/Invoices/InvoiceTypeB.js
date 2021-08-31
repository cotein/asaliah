
import InvoicePdf from "./InvoicePdf";

class InvoiceTypeB extends InvoicePdf {

    headers_invoice_data(cbte_tipo){

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

        this.write_text(
            [
                'P/UNIT..'
            ],
            true,
            7,
            this.first_column_text() * 9.7,
            this.first_line_height + 15,
            this.interline()
        ); 
        
        this.write_text(
            [
                'TOTAL'
            ],
            true,
            7,
            this.first_column_text() * 11,
            this.first_line_height + 15,
            this.interline()
        );

        this.write_text(
            [
                'Cheques a la orden de: PIAMOND S.A.'
            ],
            true,
            10,
            this.first_column_text() - (this.one_cm() / 2),
            this.margin_bottom - (this.one_cm() * 2.5),
            this.interline()
        );
    }
}

export default InvoiceTypeB;