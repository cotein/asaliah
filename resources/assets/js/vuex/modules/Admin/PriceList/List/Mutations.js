export const PRICE_LIST_SET_LIST = (state, value) => {
    state.list = value;
}

export const NEW_PRICE_LIST_ADD_ONE_PRICE_LIST = (state, value) => {
    state.list.unshift(value)
}