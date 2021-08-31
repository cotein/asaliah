export default {
    state : {
        alicuota : false,
    },

    actions : {

        async getAlicuota(context, payload){

            context.commit('CLEAR_ALICUOTA');

            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let response = await axios.post('/api/arba/alicuota_por_sujeto', 
                {
                    cuit : payload.cuit
                });

                context.commit('SET_ALICUOTA', response.data);

                return response.data;
                
            } catch (error) {
                throw error
            }
        },

        
    },

    mutations : {

        SET_ALICUOTA(state, value)
        {
            state.alicuota = value
        },

        CLEAR_ALICUOTA(state)
        {
            state.alicuota = false;
        }
    },

    getters : {

        HasAlicuota(state)
        {
            if (state.alicuota) {
                if (state.alicuota.contribuyentes) {
                    return state.alicuota;
                }
                return false;
            }

            return false;
        },

        HasAlicuotaError(state)
        {
            if (state.alicuota) {
                
                if (state.alicuota.codigoError) {
                    return state.alicuota.mensajeError
                }
            }

            return false;
        }
    }

    
}