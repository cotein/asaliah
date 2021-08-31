import products from './products';
export default {
    state : {
        terms : [],
    },

    actions : {
        updateSaleTermsValue(context, value){
            context.commit('UPDATE_SALE_TERMS_VALUE', value);
        }
    },

    mutations : {
        UPDATE_SALE_TERMS_VALUE(state, value){
            state.terms = value;
        }
    }
}