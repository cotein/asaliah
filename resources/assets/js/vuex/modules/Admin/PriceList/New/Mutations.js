export const NEW_PRICE_LIST_SET_NAME = (state, value) => {
    state.price_list.name = value;
}
 
export const NEW_PRICE_LIST_SET_BENEFIT = (state, value) => {
    state.price_list.benefit = value;
}

export const ADD_NEW_PRICE_LIST_TO_LIST = (state, value) => {
    state.list.unshift(value);
}
