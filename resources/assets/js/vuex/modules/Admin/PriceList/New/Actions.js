export const priceListStore = async (context, payload) => {
    try {
        window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

        let price_list = await axios.post('/api/price_list/store', {
            price_list : payload.price_list,
        })

        return price_list;

    } catch (e) {
        throw e;
    }
}

export const priceListSetInitialStatus = (context) => {
    context.commit('NEW_PRICE_LIST_SET_NAME', null);
    context.commit('NEW_PRICE_LIST_SET_BENEFIT', null);
}

