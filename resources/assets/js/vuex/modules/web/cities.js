import _ from 'lodash';

export default {
    state : {
        cities : [],
        city : null
    },

    mutations : {

        SET_CITIES(state, values){
            state.cities = values
        }
    },

    actions : {

        getCities(context, value){
            return new Promise((resolve, reject) => {
                axios.post('/cities', {
                    city : value
                })
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });
            });
        }
    },

    getters : {

        Cities(state){
            if( ! _.isEmpty(state.cities)){
                return state.cities;
            }

            return [];
        },
    }
}