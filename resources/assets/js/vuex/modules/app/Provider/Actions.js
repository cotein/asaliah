const actions = {

    async store_provider  ({state}, token) {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.post('/api/provider/store', {
                provider : state.provider
            });

            return response

        } catch (e) {
            console.log('error en store_provider action');
            console.log(e);
            throw e;
        }
    },

    async provider_find_by_name({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/provider/find_by_name', {
                provider : payload.provider
            });

            commit('SET_PROVIDERS', response.data);

            return response

        } catch (e) {
            console.log('error en provider_find_by_name action');
            console.log(e);
            throw e;
        }
    },

    setProviderInscription ({ commit }, value) {
        commit('SET_PROVIDER_INSCRIPTION', value);
    },

    setProviderPurchaseDocument ({ commit }, value) {
        commit('SET_PROVIDER_PURCHASE_DOCUMENT', value);
    },

    setProviderAddressType ({ commit }, value) {
        commit('SET_PROVIDER_ADDRESS_TYPE', value);
    },

    setProviderProvince ({ commit }, value) {
        commit('SET_PROVIDER_ADDRESS_PROVINCE', value);
    },

    setProviderRegimen ({ commit }, value) {
        commit('SET_PROVIDER_REGIMEN', value);
    },

    setProviderAccountingAccount ({ commit }, value) {
        commit('SET_PROVIDER_ACCOUNTING_ACCOUNT', value);
    },

    setProviderSubLevelAccountingAccount ({ commit }, value) {
        commit('SET_PROVIDER_SUBLEVEL_ACCOUNTING_ACCOUNT', value);
    },

    setSelectedProvider ({ commit }, value) {
        commit('SET_SELECTED_PROVIDER', value);
        commit('PURCHASE_INVOICE_SET_PROVIDER', value);
    },
}

export default actions;