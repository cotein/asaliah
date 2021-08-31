    
export default {
    state : {
        products : [],
        data : null,
    },

    mutations : {
        BILLIABLE_PRODUCTS(state, value){
            state.products = value;
        },
        BILLIABLE_ALERT(state, value){
            Vue.set(state, 'data', {});
            Vue.set(state, 'data', value);
        },
    },

    getters : {

        BilliableProducts(state){
            if (state.data != null) {
                return state.data.billable_product
            }
            return [];
        },

        BillData(state){
            if (state.data != null) {
                return state.data
            }
            return false;
        },

        Code(state){
            if (state.data != null) {
                return state.data.code
            }
            return false;
        },
        
    }

}