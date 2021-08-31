const getters = {

    TaxesGetter(state)
    {
        return state.taxes;
    },

    TaxNameGetter(state)
    {
        return state.tax.name;
    },

    TaxGetter(state)
    {
        return state.tax;
    }
}

export default getters;