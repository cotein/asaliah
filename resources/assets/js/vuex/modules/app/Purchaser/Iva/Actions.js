const actions = {

    purchaseInvoiceSelectInvoiceType ({ commit }, value) {
        commit('PURCHASE_INVOICE_SET_INVOICE_TYPE', value);
    },

    purchaseInvoiceSelectMoney ({ commit }, value) {
        commit('PURCHASE_INVOICE_SET_MONEY', value);
    },

    setPurchaseInvoiceDate({commit}, value)
    {
        commit('PURCHASE_INVOICE_SET_DATE', value);
    },

    setPurchaseInvoiceImputationDate({commit}, value)
    {
        commit('PURCHASE_INVOICE_SET_IMPUTATION_DATE', value);
    },

    async purchase_invoice_store  ({state}, token) {
        
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.post('/api/purchase_invoice/store',
            {
                invoice : state.invoice
            });

            return response;

        } catch (e) {
            console.log('error en purchase_invoice_store action');
            throw e;
        }
    }
}

export default actions;