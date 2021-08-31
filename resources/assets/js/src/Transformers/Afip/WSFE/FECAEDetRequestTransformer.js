import BaseTransformer from './../../BaseTransformer';
const PRODUCT = 1;

class FECAEDetRequestTransformer extends BaseTransformer{

    static Concepto(){
        return PRODUCT;
    }

    static DocTipo(data){

        switch (data) {
            case 'CUIT':
                return 80;
            
            case 'CUIL':
                return 86;
            
            case 'DNI':
                return 96;
        }
    }

    static DocNro(data){
        return data;
    }

    static CbteDesde(date){
        return date;
    }

    static CbteHasta(date){
        return date;
    }

    static CbteFch(date){
        return date;
    }

    static ImpTotal(ImpTotal){
        return parseFloat(ImpTotal).toFixed(2);
    }

    static ImpTotConc(){
        return 0;
    }

    static ImpNeto(data){
        return parseFloat(data).toFixed(2)
    }

    static ImpOpEx(data){

        if (data) {
            return parseFloat(data).toFixed(2);
        }
        return 0;
    }

    static ImpTrib(data){
        if (data) {
            return parseFloat(data).toFixed(2);
        }
        return 0;
    }

    static Tributos(data)
    {
        if (data) 
        {
            return data;
        }
        return '';
    }

    static ImpIVA(data){
        //return data.toFixed(2);
        return parseFloat(data).toFixed(2);
    }

    static FechServDesde(data){
        if (data) {
            return data;
        }
        return '';
    }

    static FechServHasta(data){
        if (data) {
            return data;
        }
        return '';
    }

    static FechVtoPago(data){
        return data;
    }
    
    static MonId(){
        return 'PES';
    }

    static MonCotiz(){
        return 1;
    }

    /**
     * 
     * @param {*} data 
     */
    static AlicIva(data){
        return data;
    }

    static CbtesAsoc(data)
    {
        return data;
    }

    /**
     * Prepara el array FECAEDetRequest
     * @param {*} data
     * @param {*} ImpTotal 
     * @param {*} ImpNeto 
     * @param {*} ImpIVA 
     * @param {*} AlicIva 
     * @param {*} isGeneralRegime 
     * @return un Array
     */
    static transformerData(data, ImpTotal, ImpNeto, ImpIVA, AlicIva, CbteTipo, CbtesAsoc, impoTotConc=0, ImpTrib=0, Tributos='' ){

        let cbteTipo = parseInt(CbteTipo, 10);
        /**
        * //TODO 'Mejorar como pasar los parámetros de 
        *'los importes
        */
        let dataTransformed = {
            Concepto      : this.Concepto(),//Concepto puede ser 1 productos, 2 servicios o 3 productos y servicios
            DocTipo       : this.DocTipo(data.customer.key_type),//Documento tipo: 80=CUIT | 96=DNI | 86=CUIL
            DocNro        : this.DocNro(data.customer.id_number),//Documento NÃºmero:CUIT
            CbteDesde     : this.CbteDesde(data.bill_number),//Comprobante desde
            CbteHasta     : this.CbteHasta(data.bill_number),//Comprobante hasta
            CbteFch       : this.CbteFch(data.bill_date),//Fecha del comprobante
            ImpTotal      : this.ImpTotal(ImpTotal),//Importe total: nng + ex + ng + todos los ivas + tributos
            ImpTotConc    : this.ImpTotConc(impoTotConc),//Importe neto NO gravado 
            ImpNeto       : (cbteTipo==11 || cbteTipo==12 || cbteTipo==13) ?  this.ImpTotal(ImpTotal) : this.ImpNeto(ImpNeto),//Importe neto gravado
            ImpOpEx       : this.ImpOpEx(),//Importe exento
            ImpTrib       : this.ImpTrib(ImpTrib),//Suma de los importes del Array Tributos
            ImpIVA        : (cbteTipo==11 || cbteTipo==12 || cbteTipo==13) ? 0 :  this.ImpIVA(ImpIVA),//Suma de los importes del Array IVA
            FchServDesde : this.FechServDesde(),//Fecha inicio del Servicio - Si se factura productos no es necesario
            FchServHasta : this.FechServHasta(),//Fecha fin del Servicio
            FchVtoPago   : this.FechVtoPago(data.bill_date_vto),//Fecha de Vencimiento de pago: Debe ser >= a la fecha del comprobante
            MonId         : this.MonId(),//Moneda del comprobante
            MonCotiz      : this.MonCotiz(),//CotizaciÃ³n de la moneda
            Tributos       : this.Tributos(Tributos),
            Iva           : (cbteTipo==11 || cbteTipo==12 || cbteTipo==13) ? '' : this.AlicIva(AlicIva),
            CbtesAsoc     : (cbteTipo==2 || cbteTipo==3 || cbteTipo==7 || cbteTipo==8 || cbteTipo==12 || cbteTipo==13 || cbteTipo==202 || cbteTipo==203) ? this.CbtesAsoc(CbtesAsoc) : ''
        }
        
        return dataTransformed;
    }

}

export default FECAEDetRequestTransformer;