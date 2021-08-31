import state from "../State";

export const NEW_ORDER_SET_CUSTOMER = (state, value) => {
    state.order.customer = value;
}

export const NEW_ORDER_SET_DATE = (state, value) => {
    state.order.date = value;
}

export const NEW_ORDER_SET_DELIVERY_DATE = (state, value) => {
    state.order.delivery_date = value;
}

export const NEW_ORDER_ADD_NEW_ROW_PRODUCT = (state) => {
    state.order.products.push(
        {
            product : null,
            unit_price : 0,
            quantity : 1,
            iva : {
                id: 6,
                code: "5",
                name: "21%",
                percentage: "21",
            },
            iva_import : 0,
            neto : 0,
            discount : 0,
            total : 0,
            price_lists : [],
            price_list : null,
        }
    );
}

export const NEW_ORDER_SET_UNIT_PRICE_PRODUCT = (state, payload) => {
    state.order.products[payload.index].unit_price = payload.value;
}

export const NEW_ORDER_SET_QUANTITY_PRODUCT = (state, payload) => {
    state.order.products[payload.index].quantity = payload.value;
}

export const NEW_ORDER_SET_DISCOUNT_PRODUCT = (state, payload) => {
    state.order.products[payload.index].discount = payload.value;
}

export const NEW_ORDER_SET_PRODUCT = (state, payload) => {
    state.order.products[payload.index].product = payload.value;
}

export const NEW_ORDER_SET_PRICE_LISTS_OF_A_PRODUCT = (state, payload) => {
    state.order.products[payload.index].price_lists = payload.value;
}

export const NEW_ORDER_SET_PRICE_LIST = (state, payload) => {
    state.order.products[payload.index].price_list = payload.value;
}

export const NEW_ORDER_SET_PRICE_PRODUCT = (state, payload) => {
    state.order.products[payload.index].unit_price = payload.value;
}

export const NEW_ORDER_SET_IVA_OF_PRODUCT = (state, payload) => {
    state.order.products[payload.index].iva = payload.value;
}

export const NEW_ORDER_SET_IVA_IMPORT_OF_PRODUCT = (state, payload) => {
    state.order.products[payload.index].iva_import = state.order.products[payload.index].unit_price * state.order.products[payload.index].quantity * parseFloat(payload.percentage);
}

export const NEW_ORDER_SET_TOTALS_FROM_PRODUCT = (state, index) => {
    
    let product = state.order.products[index];

    product.neto = (product.unit_price * product.quantity) - product.discount;

    product.iva_import = product.neto * parseFloat(product.iva.percentage) / 100;

    product.total = parseFloat(product.neto) + parseFloat(product.iva_import);
}

export const NEW_ORDER_SET_TOTAL_PRODUCT = (state, payload) => {
    state.order.products[payload.index].total = payload.value;
}

export const NEW_ORDER_SET_NETO = (state, neto) => {
    state.order.neto = neto;
}

export const NEW_ORDER_SET_IVA_IMPORT = (state, iva_import) => {
    state.order.iva_import = iva_import;
}

export const NEW_ORDER_SET_DISCOUNT = (state, discount) => {
    state.order.discount = discount;
}

export const NEW_ORDER_SET_TOTAL = (state, total) => {
    state.order.total = total;
}

export const NEW_ORDER_DELETE_PRODUCT = (state, index) => {
    state.order.products.splice(index, 1);
}
