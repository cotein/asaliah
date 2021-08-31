const getters = {

    IvaComprasComprobantesGetter(state)
    {
        return state.comprobantes;
    },

    IvaComprasFromDateGetter(state)
    {
        return state.from_date;
    },

    IvaComprasToDateGetter(state)
    {
        return state.to_date;
    }
}

export default getters;