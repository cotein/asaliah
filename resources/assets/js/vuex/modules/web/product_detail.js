export default {
    state : {
        detail_product : null,
        attributes : []
    },

    actions : {

    },

    mutations : {   

        SET_PRODUCT_DETAIL(state, detail_product){
            state.detail_product = detail_product
        },

        SET_ATTRIBUTES_WWW(state, value){
            state.attributes = value
        }

    },

    getters : {

        DetailProduct(state){
            return state.detail_product
        }
    }
}