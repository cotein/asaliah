import moment from "moment";

class InvoiceTransformer {

    static zeroLeft (str, max) {
        str = str.toString();
        return str.length < max ? this.zeroLeft("0" + str, max) : str;
    }

    static docTipo(doc){
        switch (doc) {
            case 86:
                return 'CUIL';
                break;
        
            case 80:
                return 'CUIT';
                break;

            case 96:
                return 'DNI';
                break;
        }
    }

    static invoice_letter(letter){
        switch (letter) {
            case 1:
                return 'A';
                break;
        
            case 2:
                return 'A';
                break;

            case 3:
                return 'A';
                break;
            
            case 6:
                return 'B';
                break;
            
            case 7:
                return 'B';
                break;
            
            case 8:
                return 'B';
                break;
            
            case 11:
                return 'C';
                break;
            
            case 12:
                return 'C';
                break;
            
            case 13:
                return 'C';
                break;
            case 92:
                return 'A';
                break;
            
            case 93:
                return 'A';
                break;
            
            case 94:
                return 'A';
                break;
        }
    }

    static Voucher(CbteTipo, PtoVta, CbteDesde) {
        
        switch (CbteTipo) {
            case 1:
                return 'FACTURA';
                break;
        
            case 2:
                return 'NOTA DÉBITO';
                break;

            case 3:
                return 'NOTA CRÉDITO';
                break;
            
            case 6:
                return 'FACTURA';
                break;
            
            case 7:
                return 'NOTA DÉBITO';
                break;
            
            case 8:
                return 'NOTA CRÉDITO';
                break;
            
            case 11:
                return 'FACTURA';
                break;
            
            case 12:
                return 'NOTA DÉBITO';
                break;
            
            case 13:
                return 'NOTA CRÉDITO';
                break;
            case 92:
                return 'FACTURA';
                break;
            case 93:
                return 'NOTA DEBITO';
                break;
            case 94:
                return 'NOTA CREDITO';
                break;
        }
    }

    static Voucher_number(CbteTipo, PtoVta, CbteDesde) {
        
        return 'N° ' +  this.zeroLeft(PtoVta, 5) + ' - ' + this.zeroLeft(CbteDesde, 8);
    }

    static transformerData(afipResponse)
    {
        let cabResp = afipResponse.FeCabResp;
        let detResp = afipResponse.FeDetResp.FECAEDetResponse;
        
        let data = {
            invoice_letter : this.invoice_letter(cabResp.CbteTipo),
            docTipo : this.docTipo(detResp.DocTipo),
            cuit : cabResp.Cuit,
            voucher : this.Voucher(cabResp.CbteTipo, cabResp.PtoVta, detResp.CbteDesde),
            voucher_number : this.Voucher_number(cabResp.CbteTipo, cabResp.PtoVta, detResp.CbteDesde),
            date : moment(detResp.CbteFch).format("DD-MM-YYYY"),
            cae : detResp.CAE,
            caeVto : moment(detResp.CAEFchVto).format("DD-MM-YYYY"),
        }

        return data;
    }
}

export default InvoiceTransformer;