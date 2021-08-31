import collect from 'collect.js';
export default {

    state : {
        pedidos : [],
        customer_addresses : [],
        add_new_address : false,
        pedido : {
            delivery_address : false,
            fiscal_address : false,
            date : null,
            customer : null,
            address : null,
            comments : [],
            pay_method : false,
            products : [
                {
                    'product_id' : null,
                    'product_name' : null,
                    'pricelist_id' : null,
                    'pricelist_name' : null,
                    'unit_price' : 0,
                    'unit_price_raw' : 0,
                    'quantity' : 1,
                    'discount_percentage' : 0,
                    'discount_import' : 0,
                    'iva_afip_code' : 5,
                    'iva_id' : 5,
                    'iva_percentage' : 21,
                    'iva_import' : 0,
                    'neto_import' : 0,
                    'total' : 0,
                    'price_list' : [],
                }
            ],
            total_pedido : 0
        },
    },

    actions : {

        async save_comment(context, payload)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/pedido_cliente/save_comment', 
                {
                    pedido_id : payload.pedido_id,
                    comment : payload.comment
                });

                return response;

            } catch (error) {
                console.log('Hubo un error en index');
                throw error;
            }
        },


        async  pedidos_index(context, token) {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/pedido_cliente/index');

                return response;

            } catch (error) {
                console.log('Hubo un error en index');
                throw error;
            }
        },

        async  pedido_store(context, token) {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/pedido_cliente/store', 
                {
                    pedido : context.state.pedido
                })
                
                return response;

            } catch (error) {
                console.log('Hubo un error en pedido_store');
                throw error;
            }
        },

        async  pedido_show(context, payload) {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/pedido_cliente/show', 
                {
                    code : payload.code
                })
                
                return response;

            } catch (error) {
                console.log('Hubo un error en pedido_show');
                throw error;
            }
        },

        async pedido_delete(context, payload)
        {
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.put('/api/pedido_cliente/delete', 
                {
                    pedido_cliente_id : payload.pedido_cliente_id
                })
                
                return response;

            } catch (error) {
                console.log('Hubo un error en pedido_delete');
                throw error;
            }
        },

        async getCustomerById(context, payload){

            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/customer/show', 
                {
                    customer_id : payload.customer_id
                })

                //context.commit('SET_CUSTOMER_ON_PEDIDO', response.data);
                return response;
                
            } catch (error) {
                console.log('Hubo un error en getCustomerById');
                throw error;
            }
        },

        async save_fiscal_address (context, payload) {
            
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/pedido_cliente/save_fiscal_address', 
                {
                    address : payload.address,
                    pedido : payload.pedido_id
                })

                return response;
                
            } catch (error) {
                console.log('Hubo un error en save_address pedido cliente');
                throw error;
            }

        },

        async remove_fiscal_address (context, payload) {
            
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/pedido_cliente/remove_fiscal_address', 
                {
                    address : payload.address,
                    pedido : payload.pedido_id
                })

                return response;
                
            } catch (error) {
                console.log('Hubo un error en remove_address pedido cliente');
                throw error;
            }

        },

        async save_delivery_address (context, payload) {
            
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/pedido_cliente/save_delivery_address', 
                {
                    address : payload.address,
                    pedido : payload.pedido_id
                })

                return response;
                
            } catch (error) {
                console.log('Hubo un error en save_address pedido cliente');
                throw error;
            }

        },

        async remove_delivery_address (context, payload) {
            
            try {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/pedido_cliente/remove_delivery_address', 
                {
                    address : payload.address,
                    pedido : payload.pedido_id
                })

                return response;
                
            } catch (error) {
                console.log('Hubo un error en remove_address pedido cliente');
                throw error;
            }

        }

    },

    mutations : {

        SET_PAY_METHOD(state, value)
        {
            state.pedido.pay_method = value;
        },

        SET_INITIAL_STATUS_PEDIDO_CLIENTE(state)
        {
            state.pedidos = [];
            state.customer_addresses = [];
            state.pedido.date = null;
            state.pedido.customer = null;
            state.pedido.address = null;
            state.pedido.products = [
                {
                    'product_id' : null,
                    'product_name' : null,
                    'pricelist_id' : null,
                    'pricelist_name' : null,
                    'unit_price' : 0,
                    'unit_price_raw' : 0,
                    'quantity' : 1,
                    'discount_percentage' : 0,
                    'discount_import' : 0,
                    'iva_afip_code' : 5, // 5 por que va el campo code en la tabla iva
                    'iva_id' : 5, // 5 por que va el campo code en la tabla iva
                    'iva_percentage' : 21,
                    'iva_import' : 0,
                    'neto_import' : 0,
                    'total' : 0,
                    'price_list' : [],
                }
            ],
            state.pedido.total_pedido = 0;
        },

        SET_TOTAL(state, value)
        {
            state.pedido.total_pedido = value;
        },

        SET_CUSTOMER_ON_PEDIDO(state, value)
        {
            state.pedido.customer = value;
        },

        SET_CUSTOMER_ADDRESSES(state, value)
        {
            state.customer_addresses = value;
        },

        SET_DELIVERY_ADDRESS(state, value)
        {
            state.pedido.address = value;
        },

        SET_DELIVERY_DATE(state, value)
        {
            state.pedido.date = value;
        },
       
        SET_PRODUCT_PRICE_LIST(state, payload)
        {
            //carga las listas de precios de un producto
            state.pedido.products[payload.index].price_list = payload.price_list;
            state.pedido.products[payload.index].product_id = payload.product_id;
            state.pedido.products[payload.index].product_name = payload.product_name;
        },

        SET_TOTAL_PRODUCT(state, payload)
        {
            state.pedido.products[payload.index].total = payload.total;
        },

        UPDATE_PRICE_FROM_TOTAL(state, index)
        {
            let product = state.pedido.products[index];

            let coef_iva = null;

            if (product.iva_percentage == 21) {
                coef_iva = 1.21
            }

            if (product.iva_percentage == 10.5) {
                coef_iva = 1.105
            }

            let unit_price = product.total / product.quantity / coef_iva;

            product.unit_price = unit_price;

            product.discount_import = (unit_price * product.quantity) * product.discount_percentage / 100;

            product.neto_import = (unit_price * product.quantity) - product.discount_import;

            product.iva_import = (product.neto_import * product.iva_percentage / 100) 

        },

        UPDATE_PRICE_FROM_UNIT_PRICE(state, index)
        {
            let product = state.pedido.products[index];

            product.neto_import = (product.unit_price * product.quantity) - product.discount_import;
            
            product.iva_import = (product.neto_import * product.iva_percentage / 100) 
            
            product.discount_import = (product.unit_price * product.quantity) * product.discount_percentage / 100;

            product.total = product.neto_import + product.iva_import;
            
        },

        UPDATE_PRICE_FROM_DISCOUNT_PERCENTAGE(state, index)
        {
            let product = state.pedido.products[index];

            product.neto_import = (product.unit_price * product.quantity) - product.discount_import;
            
            product.iva_import = (product.neto_import * product.iva_percentage / 100) 
            
            product.discount_import = (product.unit_price * product.quantity) * product.discount_percentage / 100;

            product.total = product.neto_import + product.iva_import;
            
        },

        SET_PRICE_AND_PRICELIST(state, payload)
        {
            state.pedido.products[payload.index].pricelist_id = payload.pricelist_id;
            state.pedido.products[payload.index].pricelist_name = payload.pricelist_name;
            state.pedido.products[payload.index].unit_price = parseFloat(payload.unit_price);

            state.pedido.products[payload.index].iva_import = 
            (
                ((state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import) *
                state.pedido.products[payload.index].iva_percentage / 100
            )

            state.pedido.products[payload.index].discount_import = 
            (
                state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity * state.pedido.products[payload.index].discount_percentage / 100
            )

            state.pedido.products[payload.index].neto_import =
            (
                (state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import
            )
            
            state.pedido.products[payload.index].total = state.pedido.products[payload.index].neto_import + state.pedido.products[payload.index].iva_import;

        },

        SET_QUANTITY_TO_PRODUCT(state, payload)
        {
            state.pedido.products[payload.index].quantity = parseInt(payload.quantity);

            state.pedido.products[payload.index].iva_import = 
            (
                ((state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import) *
                state.pedido.products[payload.index].iva_percentage / 100
            )

            state.pedido.products[payload.index].discount_import = 
            (
                state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity * state.pedido.products[payload.index].discount_percentage / 100
            )

            state.pedido.products[payload.index].neto_import =
            (
                (state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import
            )

            state.pedido.products[payload.index].total = state.pedido.products[payload.index].neto_import + state.pedido.products[payload.index].iva_import;
        },

        SET_IVA_TO_PRODUCT(state, payload)
        {
            state.pedido.products[payload.index].iva_afip_code = payload.iva.code;
            state.pedido.products[payload.index].iva_id = payload.iva.code;
            state.pedido.products[payload.index].iva_percentage = parseFloat(payload.iva.percentage);

            state.pedido.products[payload.index].iva_import = 
            (
                ((state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import) *
                state.pedido.products[payload.index].iva_percentage / 100
            )
            
            state.pedido.products[payload.index].discount_import = 
            (
                state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity * state.pedido.products[payload.index].discount_percentage / 100
            )

            state.pedido.products[payload.index].neto_import =
            (
                (state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import
            )

            state.pedido.products[payload.index].total = state.pedido.products[payload.index].neto_import + state.pedido.products[payload.index].iva_import;
        },

        SET_DISCOUNT_TO_PRODUCT(state, payload)
        {
            state.pedido.products[payload.index].discount_percentage = parseInt(payload.discount_percentage);

            state.pedido.products[payload.index].discount_import = 
            (
                state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity * state.pedido.products[payload.index].discount_percentage / 100
            )

            state.pedido.products[payload.index].iva_import = 
            (
                ((state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import) *
                state.pedido.products[payload.index].iva_percentage / 100
            )

            state.pedido.products[payload.index].neto_import =
            (
                (state.pedido.products[payload.index].unit_price * state.pedido.products[payload.index].quantity) - state.pedido.products[payload.index].discount_import
            )

            state.pedido.products[payload.index].total = state.pedido.products[payload.index].neto_import + state.pedido.products[payload.index].iva_import;
        },

        ADD_PRODUCT_TO_PRODUCTS(state)
        {
            state.pedido.products.push
            (
                {
                    'product_id' : null,
                    'product_name' : null,
                    'pricelist_id' : null,
                    'pricelist_name' : null,
                    'unit_price' : 0,
                    'unit_price_raw' : 0,
                    'quantity' : 1,
                    'discount_percentage' : 0,
                    'discount_import' : 0,
                    'iva_afip_code' : 5,
                    'iva_id' : 5,
                    'iva_percentage' : 21,
                    'iva_import' : 0,
                    'neto_import' : 0,
                    'total' : 0,
                    'price_list' : [],
                }
            );
        },

        SET_ITEMS_TO_PEDIDO(state, value)
        {
            state.pedido.products = value;
        },

        SET_PEDIDOS(state, value)
        {
            state.pedidos = value;
        },

        DELETE_PEDIDO_CLIENTE(state, index){
            state.pedido.products.splice(index, 1);
        },

        REMOVE_PEDIDO(state, index)
        {
            state.pedidos.splice(index, 1);
        },

        UPDATE_PEDIDO_IN_LIST(state, value)
        {
            state.pedidos.forEach((element, index) => {
                if (element.id == value.id) {
                    state.pedidos[index] = value;
                }
            });
        },

        ADD_COMMENT(state, value)
        {
            state.pedido.comments.push(
                {
                    'name' : value.name,
                    'description' : value.description
            
                }
            );
        },

        SET_UNIT_PRICE_PRODUCT(state, payload)
        {
            state.pedido.products[payload.index].unit_price = payload.unit_price;
        },

        PEDIDO_CLIENTES_SET_DELIVERY_ADDRESS(state, value)
        {
            state.pedido.delivery_address = value;
        },

        PEDIDO_CLIENTES_SET_FISCAL_ADDRESS(state, value)
        {
            state.pedido.fiscal_address = value;
        },

        PEDIDO_CLIENTES_ADD_NEW_ADDRESS(state, value)
        {
            state.add_new_address = value;
        },

        PEDIDO_CLIENTES_CLEAN_ADDRESS(state)
        {
            //limpio las direcciones para que no queden enlazadas al pròximo pedido
            // en PedidoListChildRow
            state.customer_addresses = [];
            state.add_new_address = false;
            state.pedido.delivery_address = false;
            state.pedido.fiscal_address = false;
        }
    },

    getters : {

        PedidoClientesAddNewAddressGetter(state)
        {
            return state.add_new_address;
        },

        PCDeliveryAddressGetter(state)
        {
            return state.pedido.delivery_address;
        },

        CustomerAddresses(state)
        {
            let addresses = collect(state.customer_addresses);

            if (addresses.isEmpty()) {
                return false;
            }
            
            return state.customer_addresses;
        },

        GetProductsFromPedidos(state)
        {
            return state.pedido.products;
        },

        TotalPedido(state)
        {
            let products = collect(state.pedido.products);

            return parseFloat(products.sum('neto_import')) + parseFloat(products.sum('iva_import'));
        },

        GetPedidos(state)
        {
            return state.pedidos;
        },

        ProductsCount(state)
        {
            if (collect(state.pedido.products).count() > 1) {
                return true;
            }

            return false;
            
        },

        PedidoHasCustomer(state)
        {
            if (state.pedido.customer != null) {
                return true;
            }

            return false;
        },

        PedidosClientesDeliveryAddressGetter(state)
        {
            return state.pedido.delivery_address;
        },

        PedidosClientesFiscalAddressGetter(state)
        {
            return state.pedido.fiscal_address;
        }

    }
}