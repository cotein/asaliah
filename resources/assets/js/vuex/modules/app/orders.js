import collect from 'collect.js';
export default  {
    state : {
        orders : [],
        order : null,
        limit : 50,
        offset : 0,
        page : 1,
        result : []
    },

    actions : {
        async getOrders(context, token)
        {
            //éste método no se esta usando
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/orders/getorders',
                {
                    offset : 31,
                    limit : 31
                });

                return response

            } catch (e) {
                console.log('error en getorders action');
                console.log(e);
            }
        },

        async get_all_orders({state, dispatch}, token)
        {
            console.log('ppppppppppppppp');
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                state.offset = (state.page * state.limit) - state.limit;
                let response = await axios.post('/api/orders/getorders',
                {
                    offset : state.offset,
                    limit : state.limit,
                    page : state.page
                    
                });

                return response

            } catch (e) {
                console.log('error en get_all_orders action');
                console.log(e);
            }
        },
        
        async automatic_get_orders (context, payload) {
            try {
                
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                    this.offset = (page * this.limit) - this.limit;

                    if (this.offset < 0) {
                        this.offset = 0
                    }
                    axios.post('/api/orders/getorders',
                        {
                            offset : this.offset,
                            limit : this.limit,
                            page : page
                        }
                    )

            } catch (error) {
                console.log('Hubo un error en pedido_store');
                throw error;
            }
        },

        async getPedidosClientesFromMeli(state, token)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/orders/pedidos_clientes_from_meli')
                
                return response;

            } catch (error) {
                console.log('Hubo un error en pedido_store');
                throw error;
            }
        },

        
        getOrder(state, objdata){
            return new Promise((resolve, reject) => {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + objdata.token;

                axios.post('/api/orders/order', 
                    {
                        'order_id' : objdata.order_id,
                    })
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });
            })
        },

        async get_billing_info(state, payload){
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/orders/get_billing_info', 
                {
                    order_id : payload.order_id,
                });

                return response.data;

            } catch (error) {
                console.log('Hubo un error en get_billing_info');
                throw error;
            }
        }
    },

    mutations : {
        
        SET_ORDERS(state, payload){
            state.orders = payload;
        },

        SET_ORDER(state, payload){
            state.order = payload;
        },
        
    },
    
    getters : {
       
        GetOrders(state){

            let orders = collect(state.orders);

            if (orders.count() > 0) {
                return state.orders;
            }

            return [];
        },

        HasOrder(state){
            if (!(state.order == null)) {
                return true;
            }
            return false;
        },

        GetOrder(state){
            if (!(state.order == null)) {
                
                return state.order;

            }
            return [];
        },

        HasBuyer(state){
            if (!(state.order == null)) {
                return true;
            }
            return false;
        },

        GetBuyer(state){
            if (!(state.order == null)) {
                
                return state.order.buyer;

            }
            return [];
        },

        HasOrderItems(state){
            if (!(state.order == null)) {
                return true;
            }
            return false;
        },

        GetOrderItems(state){
            if (!(state.order == null)) {
                
                return state.order.order_items;

            }
            return [];
        },

        HasPayments(state){
            if (!(state.order == null)) {
                return true;
            }
            return false;
        },

        GetPayments(state){
            if (!(state.order == null)) {
                
                return state.order.payments;

            }
            return [];
        },
        

    }
}