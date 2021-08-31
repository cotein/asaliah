const actions = {

    async enablePriceLists(context, token)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.post('/api/price_list/enablePriceLists');

            return response;
            

        } catch (error) {
            console.log(error);
            throw error;
        }
    },

    async getPriceListsOfAProduct(context, payload){

        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/price_list/getPriceListsOfAProduct', 
            {
                product_id : payload.product_id
            })

            context.commit('SET_PRICE_LISTS', response.data);

        } catch (error) {
            console.log('Hubo un error en company_store');
            throw error;
        }
    },

    async updatePriceProductOnPriceList(context, payload)
    {
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.post('/api/price_list/updatePriceProductOnPriceList', 
            {
                pricelist_id : payload.pricelist_id,
                product_id : payload.product_id,
                new_val : payload.new_val
            })

            return response;
            
        } catch (error) {
            console.log('Hubo un error en company_store');
            throw error;
        }
    }

}

export default actions;