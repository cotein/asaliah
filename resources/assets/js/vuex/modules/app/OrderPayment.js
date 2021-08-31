
export default {

    state : {
        order_payments : null,
        order_tp_pay : [],
        purchase_invoices_to_pay : []
    },

    actions : {

        async order_payment_delete({getters}, payload)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.put('/api/order_payment/delete', 
                {
                    order_payment : payload.order_payment,
                });

                return response;

            } catch (error) {
                console.log('Hubo un error en order_payment_delete');
                throw error;
            }
        },

        async order_payment_store({getters}, token)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/order_payment/store', 
                {
                    order_payment : getters.PaymentOrdersPurchaseInvoicesToPayGetter,
                });

                return response;

            } catch (error) {
                console.log('Hubo un error en order_payment_store');
                throw error;
            }
        },

        async get_order_payment({getters}, token)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/order_payment/index');

                return response.data;

            } catch (error) {
                console.log('Hubo un error en get_order_payment');
                throw error;
            }
        }
    },

    mutations : {

        ORDER_PAYMENT_SET_ORDERS(state, value)
        {
            state.order_payments = value
        },

        ORDER_PAYMENT_SET_ORDERS_TO_PAY(state, value)
        {
            state.order_tp_pay = value
        },

        ORDER_PAYMENT_SET_PURCHASE_INVOICES_TO_PAY(state, value)
        {
            state.purchase_invoices_to_pay = value
        }
        
    },

    getters : {

        GetOrderPayments(state)
        {
            return state.order_payments;
        },

        GetOrderPaymentsToPay(state)
        {
            return state.order_tp_pay;
        },
        
        PaymentOrdersPurchaseInvoicesToPayGetter(state)
        {
            return state.purchase_invoices_to_pay;
        }
        
    }
}