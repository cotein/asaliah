const mutations = {

    SET_LIST_PRODUCTS(state, value){
        state.products = value;
    },

    SET_PRICE_LISTS(state, value)
    {
        state.price_lists = value;
    },

    SET_ENABLE_PRICE_LISTS(state, value)
    {
        state.enable_price_lists = value;
    }
}

export default mutations;