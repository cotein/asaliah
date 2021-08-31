import collect from 'collect.js'
export default {

    actions : {

        async visits_by_publication  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.get('/api/mercadolibre/visits_by_publication',
                    {
                        params: {
                            publication_id : payload.publication_id
                        }               
                    }               
                );
                
                return response;

            } catch (e) {
                console.log('error en visits_by_publication action');
                console.log(e);
                throw e;
            }
        },

        async visits_by_publication_between_dates  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.get('/api/mercadolibre/visits_by_publication_between_dates',
                    {
                        params: {
                            publication_id : payload.publication_id,
                            from : payload.from,
                            to : payload.to,
                        }               
                    }               
                );
                
                return response;

            } catch (e) {
                console.log('error en visits_by_publication_between_dates action');
                console.log(e);
                throw e;
            }
        },

    },


}