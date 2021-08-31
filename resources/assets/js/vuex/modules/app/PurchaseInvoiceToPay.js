export default {

    state : {
        //tipoClave
        invoices : []
        
    },

    mutations : {

        SET_PURCHASER_INVOICES_TO_PAY(state, value)
        {
            state.invoices = value
        }
    },

    getters : {

        PurchaserInvoicesToPayGetter(state)
        {
            return state.invoices;
        }
    }
}