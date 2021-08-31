import _ from 'lodash';
export default {
    state : {
        provinces : [],
        selected_province : null
    },

    mutations : {

        SET_PROVINCES(state, provinces){
            state.provinces = provinces
        },

        SET_PROVINCE(state, province){
            state.province = province
        }
    },

    actions : {

        getProvinces(){

            return new Promise((resolve, reject) => {

                axios.get('/provinces')
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });

            });
        }
    },

    getters : {

        HasProvinces(state){

            if (state.provinces == []) {
                return false;
            }

            return true;
        },

        SelectedProvince(state){
            if( ! _.isEmpty(state.province)){
                return true;
            }

            return false;
        },

        Provinces(state){
        
            if (state.provinces == []) {
                return [];
            }
    
            return state.provinces;
        }
    },
}