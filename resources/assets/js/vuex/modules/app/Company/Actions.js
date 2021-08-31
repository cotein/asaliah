const actions = {

    async company_store(context, token){

        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.post('/api/company/store', 
            {
                company : context.state.company
            })

            return response

        } catch (error) {
            console.log('Hubo un error en company_store');
            throw error;
        }
    },

    async get_company(context, token)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

            let company = await axios.get('/api/company/show');

            context.commit('SET_COMPANY', company.data);
            
            return company;

        } catch (error) {
            console.log('Hubo un error en get_company');
            throw error;
        }
    },

    async update_company(context, data)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;

            let company = await axios.post('/api/company/update', {data});

            context.commit('SET_COMPANY', company.data);
            
            return company;
            
        } catch (error) {
            console.log('Hubo un error en update_company');
            throw error;
        }
    }
}

export default actions;