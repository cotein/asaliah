const actions = {

    async addressUpdate(context, payload){

        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

            let response = await axios.post('/api/customer/address_update',
            {
                customer_data : payload.customer_data
            });

            return response.data;
            
        } catch (error) {
            
        }
    },

    async existCustomer(context, payload){

        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

            let response = await axios.post('/api/customer/exist_customer',
            {
                number : payload.cuit
            });

            context.commit('SET_EXIST_CUSTOMER', response.data);

            return response.data;
            
        } catch (error) {
            console.log(error);
            console.log('Error en getCustomer');
        }
    },

    async store_customer(context, payload){

        try {

            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

            let response = await axios.post('/api/customer/store',
                {
                    customer : payload.customer
                }
            );
            
            context.commit('SET_EXIST_CUSTOMER', response.data);
            
            return response.data;

        } catch (error) {
            console.log(' error en store_customer');
            throw error;
        }
    },

    async update_customer(context, payload){

        try {

            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

            let response = await axios.put('/api/customer/update',
                {
                    customer : payload.customer,
                    dni_cuil_cuit : payload.dni_cuil_cuit,
                    original_cuit : payload.original_cuit
                }
            );
            
            return response

        } catch (error) {
            console.log('error en customer update');
            throw error;
        }
    },

    async customer_update_data_from_billing_info(context, payload)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.put('/api/customer/customer_update_data_from_billing_info', 
                {
                    order_id : payload.order_id,
                    billing_info : payload.billing_info,
                    meli_nick : payload.meli_nick,
                    customer_id : payload.customer_id,

                });

                return response.data;

            } catch (error) {
                console.log('Hubo un error en customer_update_data_from_billing_info');
                throw error;
            }
        }

    
}

export default actions;