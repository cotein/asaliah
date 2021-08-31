
export default {

    state : {
        pedido : null,
        update_delivery_date : null
        
    },

    actions : {

        async update_delivery_date(context, payload)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.put('/api/pedido_cliente/update_delivery_date', 
                {
                    date : payload.date,
                    pedido_id : payload.pedido_id,

                })

                return response.data;

            } catch (error) {
                console.log('Hubo un error en update_delivery_date');
                throw error;
            }
        }
    },

    mutations : {

        UPDATE_DELIVERY_DATE(state, value)
        {
            state.update_delivery_date = value
        }
        
    },

    getters : {

        GetPedidoEdit(state)
        {
            return state.pedido;
        }
        
    }
}