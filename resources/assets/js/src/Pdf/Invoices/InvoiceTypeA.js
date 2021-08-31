
import InvoicePdf from "./InvoicePdf";

class InvoiceTypeA extends InvoicePdf {

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
                'P/UNIT.'
            ],
            true,
            7,
            this.first_column_text() * 7.6,
            this.first_line_height + 15,
            this.interline()
        );
        
        this.write_text(
            [
                'DES.'
            ],
            true,
            7,
            this.first_column_text() * 8.5,
            this.first_line_height + 15,
            this.interline()
        );
        
        this.write_text(
            [
                'IVA'
            ],
            true,
            7,
            this.first_column_text() * 9.2,
            this.first_line_height + 15,
            this.interline()
        );

        this.write_text(
            [
                'IMP. IVA'
            ],
            true,
            7,
            this.first_column_text() * 9.8,
            this.first_line_height + 15,
            this.interline()
        );

        this.write_text(
            [
                'TOTAL'
            ],
            true,
            7,
            this.first_column_text() * 10.8,
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

export default InvoiceTypeA;