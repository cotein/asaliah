export default {

    state : {
        //tipoClave
        purchaser_documents : []
        
    },

    mutations : {

        SET_PURCHASER_DOCUMENT(state, value)
        {
            state.purchaser_documents = value
        }
    },

    getters : {

        PurchaserDocuments(state)
        {
            return state.purchaser_documents;
        }
    }
}