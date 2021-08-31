import collect from 'collect.js';

export default {

    state : {
        invoices : [],
    },

    mutations : {

        SET_INVOICES_LIST(state, list)
        {
            state.invoices = list;
        }

    },

    actions : {

        async getInvoicesList(context, data)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;
                
                let response = await axios.post('/api/sale_invoice/index?page=' + data.page);

                return response

                //context.commit('SET_INVOICES_LIST', response.data)

            } catch (e) {
                console.log('error en getInvoicesList action');
                console.log(e);
            }
        }
    },

    getters : {
        
        InvoicesList(state)
        {
            let list = collect(state.invoices);

            if (list.count() > 0) {
                return state.invoices
            }

            return [];
        }
    }

}
