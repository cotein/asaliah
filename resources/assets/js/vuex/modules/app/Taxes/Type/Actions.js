const actions = {

    async get_tax_types(context, token){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.get('/api/tax_types/index'); 
            
            return response.data;

        } catch (error) {
            console.log('Hubo un error en get_tax_types');
            throw error;
        }
    },

}

export default actions;