export default {

    state : {

        commissions : [],

    },

    mutations : {

        SET_COMMISSIONS(state, value)
        {
            state.commissions = value;
        },

    },

    actions : {

        async get_my_commissions({commit}, payload){
            
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.get(payload.url); 
                
                commit('SET_COMMISSIONS', response.data);

                return response.data;

            } catch (error) {
                console.log('Hubo un error en get_my_commissions');
                throw error;
            }
        },
        
    },

    getters : {

        CommissionsGetter(state)
        {
            return state.commissions;
        },
        
    }
}