export default {

    state : {
        purchase_invoices : []
        
    },

    mutations : {

        PURCHASE_INVOICE_LIST(state, value)
        {
            state.purchase_invoices = value
        }
    },

    getters : {

        PurchaserInvoiceList(state)
        {
            return state.purchase_invoices;
        }
    },

    actions : {

        async get_purchase_invoice  ({commit}, token) {

            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/purchase_invoice/index');
                
                commit('PURCHASE_INVOICE_LIST', response.data);

                return response;

            } catch (e) {
                console.log('error en get_purchase_invoice action');
                throw e;
            }
        }
    }
}