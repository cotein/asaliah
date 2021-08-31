const getters = {

    ListProducts(state){
        return state.products;
    },

    GetPriceListsOfAProduct(state)
    {
        return state.price_lists;
    },

    GetEnablePriceList(state)
    {
        return state.enable_price_lists;
    }

}

export default getters;