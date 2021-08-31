const mutations = {

    SET_ACCOUNTING_ACCOUNT(state, value)
    {
        state.accounting_account = value;
    },

    SET_ACCOUNTING_ACCOUNTS(state, value)
    {
        state.accounting_accounts = value;
    },

    ADD_ACCOUNTING_ACCOUNT(state, value)
    {
        state.accounting_accounts.push(value);
    }
}

export default mutations;