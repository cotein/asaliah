import collect from 'collect.js';

export default {

    state : {
        customers : [],
    },

    mutations : {

        SET_CUSTOMERS_LIST(state, list)
        {
            state.customers = list;
        }

    },

    actions : {

        async getCustomersList(context, data)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;
                
                let response = await axios.post('/api/customer/index?page=' + data.page);

                return response

            } catch (e) {
                console.log('error en getInvoicesList action');
                console.log(e);
            }
        }
    },

    getters : {
        
        GetCustomersList(state)
        {
            return state.customers;
        }
    }

}
