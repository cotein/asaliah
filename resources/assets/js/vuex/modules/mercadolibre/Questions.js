import collect from 'collect.js'
export default {
    state : {
       
    },
    
    mutations : {
        
    },

    actions : {

        async answer_question  ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/mercadolibre/answer_question', {
                    question_id : payload.question_id,
                    text : payload.text
                });

                return response;

            } catch (e) {
                console.log('error en answer_question action');
                console.log(e);
                throw e;
            }
        },

    },

    getters : {
        
        
    }

}