const IVA_21 = 21;
const IVA_21_ID = 6;
const ZERO = 0;
const ONE = 1;
const PTO_VTA = 1; //menconi 6

const state = {

    exist_customer : null,
    error : null,
    sale : {
        percep_iibb : 0,
        bill_date : null,
        bill_date_vto : null,
        type : 'F',
        bill_type : null,
        bill_number : null,
        customer : {
            name : null,
            address : null,
            key_type : null,
            id_number : null
        },
        products : [
            {
                product_id : '',
                product_name : '',
                sale_price : '',
                quantity : ONE,
                iva_name : IVA_21,
                iva_id : IVA_21_ID,
                discount : ZERO,
                neto_import : ZERO,
                iva_import : ZERO,
                discount_import : ZERO,
                percep_iibb : ZERO,
                total_raw : ZERO,
                price_list : [],
                pricelist_id : '',
                pricelist_name : '',
            }
        ],
    
    }
}

export default state;