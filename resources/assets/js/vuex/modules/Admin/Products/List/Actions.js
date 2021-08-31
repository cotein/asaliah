const actions = {

    async getProductsList(context, payload){

        try{

            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
            let response = await axios.post('/api/products/index?page=' + payload.page);

            return response;

        } catch (e) {
            throw e;
        }
    },

    async loadData(context, payload){

        try{

            let response = await context.dispatch('getProductsList', payload);

            if (response) {
                //context.commit('ADD_PRODUCTS_TO_LIST_PRODUCTS', products.data);
                return response;
            }

        } catch(e){
                
        }
    }
}

export default actions;