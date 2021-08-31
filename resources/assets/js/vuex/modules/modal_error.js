export default {

    state : {
        errors : false
    },

    actions : {
        initial_status_error_msg({commit}){
            commit('INITIAL_STATUS');
        }
    },

    mutations : {

        SET_ERRORS_MSGS(state, value){
            state.errors = value;
        },

        INITIAL_STATUS(state){
            state.errors = false
        }

    },

    getters : {

        GetErrors(state){
            return state.errors;
        }
    }


}