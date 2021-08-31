export default {

    state : {

        payment_types : [],
        payment_type : false
    },

    actions : {

        async getPaymentTypes({commit}, token)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/pay_methods/index');

                commit('SET_PAYMENT_TYPES', response.data);

                return response

            } catch (e) {
                console.log('error en getAddressType action');
                console.log(e);
            }
        },

        updatePaymentTypeValue({commit}, value)
        {
            commit('SET_PAYMENT_TYPE', value);
        }

    },

    mutations : {

        SET_PAYMENT_TYPES(state, value)
        {
            state.payment_types = value;
        },

        SET_PAYMENT_TYPE(state, value)
        {
            state.payment_type = value;
        }
    },

    getters : {

        PaymentTypesGetter(state)
        {
            return state.payment_types;
        },

        PaymentTypeGetter(state)
        {
            return state.payment_type;
        },
    }
}