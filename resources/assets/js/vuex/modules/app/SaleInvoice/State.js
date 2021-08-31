const IVA_21 = 21;
const IVA_21_ID = 5;
const ZERO = 0;
const ONE = 1;
const PTO_VTA = 1; //menconi 6

const state = {

    invoice : null,
    invoices : [
        {
            'id' : '',
            'cbte_tipo' : '',
            'pto_vta' : '',
            'nro' : '',
            'cuit' : '',
            'cbte_fch' : '',
            'name' : '',
            'neto' : '',
            'iva' : '',
            'items' : '',
            'total' : '',
            'total_raw' : '',
            'description' : {
                'detail' : '',
                'neto' : '',
                'iva' : '',
                'total' : '',
            }
        }
    ],
    cbtesAsoc : [],
    obs : ''
}

export default state;