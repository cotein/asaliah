export default {

    state : {
        list : []
    },

    mutations : {

        SET_RECEIPT_TO_PROVIDER_LIST(state, value)
        {
            state.list = value;
        }
    },

    getters : {

        ReceiptToProvidersListGetter(state)
        {
            return state.list;
        }
    }

}