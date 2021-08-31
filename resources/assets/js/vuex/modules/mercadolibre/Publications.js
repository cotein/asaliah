import collect from 'collect.js'
export default {
    state : {
        token : null,
        publication_ids : [],
        publications : [],
        publications_headers : [],
        total : 0,
        ids : []
    },
    
    mutations : {
        SET_PUBLICATION_IDS(state, value){
            state.publication_ids = value;
        },

        SET_PUBLICATION(state, value){
            state.publications = value;
        },

        SET_PUBLICATION_HEADERS(state, value){
            state.publications_headers = value;
        },

        SET_PUBLICATIONS_ID(state, ids){
            state.ids = ids
        },

        CHANGE_PUBLICATION_STATUS(state, publication){
            let publications = collect(state.publications_headers);
            publications.transform((pub, index)=>{
                if(pub.id == publication.id)
                {
                    pub.status = publication.status
                }
            })
        }
    },

    actions : {

        async save_product_by_id  (context, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/mercadolibre/save_product_by_id',
                    {
                        product_id : payload.product_id
                    }
                );

                return response

            } catch (e) {
                console.log('error en save_product_by_id action');
                console.log(e);
            }
        },

        async get_products_id_from_meli(context, token) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/mercadolibre/get_products_id');

                return response

            } catch (e) {
                console.log('error en get_products_id_from_meli action');
                console.log(e);
            }
        },

        /**
         * 
         * @param {*} context 
         * @param {*} token 
         * Retorna los ids de las publicaciones
         */
        async publications_id(context, token){

            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/publication/get_publications_id');
                
                context.commit('SET_PUBLICATIONS_ID', response.data);
                console.log('si es este');
                return response

            } catch (e) {
                console.log('error en publications_id action');
                console.log(e);
            }
        },

        publications_total(context, token){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return axios.get('/api/publication/publications_total')
            .then((result) => {
               context.state.total = result.data;
            }).catch((err) => {
                console.log(err);
            });
        },

        fetchpublication_ids(context){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token;
            return axios.get('/api/mercadolibre/publication_ids')
            .then((result) => {
                console.log(result.data);
                context.commit('SET_PUBLICATION_IDS', result.data)
            }).catch((err) => {
                console.log(err);
            });
        },

        fetchPublicationHeaders(context, token){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return axios.get('/api/mercadolibre/publication_headers')
            .then((result) => {
                console.log(result);
                context.commit('SET_PUBLICATION_HEADERS', result.data)
            }).catch((err) => {
                console.log(err);
            });
        },

        changePublicationStatus(context, status){
           /*  window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + status.token;
            return axios.put('/api/mercadolibre/change_publication_status', {'status':status})
            .then((result) => {
                console.log(result);
                context.commit('CHANGE_PUBLICATION_STATUS', result.data.body)
            }).catch((err) => {
                console.log(err);
            }); */

            return new Promise((resolve, reject) => {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + status.token;
                return axios.put('/api/mercadolibre/change_publication_status', {'status':status})
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });
            
            });
        },

        syncroMeliAccount(context, token){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return axios.get('/api/mercadolibre/syncro', 
            /* {
                onDownloadProgress: function (progressEvent) {
                    // Do whatever you want with the native progress event
                    console.log('////////');
                    console.log(progressEvent.loaded);
                    console.log('////////');
                },
            } */
            )
            .then((result) => {
                //busVue.$emit('syncro_Meli_Account', result.data);
                //context.commit('CHANGE_PUBLICATION_STATUS', result.data.body)
            }).catch((err) => {
                console.log(err);
            });
        },

        async update_available_quantity_on_publication  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let response = await axios.put('/api/mercadolibre/update_available_quantity_on_publication', 
                {
                    item_id : payload.publication_id,
                    available_quantity : payload.available_quantity
                });
                
                return response;

            } catch (e) {
                console.log('error en update_available_quantity_on_variation action');
                console.log(e);
                throw e;
            }
        },

        async update_price_on_publication  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let response = await axios.put('/api/mercadolibre/update_price_on_publication', 
                {
                    item_id : payload.publication_id,
                    price : payload.price
                });
                
                return response;

            } catch (e) {
                console.log('error en update_price_on_variation action');
                console.log(e);
                throw e;
            }
        },

    },

    getters : {
        
        GetPublicationsIds(state){

            let ids = collect(state.ids)

            if (ids.isEmpty()) {
                return false;
            }
            return ids.flatten().toArray();
        },

        PublicationsTotal(state){
            return state.total;
        },

        MeliPublications(state){
            return state.publications;
        },

        MeliPublicationsHeader(state){
            let pub_headers = collect(state.publications_headers);
            console.log(pub_headers);
            if (pub_headers.count() == 0) {
                return [];
            }
            return state.publications_headers;
        }
    }

}