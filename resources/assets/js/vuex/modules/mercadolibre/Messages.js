import collect from 'collect.js'
export default {
    state : {
       messages : [],
       received_messages : [],
    },
    
    mutations : {
        
        SET_MELI_MESSAGES(state, messages)
        {
            state.messages = messages;
        },

        ADD_MELI_MESSAGE(state, message)
        {
            state.messages.push(message);
        },
        
        ADD_RECEIVE_MESSAGE(state, message)
        {
            state.received_messages.push(message.message);
        },
        DELETE_RECEIVE_MESSAGE(state, message_id)
        {
            let index = state.received_messages.findIndex(message => {
                return message.order_id == message_id
            });

            state.received_messages.splice(index, 1);
           
        }
    },

    actions : {

        async publish_message  ({commit}, payload) {
            
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/mercadolibre/publish_message',
                    {
                        pack_id : payload.pack_id,
                        seller : payload.seller,
                        from_user_id : payload.from_user_id,
                        from_email : payload.from_email,
                        to_user_id : payload.to_user_id,
                        message : payload.message,
                    }               
                );
                
                return response;

            } catch (e) {
                console.log('error en publish_message action');
                console.log(e);
                throw e;
            }
        },
    },

    getters : {

        MeliMessagesGetter(state)
        {
            return state.messages;
        },

        ReceivedMessages(state)
        {
            return state.received_messages;
        },

        CountReceivedMessages(state)
        {
            return collect(state.received_messages).count();
        }


    }

}