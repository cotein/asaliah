
const actions = {

    async iva_compras_comprobantes({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/iva/comprobantes', {
                from_date : payload.from_date,
                to_date : payload.to_date,
            });

            commit('IVA_COMPRAS_SET_COMPROBANTES', response.data);

            return response

        } catch (e) {
            console.log('error en comprobantes action');
            console.log(e);
            throw e;
        }
    },

    async iva_compras_alicuotas({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/iva/alicuotas', {
                from_date : payload.from_date,
                to_date : payload.to_date,
            });

            commit('IVA_COMPRAS_SET_ALICUOTAS', response.data);

            return response

        } catch (e) {
            console.log('error en comprobantes action');
            console.log(e);
            throw e;
        }
    },

    async iva_compras_excel_export({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/iva/to_excel', {
                from_date : payload.from_date,
                to_date : payload.to_date,
            });

            return response

        } catch (e) {
            console.log('error en excel_export action');
            console.log(e);
            throw e;
        }
    },
}

export default actions;