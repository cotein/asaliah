const actions = {

    async save_accounting_account({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/accounting_account/store',
            {
                accounting_account : payload.accounting_account
            });

            commit('SET_ACCOUNTING_ACCOUNT', response.data);

            return response;

        } catch (e) {
            console.log('error en save_accounting_account action');
            console.log(e);
        }
    },

    async get_accounting_accounts({commit}, token)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.get('/api/accounting_account/index');

            commit('SET_ACCOUNTING_ACCOUNTS', response.data);

            return response;

        } catch (e) {
            console.log('error en get_accounting_accounts action');
            console.log(e);
        }
    },

    async son_provider({commit}, {token, name})
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.post('/api/accounting_account/son_provider',
            {
                name : name
            });

            commit('ADD_ACCOUNTING_ACCOUNT', response.data);
            
            return response;

        } catch (e) {
            throw e;
        }
    }

}

export default actions;