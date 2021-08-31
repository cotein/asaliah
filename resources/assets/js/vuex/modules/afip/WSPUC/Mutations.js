const mutations = {

    SET_CUIT(state, value){
        state.cuit = value;
    },

    SET_PERSON(state, value){
        state.person = value;
    },

    SET_ERROR(state, value){
        state.error = value;
    },
}

export default mutations;