import collect from 'collect.js';

export const updateTotalOnRowProduct = ({commit}, index) => {
    commit('NEW_ORDER_SET_TOTALS_FROM_PRODUCT', index);
}

export const calculeNetoAction = async ({state}) => {
    let products = collect(state.order.products);

    const total = products.reduce( (acc, item) => {
        return acc + parseFloat(item.unit_price * item.quantity);
    }); 

    return total;
}

export const calculeIvaImportAction = async ({state}) => {

    let products = collect(state.order.products);

    const total = products.reduce((acc, item) => {
        return acc + parseFloat(item.iva_import);
    });

    return total;
}

export const calculeDiscountAction = async ({state}) => {

    let products = collect(state.order.products);

    const total = products.reduce((acc, item) => {
        return acc + parseFloat(item.discount);
    });

    return total;
}

export const calculeTotalAction = async ({state}) => {

    let products = collect(state.order.products);

    const total = products.reduce((acc, item) => {
        return acc + parseFloat(item.total);
    });

    return total;
}