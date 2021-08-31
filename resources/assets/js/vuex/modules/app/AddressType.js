import collect from 'collect.js';

export default {

    state : {
        address_type : [],
    },

    mutations : {

        SET_ADDRESS_TYPE(state, list)
        {
            state.address_type = list;
        }

    },

    actions : {

        async getAddressType({commit}, token)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/address_type/index');

                commit('SET_ADDRESS_TYPE', response.data);

                return response

            } catch (e) {
                console.log('error en getAddressType action');
                console.log(e);
            }
        }
    },

    getters : {
        
        GetAddressType(state)
        {
            return state.address_type;
        }
    }

}
