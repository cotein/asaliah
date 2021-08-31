const mutations = {

    ADD_TAX(state, value)
    {
        state.taxes.push(value);
    },

    SET_TAXES(state, value)
    {
        state.taxes = value;
    },

    SET_TAX_TYPES(state, value)
    {
        state.tax_types = value;
    },

    TAX_SET_ACCOUNTING_ACCOUNT(state, value)
    {
        state.tax.accounting_account = value;
    },

    TAX_SET_STATE(state, value)
    {
        state.tax.state = value;
    },

    TAX_SET_TYPE(state, value)
    {
        state.tax.type = value;
    },

    TAX_SET_NAME(state, value)
    {
        state.tax.name = value;
    },

    TAX_SET_INITIAL_STATUS(state)
    {
        state.tax = {
            name : null,
            accounting_account : null,
            type : null,
            state : null,
            active : true
        }
    },




}

export default mutations;