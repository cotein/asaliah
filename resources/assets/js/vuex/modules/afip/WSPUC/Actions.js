const actions = {

    async getPersonFromAfip(context, payload){

        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

            let response = await axios.post('/api/afip/get_persona', 
            {
                cuit : payload.cuit
            });

            context.commit('SET_PERSON', response.data);

            return response.data;
            
        } catch (error) {
            throw error
        }
    },

    isFinalConsumer({state}) {
        /**
         * Cuando busco por DNI devuelve un objeto idPersonaListReturn
         * que contine el CUIL de la persona a buscar
         */
        if (state.person.hasOwnProperty('idPersonaListReturn')) {
            return true;
        }else{
            return false;
        }

    }
}

export default actions;