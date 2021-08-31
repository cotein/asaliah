export default {

    state : {
        //tipoClave
        inscriptions : []
        
    },

    mutations : {

        SET_INSCRIPTIONS(state, value)
        {
            state.inscriptions = value
        }
    },

    getters : {

        GetInscriptions(state)
        {
            return state.inscriptions;
        }
    }
}