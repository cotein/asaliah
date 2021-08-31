import collect from 'collect.js';
export default {
    state : {
        results : [],
    },

    actions : {

        search_products(context, search){
            return new Promise((resolve, reject) => {
                axios.post('/search_products', {'search' : search})
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });
            
            });
        },
       
    },

    mutations : {

        SET_RESULTS(state, results){
            state.results = results
        },

    },

    getters : {

        Results(state){
            return state.results;
        },

        HasResults(state){
            
            let results = collect(state.results);

            if (results.count() > 0) {
                return true;
            }

            return false;
        },

    }
}