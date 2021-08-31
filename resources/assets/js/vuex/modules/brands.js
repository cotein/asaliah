
export default {
    state : {
        brands : [],
        loading_brand_multiselect : false,
    },
    getters : {
        GetBrands(state){
            return state.brands;
        },
        LoadingBrands(state){
            return state.loading_brand_multiselect
        }
    },
    actions : {
        getSuppliersBrands(context, data){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;
            return axios.post('/api/suppliers/brands', {id : data.supplier.id} )
            .then((result) => {
                context.commit('ADD_BRANDS', result.data);
            }).catch((err) => {
                console.log(err);
            });
        }
    },
    mutations : {
        ADD_BRANDS(state, value){
            state.brands = value;
        },

        UPDATE_LOADING_BRANDS(state, value){
            state.loading_brand_multiselect = value
        }
    },



}