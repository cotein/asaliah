const mutations = {

    SET_PROVIDER_NAME(state, value){
        state.provider.name = value
    },

    SET_PROVIDER_INSCRIPTION(state, value){
        state.provider.inscription = value
    },

    SET_PROVIDER_PURCHASE_DOCUMENT(state, value){
        state.provider.purchase_document = value
    },

    SET_PROVIDER_ADDRESS_TYPE(state, value)
    {
        state.provider.address.type = value
    },

    SET_PROVIDER_ADDRESS_PROVINCE(state, value)
    {
        state.provider.address.state = value
    },

    SET_PROVIDER_ADDRESS_CITY(state, value)
    {
        state.provider.address.city = value
    },

    SET_PROVIDER_ADDRESS_CP(state, value)
    {
        state.provider.address.cp = value
    },

    SET_PROVIDER_ADDRESS_ADDRESS(state, value)
    {
        state.provider.address.address = value
    },

    SET_PROVIDER_ADDRESS_NUMBER(state, value)
    {
        state.provider.address.number = value
    },

    SET_PROVIDER_ADDRESS_BETWEEN(state, value)
    {
        state.provider.address.between = value
    },

    SET_PROVIDER_ADDRESS_OBS(state, value)
    {
        state.provider.address.obs = value
    },

    SET_PROVIDER_CONTACT_NAME(state, value)
    {
        state.provider.contact.name = value
    },

    SET_PROVIDER_CONTACT_EMAIL(state, value)
    {
        state.provider.contact.email = value
    },

    SET_PROVIDER_CONTACT_CELLPHONE(state, value)
    {
        state.provider.contact.cell_phone = value
    },

    SET_PROVIDER_CONTACT_PHONE1(state, value)
    {
        state.provider.contact.phone_1 = value
    },

    SET_PROVIDER_CONTACT_PHONE2(state, value)
    {
        state.provider.contact.phone_2 = value
    },

    SET_PROVIDER_CONTACT_PHONE3(state, value)
    {
        state.provider.contact.phone_3 = value
    },

    SET_PROVIDER_REGIMEN(state, value)
    {
        state.provider.regimen = value
    },

    SET_PROVIDER_STATUS(state, value)
    {
        state.provider.status = value
    },
    
    SET_PROVIDER_TIPO_PERSONA(state, value)
    {
        state.provider.tipo_persona = value
    },

    SET_PROVIDER_TIPO_CLAVE(state, value)
    {
        state.provider.tipo_clave = value
    },

    SET_PROVIDER_NUMBER(state, value)
    {
        state.provider.number = value
    },

    SET_PROVIDER_TAX_GCIAS_EXEMPT(state, value)
    {
        state.provider.taxes.gcias_exempt = value
    },

    SET_PROVIDER_TAX_IIBB_EXEMPT(state, value)
    {
        state.provider.taxes.iibb_exempt = value
    },

    SET_PROVIDER_TAX_IVA_EXEMPT(state, value)
    {
        state.provider.taxes.iva_exempt = value
    },

    SET_PROVIDER_TAX_SUSS_EXEMPT(state, value)
    {
        state.provider.taxes.suss_exempt = value
    },

    SET_PROVIDER_ACCOUNTING_ACCOUNT(state, value)
    {
        state.provider.accounting_account = value;
    },

    SET_PROVIDER_SUBLEVEL_ACCOUNTING_ACCOUNT(state, value)
    {
        state.provider.sublevel_accounting_account = value;
    },

    SET_PROVIDER_AFIP_DATA(state, value)
    {
        state.provider.afip_data = value;
    },

    SET_PROVIDER_INITIAL_DATA(state)
    {
        state.provider = {
            name : null,
            status : false,
            tipo_persona : false,
            tipo_clave : false,
            inscription : {},
            purchase_document : {},
            number : null,
            regimen : null,
            accounting_account : {
                id : 52,
                account : 211001,
                name : 'PROVEEDORES'
            },
            sublevel_accounting_account : {},
            address : {
                type : null,
                state : null,
                city : null,
                address : null,
                number : null,
                cp : null,
                between : null,
                obs : null
            },
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

    SET_PROVIDERS(state, value)
    {
        state.providers = value;
    },

    SET_SELECTED_PROVIDER(state, value)
    {
        state.selected_provider = value;
    }
}

export default mutations;