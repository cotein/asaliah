const actions = {

    async categories_list(context, token){
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let categories = await axios.post('/api/categories/index'); 

            return categories;

        } catch (e) {
            throw e;
        }
    },
}

export default actions;