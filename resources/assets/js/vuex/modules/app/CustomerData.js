import collect from 'collect.js';

export default {

    state : {
        customer : {
            id : '',
            number : '',
            name : '',
            purchaser_document : '',
            inscription_id : '',
            inscription : '',
            contact : '',
            cell_phone : '',
            phone_1 : '',
            phone_2 : '',
            phone_3 : '',
            email : '',
            addresses : '',
        }
    },

    mutations : {

        SET_CUSTOMER_DATA(state, data)
        {
            state.customer = data;
        },

        SET_CUSTOMER_CONTACT(state, value)
        {
            state.customer.contact = value;
        },

        SET_CUSTOMER_CELL_PHONE(state, value)
        {
            state.customer.cell_phone = value;
        },

        SET_CUSTOMER_PHONE1(state, value)
        {
            state.customer.phone_1 = value;
        },

        SET_CUSTOMER_PHONE2(state, value)
        {
            state.customer.phone_2 = value;
        },

        SET_CUSTOMER_PHONE3(state, value)
        {
            state.customer.phone_3 = value;
        },

        SET_CUSTOMER_EMAIL(state, value)
        {
            state.customer.email = value;
        },

        SET_CUSTOMER_ADDRESS(state, data)
        {
            state.customer.addresses[data.index].id = data.address.id;
            state.customer.addresses[data.index].city = data.address.city;
            state.customer.addresses[data.index].city_id = data.address.city_id;
            state.customer.addresses[data.index].state = data.address.state;
            state.customer.addresses[data.index].state_id = data.address.state_id;
            state.customer.addresses[data.index].domicilio = data.address.domicilio;
            state.customer.addresses[data.index].name = data.address.name;
            state.customer.addresses[data.index].between_streets = data.address.between_streets;
            
        },

        SET_NEW_CUSTOMER_ADDRESS(state, value)
        {
            if (state.customer.addresses == '') {
                state.customer.addresses = [];
                state.customer.addresses.push(value);
            }else{
                state.customer.addresses.push(value);
            }
        },

        SET_CUSTOMER_ID(state, value)
        {
            state.customer.id = value
        }
    },

    actions : {

        async getCustomerData(context, data)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;
                
                let response = await axios.post('/api/customer/show', 
                {
                    customer_id : data.customer_id
                });

                return response

            } catch (e) {
                console.log('error en getCustomerData action');
                console.log(e);
            }
        }
        
    },

    getters : {
        GetCustomerNumber(state)
        {
            return state.customer.number;
        },

        GetCustomerName(state)
        {
            return state.customer.name;
        },

        GetCustomerPurchaserDocument(state)
        {
            return state.customer.purchaser_document;
        },

        GetCustomerInscription(state)
        {
            return state.customer.inscription;
        },

        GetCustomerContact(state)
        {
            return state.customer.contact;
        },

        GetCustomerCellPhone(state)
        {
            return state.customer.cell_phone;
        },

        GetCustomerPhone1(state)
        {
            return state.customer.phone_1;
        },

        GetCustomerPhone2(state)
        {
            return state.customer.phone_2;
        },

        GetCustomerPhone2(state)
        {
            return state.customer.phone_2;
        },

        GetCustomerEmail(state)
        {
            return state.customer.email;
        },

        GetCustomersData(state)
        {
            return state.customer;
        },

        GetCustomerAddress(state)
        {
            if (state.customer != {}) {
                return state.customer.addresses;
            }

            return false;
        }
    }

}
