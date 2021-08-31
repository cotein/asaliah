const mutations = {

    IVA_COMPRAS_SET_COMPROBANTES(state, value)
    {
        state.comprobantes = [];
        state.comprobantes = value;
    },

    IVA_COMPRAS_SET_ALICUOTAS(state, value)
    {
        state.alicuotas = [];
        state.alicuotas = value;
    },

    IVA_COMPRAS_FROM_DATE(state, value)
    {
        state.from_date = value;
    },

    IVA_COMPRAS_TO_DATE(state, value)
    {
        state.to_date = value;
    }

}

export default mutations;