import { getField, updateField } from 'vuex-map-fields';

export default {
    state : {
        selected_customer : false,
        customer : {
            id : null,
            name : null,
            status : false,
            tipo_persona : false,
            tipo_clave : false,
            inscription : {},
            type : {
                id : 2,
                name : 'MAYORISTA'
            },
            purchase_document : {},
            number : null,
            regimen : null,
            accounting_account : {
                id : 16,
                account : 112100,
                name : 'CLIENTES'
            },
            sublevel_accounting_account : {},
            addresses : [
                {
                    id : null,
                    type : {
                        id : 1,
                        name : 'FISCAL'
                    },
                    state : {
                        id : '',
                        name : '',
                    },
                    city : {
                        id : '',
                        name : '',
                    },
                    address : '',
                    number : '',
                    cp : '',
                    between : '',
                    obs : ''
                },
            ],
            /* address : {
                type : null,
                state : null,
                city : null,
                address : null,
                number : null,
                cp : null,
                between : null,
                obs : null
            }, */
            contact : {
                name : null,
                email : null,
                cell_phone : null,
                phone_1 : null,
                phone_2 : null,
                phone_3 : null,
            },
            taxes : {
                iibb_exempt : false,
                iva_exempt : false,
                gcias_exempt : false,
                suss_exempt : false,
            },
            afip_data : {}
        }
    },

    mutations : {

        updateField,

        SET_CUSTOMER_TYPE(state, value){
            state.customer.type = value
        },

        SET_CUSTOMER_NAME(state, value){
            state.customer.name = value
        },

        SET_CUSTOMER_ID(state, value){
            state.customer.id = value
        },

        SET_CUSTOMER_INSCRIPTION(state, value){
            state.customer.inscription = value
        },

        SET_CUSTOMER_PURCHASE_DOCUMENT(state, value){
            state.customer.purchase_document = value
        },

        SET_CUSTOMER_ADDRESS_ID(state, value)
        {
            state.customer.addresses[value.index].id = value.data;
        },

        SET_CUSTOMER_ADDRESS_TYPE(state, value)
        {
            state.customer.addresses[value.index].type = value.data;
        },

        SET_CUSTOMER_ADDRESS_PROVINCE(state, value)
        {
            state.customer.addresses[value.index].state = value.data;
        },

        SET_CUSTOMER_ADDRESS_CITY(state, value)
        {
            state.customer.addresses[value.index].city = value.data;
        },

        SET_CUSTOMER_ADDRESS_CP(state, value)
        {
            state.customer.addresses[value.index].cp = value.data;
        },

        SET_CUSTOMER_ADDRESS_ADDRESS(state, value)
        {
            state.customer.addresses[value.index].address = value.data;
        },

        SET_CUSTOMER_ADDRESS_NUMBER(state, value)
        {
            state.customer.addresses[value.index].number = value.data;
        },

        SET_CUSTOMER_ADDRESS_BETWEEN(state, value)
        {
            state.customer.addresses[value.index].between = value.data;
        },

        SET_CUSTOMER_ADDRESS_OBS(state, value)
        {
            state.customer.addresses[value.index].obs = value.data;
        },

        SET_CUSTOMER_CONTACT_NAME(state, value)
        {
            state.customer.contact.name = value
        },

        SET_CUSTOMER_CONTACT_EMAIL(state, value)
        {
            state.customer.contact.email = value
        },

        SET_CUSTOMER_CONTACT_CELLPHONE(state, value)
        {
            state.customer.contact.cell_phone = value
        },

        SET_CUSTOMER_CONTACT_PHONE1(state, value)
        {
            state.customer.contact.phone_1 = value
        },

        SET_CUSTOMER_CONTACT_PHONE2(state, value)
        {
            state.customer.contact.phone_2 = value
        },

        SET_CUSTOMER_CONTACT_PHONE3(state, value)
        {
            state.customer.contact.phone_3 = value
        },

        SET_CUSTOMER_REGIMEN(state, value)
        {
            state.customer.regimen = value
        },

        SET_CUSTOMER_STATUS(state, value)
        {
            state.customer.status = value
        },
        
        SET_CUSTOMER_TIPO_PERSONA(state, value)
        {
            state.customer.tipo_persona = value
        },

        SET_CUSTOMER_TIPO_CLAVE(state, value)
        {
            state.customer.tipo_clave = value
        },

        SET_CUSTOMER_NUMBER(state, value)
        {
            state.customer.number = value
        },

        SET_CUSTOMER_TAX_GCIAS_EXEMPT(state, value)
        {
            state.customer.taxes.gcias_exempt = value
        },

        SET_CUSTOMER_TAX_IIBB_EXEMPT(state, value)
        {
            state.customer.taxes.iibb_exempt = value
        },

        SET_CUSTOMER_TAX_IVA_EXEMPT(state, value)
        {
            state.customer.taxes.iva_exempt = value
        },

        SET_CUSTOMER_TAX_SUSS_EXEMPT(state, value)
        {
            state.customer.taxes.suss_exempt = value
        },

        SET_CUSTOMER_ACCOUNTING_ACCOUNT(state, value)
        {
            state.customer.accounting_account = value;
        },

        SET_CUSTOMER_SUBLEVEL_ACCOUNTING_ACCOUNT(state, value)
        {
            state.customer.sublevel_accounting_account = value;
        },

        SET_CUSTOMER_AFIP_DATA(state, value)
        {
            state.customer.afip_data = value;
        },

        ADD_NEW_ADDRESS(state)
        {
            state.customer.addresses.push(
                {
                    type : {
                        id : 1,
                        name : 'FISCAL'
                    },
                    state : {
                        id : '',
                        name : '',
                    },
                    city : {
                        id : '',
                        name : '',
                    },
                    address : null,
                    number : null,
                    cp : null,
                    between : null,
                    obs : null
                },
            );
        },

        SET_CUSTOMER_INITIAL_DATA(state)
        {
            state.customer = {
                name : null,
                status : false,
                tipo_persona : false,
                tipo_clave : false,
                inscription : {},
                type : {
                    id : 2,
                    name : 'MAYORISTA'
                },
                purchase_document : {},
                number : null,
                regimen : null,
                accounting_account : {
                    id : 16,
                    account : 112100,
                    name : 'CLIENTES'
                },
                sublevel_accounting_account : {},
                addresses : [
                    {
                        id : null,
                        type : {
                            id : 1,
                            name : 'FISCAL'
                        },
                        state : {
                            id : '',
                            name : '',
                        },
                        city : {
                            id : '',
                            name : '',
                        },
                        address : null,
                        number : null,
                        cp : null,
                        between : null,
                        obs : null
                    },
                ],
                /* address : {
                    type : null,
                    state : null,
                    city : null,
                    address : null,
                    number : null,
                    cp : null,
                    between : null,
                    obs : null
                }, */
                contact : {
                    name : null,
                    email : null,
                    cell_phone : null,
                    phone_1 : null,
                    phone_2 : null,
                    phone_3 : null,
                },
                taxes : {
                    iibb_exempt : false,
                    iva_exempt : false,
                    gcias_exempt : false,
                    suss_exempt : false,
                },
                afip_data : {}
            }
        },

        SET_CUSTOMERS(state, value)
        {
            state.customers = value;
        },

        SET_SELECTED_CUSTOMER(state, value)
        {
            state.selected_customer = value;
        }

    },

    actions : {

        async store_customer_from_form  ({state}, token) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/customer/store_from_form', {
                    customer : state.customer
                });

                return response

            } catch (e) {
                console.log('error en store_customer_form:dorm action');
                console.log(e);
                throw e;
            }
        },

        async customer_find_by_name({commit}, payload)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/customer/find_by_name', {
                    customer : payload.customer
                });

                commit('SET_CUSTOMERS', response.data);

                return response

            } catch (e) {
                console.log('error en customer_find_by_name action');
                console.log(e);
                throw e;
            }
        },

        async customer_update_from_modal({state}, token)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.put('/api/customer/update_from_modal', {
                    customer : state.customer
                });

                return response

            } catch (e) {
                console.log('error en customer_update_from_modal action');
                console.log(e);
                throw e;
            }
        },

        setCustomerType ({ commit }, value) {
            commit('SET_CUSTOMER_TYPE', value);
        },

        setCustomerInscription ({ commit }, value) {
            commit('SET_CUSTOMER_INSCRIPTION', value);
        },

        setCustomerPurchaseDocument ({ commit }, value) {
            commit('SET_CUSTOMER_PURCHASE_DOCUMENT', value);
        },

        setCustomerAddressType ({ commit }, value) {
            console.log('wwwwwwwwwwwwwwwwwwwwww');
            console.log(value);
            commit('SET_CUSTOMER_ADDRESS_TYPE', value);
        },

        setCustomerProvince ({ commit }, value) {
            commit('SET_CUSTOMER_ADDRESS_PROVINCE', value);
        },

        setCustomerRegimen ({ commit }, value) {
            commit('SET_CUSTOMER_REGIMEN', value);
        },

        setCustomerAccountingAccount ({ commit }, value) {
            commit('SET_CUSTOMER_ACCOUNTING_ACCOUNT', value);
        },

        setCustomerSubLevelAccountingAccount ({ commit }, value) {
            commit('SET_CUSTOMER_SUBLEVEL_ACCOUNTING_ACCOUNT', value);
        },

        setSelectedCustomer ({ commit }, value) {
            commit('SET_SELECTED_CUSTOMER', value);
            commit('PURCHASE_INVOICE_SET_CUSTOMER', value);
        },

    },

    getters : {

        CustomerName(state)
        {
            return state.customer.name
        },

        CustomerInscriptionGetter(state)
        {
            return state.customer.inscription
        },

        CustomerTypeGetter(state)
        {
            return state.customer.type
        },

        CustomerPurchaseDocumentGetter(state)
        {
            return state.customer.purchase_document
        },

        /* CustomerAddressType(state)
        {
            return state.customer.address.type;
        }, */
        

        CustomerAddressProvince(state)
        {
            return state.customer.address.state;
        },

        CustomerAddressCity(state)
        {
            return state.customer.address.city;
        },

        CustomerAddressCp(state)
        {
            return state.customer.address.cp;
        },

        CustomerAddressAddress(state)
        {
            return state.customer.address.address;
        },

        CustomerAddressNumber(state)
        {
            return state.customer.address.number;
        },

        CustomerAddressBetween(state)
        {
            return state.customer.address.between;
        },

        CustomerAddressObs(state)
        {
            return state.customer.address.obs;
        },

        CustomerContactName(state)
        {
            return state.customer.contact.name;
        },

        CustomerContactEmail(state)
        {
            return state.customer.contact.email;
        },

        CustomerContactCellPhone(state)
        {
            return state.customer.contact.cell_phone;
        },

        CustomerContactPhone1(state)
        {
            return state.customer.contact.phone_1;
        },

        CustomerContactPhone2(state)
        {
            return state.customer.contact.phone_2;
        },

        CustomerContactPhone3(state)
        {
            return state.customer.contact.phone_3;
        },

        CustomerRegimen(state)
        {
            return state.customer.regimen;
        },

        CustomerStatus(state)
        {
            return state.customer.status;
        },

        CustomerTipoPersona(state)
        {
            return state.customer.tipo_persona;
        },

        CustomerTipoClave(state)
        {
            return state.customer.tipo_clave;
        },

        CustomerNumber(state)
        {
            return state.customer.number;
        },

        CustomerTaxGciasExempt(state)
        {
            return state.customer.taxes.gcias_exempt;
        },

        CustomerTaxIIBBExempt(state)
        {
            return state.customer.taxes.iibb_exempt;
        },

        CustomerTaxIvaExempt(state)
        {
            return state.customer.taxes.iva_exempt;
        },

        CustomerTaxSUSSExempt(state)
        {
            return state.customer.taxes.suss_exempt;
        },

        CustomerAccountingAccount(state)
        {
            return state.customer.accounting_account;
        },

        CustomerSubLevelAccountingAccount(state)
        {
            return state.customer.sublevel_accounting_account;
        },

        SelectedCustomerGetter(state)
        {
            return state.selected_customer;
        },

        GetCustomersGetters(state)
        {
            return state.customers;
        },

        GetAddressCustomerNewGetter(state)
        {
            return state.customer.addresses;
        }
    }

}