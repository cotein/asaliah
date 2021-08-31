const actions = {

    async get_taxes(context, token){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.get('/api/taxes/index'); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en get_taxes');
            throw error;
        }
    },

    async set_accounting_account(context, payload){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/taxes/set_accounting_account', {
                tax_id : payload.tax_id,
                accounting_account : payload.accounting_account,
            }); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en set_accounting_account');
            throw error;
        }
    },

    async set_type(context, payload){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/taxes/set_type', {
                tax_id : payload.tax_id,
                type : payload.type,
            }); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en set_type');
            throw error;
        }
    },

    async set_active(context, payload){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/taxes/active', {
                tax_id : payload.tax_id,
                active : payload.active,
            }); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en set_type');
            throw error;
        }
    },

    async set_state(context, payload){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/taxes/set_state', {
                tax_id : payload.tax_id,
                state : payload.state,
            }); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en set state');
            throw error;
        }
    },

    async tax_store(context, payload){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/taxes/store', {
                tax : payload.tax,
            }); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en set state');
            throw error;
        }
    }


}

export default actions;