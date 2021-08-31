export default {
    state : {
        token : null,
    },

    actions : {
        updateAuthUser (context , value) {
            context.commit('ADD_AUTH_USER', value)
        },

        
    },

    mutations : {
        ADD_AUTH_USER(state, token){
            state.token = token;
        },
    },

    getters : {
        UserToken(state){
            return state.token;
        }
    }



}