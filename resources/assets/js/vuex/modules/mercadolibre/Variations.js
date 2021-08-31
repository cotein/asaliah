export default {
    state : {
        publications : []
    },
    
    mutations : {
       
        PUBLICATION_LIST_SET_PUBLICATIONS(state, value)
        {
            state.publications = value;
        }
    },

    actions : {

        async update_available_quantity_on_variation  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let response = await axios.put('/api/mercadolibre/update_available_quantity_on_variation', 
                {
                    item_id : payload.publication_id,
                    variations : payload.variations
                });
                
                return response;

            } catch (e) {
                console.log('error en update_available_quantity_on_variation action');
                console.log(e);
                throw e;
            }
        },

        async update_price_on_variation  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                let response = await axios.put('/api/mercadolibre/update_price_on_variation', 
                {
                    item_id : payload.publication_id,
                    variations : payload.variations
                });
                
                return response;

            } catch (e) {
                console.log('error en update_available_quantity_on_variation action');
                console.log(e);
                //throw e;
            }
        },

    },

    getters : {
        
        
    }

}