const getters = {

    AttributesOfProductGetter(state){
        return state.product.attributes;
    },

    AttributeByNameGetter(state){
        return (index) => {
            return state.product.attributes[index].value;
        }
    },

    ProductGetter(state){
        return state.product;
    },

    SupplierGetter(state)
    {
        return state.product.supplier;
    },

    PriceProductGetter(state)
    {
        return state.product.price;
    },
}

export default getters;