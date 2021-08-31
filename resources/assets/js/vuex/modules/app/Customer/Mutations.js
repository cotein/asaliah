const IVA_21 = 21;
const IVA_21_ID = 6;
const ZERO = 0;
const ONE = 1;

const mutations = {

    SET_PRODUCT_PRICE_LISTS(state, payload)
        {
            //carga las listas de precios de un producto
            state.sale.products[payload.index].product_id = payload.product_id;
            state.sale.products[payload.index].product_name = payload.product_name;
            state.sale.products[payload.index].price_list = payload.price_list;
            //state.sale.products[payload.index].sale_price = payload.sale_price;
        },

        SET_PRICE_TO_CUSTOMER_PRODUCT(state, payload)
        {
            state.sale.products[payload.index].pricelist_id = payload.pricelist_id;
            state.sale.products[payload.index].pricelist_name = payload.pricelist_name;
            state.sale.products[payload.index].sale_price = parseFloat(payload.sale_price);
        },


        SET_INITIAL_PRODUCTS(state)
        {
            state.sale.products = [
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
                    price_list : []
                }
            ]
        },

        SET_BILL_DATE(state, value){
            state.sale.bill_date = value.date;
            state.sale.bill_date_vto = value.vto;
        },

        SET_BILL_NUMBER(state, value){
            state.sale.bill_number = value;
        },

        SET_BILL_TYPE(state, value){
            state.sale.bill_type = value;
        },

        SET_NAME_CITY(state, value){
            state.sale.customer.address = 
            state.exist_customer.address.country + ' - ' +
            state.exist_customer.address.state + ' - ' +
            value + ' - ' +
            state.exist_customer.address.cp + ' - ' +
            state.exist_customer.address.domicilio;
        },

        SET_EXIST_CUSTOMER(state, value){
            
            state.exist_customer = value;
            
            state.sale.customer.name = state.exist_customer.name;
            state.sale.customer.id_number = state.exist_customer.number;
            state.sale.customer.key_type = state.exist_customer.purchaser_document;

            if (value.address != null) {
                
                state.sale.customer.address = 
                    state.exist_customer.address.country + ' - ' +
                    state.exist_customer.address.state + ' - ' +
                    state.exist_customer.address.city + ' - ' +
                    state.exist_customer.address.cp + ' - ' +
                    state.exist_customer.address.domicilio;
            }
        },

        SET_SALES_INVOICE(state, value){
            state.sales_invoice = value;
        },

        SET_SALE_TYPE(state, value){
            state.sale.type = value
        },

        SET_ID_NUMBER(state, value){
            state.sale.customer.id_number = value
        },

        SET_ADDRESS(state, value){
            state.sale.customer.address = value
        },

        SET_KEY_TYPE(state, value){
            state.sale.customer.key_type = value
        },

        ADD_PRODUCT_TO_INVOICE(state){
            state.sale.products.push(
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
                    price_list : []
                }
            );
        },

        DELETE_PRODUCT_TO_INVOICE(state, index){
            state.sale.products.splice(index, 1);
        },

        SET_PRODUCT_ID(state, data){
            state.sale.products[data.index].product_id = data.product_id 
        },

        SET_PRODUCT_NAME(state, data){
            state.sale.products[data.index].product_name = data.product_name 
        },

        SET_IVA_TO_INVOICE(state, data){
            state.sale.products[data.index].iva_name = data.iva;
        },

        SET_IVA_IMPORT(state, data){
            state.sale.products[data.index].iva_import = data.iva_import;
        },

        SET_QUANTITY(state, data){
            state.sale.products[data.index].quantity = data.quantity;
        },

        SET_SALE_PRICE(state, data){
            //state.sale.products[data.index].sale_price = data.sale_price;
            state.sale.products[data.index].sale_price = data.unit_price;
        },

        SET_DISCOUNT(state, data){
            state.sale.products[data.index].discount = data.discount;
        },

        SET_DISCOUNT_IMPORT(state, data){
            state.sale.products[data.index].discount_import = data.discount_import;
        },

        SET_IMPORTS(state, data){
            state.sale.products[data.index].discount_import = (state.sale.products[data.index].sale_price * state.sale.products[data.index].quantity) * state.sale.products[data.index].discount / 100;
            state.sale.products[data.index].neto_import = (state.sale.products[data.index].sale_price * state.sale.products[data.index].quantity) - state.sale.products[data.index].discount_import ;
            state.sale.products[data.index].iva_import = state.sale.products[data.index].neto_import * state.sale.products[data.index].iva_name / 100;
            state.sale.products[data.index].total_raw = state.sale.products[data.index].neto_import + state.sale.products[data.index].iva_import;
        },
        
        SET_NAME(state, value){
            state.sale.customer.name = value;
        },

        SET_ALICIVA(state, value){
            state.sale.alic_iva.push(value);
        },

        DELETE_EXIST_CUSTOMER(state){
            state.exist_customer = null;
            state.sale.customer.name = null;
            state.sale.customer.address = null;
            state.sale.customer.key_type = null;
            state.sale.customer.id_number = null;
        },

        SET_ERROR(state, value){
            state.error = value;
        },

        SET_PERCEP_IIBB(state, value)
        {
            state.sale.percep_iibb = value;
        }
}

export default mutations;