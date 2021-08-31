import { values } from "lodash"

export default {

    state : {
        pedido : {
            id : null,
            status : false,
            code : false
        },
        first_contact : null,
        print_comment : false
    },

    actions : {

        async status_update(context, token)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.put('/api/pedido_cliente/status_update', 
                {
                    pedido : context.state.pedido,
                    first_contact : context.state.first_contact
                });

                return response

            } catch (e) {
                console.log('error en status_update action');
                console.log(e);
            }
        } 
    },

    mutations : {

        SET_FIRST_CONTACT(state, value)
        {
            state.first_contact = value
        },

        SET_PRINT_COMMENT(state, value)
        {
            state.print_comment = value
        },
        
        SET_PEDIDO_CODE(state, value)
        {
            state.pedido.id = value.id
            state.pedido.code = value.code
            state.pedido.status = value.status
        },

        CLEAR_PEDIDO(state)
        {
            state.pedido.status = false;
            state.pedido.code = false;
        }
        
    },

    getters : {

        GetPedidoCliente(state)
        {
            return state.pedido;
        },

        GetPrintComments(state)
        {
            return state.print_comment;
        }
        
    }
}