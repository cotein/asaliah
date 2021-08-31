export const CustomerValue = (state) => state.order.customer;

export const DateOrderGetter = (state) => state.order.date;

export const DeliveryDateOrderGetter = (state) => state.order.delivery_date;

export const ProductFromNewOrder = (state) => state.order.products;

export const NewOrderAtLeastIHaveOneProduct = (state) => state.order.products.length;

export const NewOrderUnitPriceProductGetter = (state) => {
    return (index) => {
        return state.order.products[index].unit_price;
    }
}

export const NewOrderProductValue = (state) => {
    return (index) => {
        return state.order.products[index].product;
    }
}

export const NewOrderQuantityProductGetter = (state) => {
    return (index) => {
        return state.order.products[index].quantity;
    }
}

export const NewOrderDiscountProductGetter = (state) => {
    return (index) => {
        return state.order.products[index].discount;
    }
}

export const NewOrderTotalProductGetter = (state) => {
    return (index) => {
        return state.order.products[index].total;
    }
}

export const NewOrderPriceListsProductGetter = (state) => {
    return (index) => {
        return state.order.products[index].price_lists;
    }
}

export const NewOrderPriceListGetter = (state) => {
    return (index) => {
        return state.order.products[index].price_list;
    }
}

export const NewOrderIvaOfProduct = (state) => {
    return (index) => {
        return state.order.products[index].iva;
    }
}

export const NewOrderDataGetter = (state) => {
    return state.order;
}

export const NewOrderIvaImportGetter = (state) => {
    return (index) => {
        return state.order.products[index].iva_import;
    }
}

export const NewOrderTotalsNeto = (state) => {
    return state.order.neto;
}

export const NewOrderTotalsIvaImportGetter = (state) => {
    return state.order.iva_import;
}

export const NewOrderTotalsDiscountGetter = (state) => {
    return state.order.discount;
}

export const NewOrderTotalsTotalGetter = (state) => {
    return state.order.total;
}