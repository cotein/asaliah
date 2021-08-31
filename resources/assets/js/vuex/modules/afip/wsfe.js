export default {

    state : {
        bill_data : {
            
        }
    },

    getters : {
        HasBillData(state){

            if(state.bill_data != {}){
                return true;
            }
            return false;
        }
    },

    actions : {

        async ultimo_autorizado(context, payload){

            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let response = await axios.post('/api/afip/comprobantes/ultimo_autorizado', 
                {
                    CteTipo : payload.CteTipo
                });

                return response.data;
                
            } catch (error) {
                throw error;
            }


        },

        async billGenerate(context, payload){
            
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let invoice = await axios.post('/api/afip/comprobantes/generate', 
                {
                    data : payload.data
                });

                return invoice.data;
                
            } catch (error) {
                throw error;
            }
        },

        async tipoTributos(context, token){
            
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

                let tributos = await axios.post('/api/afip/comprobantes/tipo_tributos');

                return tributos;
                
            } catch (error) {
                throw error;
            }
        },

    },
}