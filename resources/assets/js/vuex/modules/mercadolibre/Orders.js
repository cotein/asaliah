import collect from 'collect.js'
export default {
    state : {
        recents_orders : false,
        new_order_notification : []
    },
    
    mutations : {
        SET_RECENT_ORDERS(state, value){
            state.recents_orders = value;
        },

        SET_NEW_ORDER_NOTIFICATION(state, order)
        {
            state.new_order_notification.push(order);
        },

        DELETE_NEW_ORDER_NOTIFICATION(state, order_id)
        {
            let index = state.new_order_notification.findIndex(order => {
                return order.order_id == order_id
            });

            state.new_order_notification.splice(index, 1);
           
        }

    },

    actions : {

        async orders_by_seller_recent  ({commit}, token) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/mercadolibre/orders_by_seller_recent');
                
                commit('SET_RECENT_ORDERS', response.data);

                return response;

            } catch (e) {
                console.log('error en orders_by_seller_recent action');
                console.log(e);
            }
        },

        async save_order_from_meli ({commit}, payload) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/orders/save_order_from_meli',
                {
                    order : payload.order
                });
                
                return response;

            } catch (e) {
                console.log('error en save_order_from_meli action');
                console.log(e);
            }
        }

    },

    getters : {
        
        GetRecentsOrders(state)
        {
            return state.recents_orders;
        },

        NewOrderNotificationGetter(state)
        {
            return state.new_order_notification;
        },

        NewOrderNotificationGetterCount(state)
        {
            return collect(state.new_order_notification).count();
        }
        
    }

}