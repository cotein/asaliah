const mutations = {

    NEW_PRODUCT_SET_PARENT_ID(state, value)
    {
        state.product.parent_id = value;
    },

    NEW_PRODUCT_SET_PROVIDER_ID(state, value)
    {
        state.product.provider_id = value;
    },

    NEW_PRODUCT_SET_ATTRIBUTES(state, value)
    {
        state.product.attributes = value;
    },

    NEW_PRODUCT_SET_NAME(state, value)
    {
        state.product.name = value;
    },

    NEW_PRODUCT_SET_ATTRIBUTE(state, payload)
    {
        state.product.attributes[payload.index].value = payload.value;
    },

    NEW_PRODUCT_SET_CODE(state, value)
    {
        state.product.code = value;
    },

    NEW_PRODUCT_SET_PRODUCT_CODE_ON_SUPPLIER(state, value)
    {
        state.product.code_on_supplier = value;
    },
    
    NEW_PRODUCT_SET_PRODUCT_NAME_ON_SUPPLIER(state, value)
    {
        state.product.name_on_supplier = value;
    },

    NEW_PRODUCT_SET_SUPPLIER_DATA(state, value)
    {
        state.product.supplier = value;
    },

    NEW_PRODUCT_SET_CATEGORY_ID(state, value)
    {
        state.product.category_id = value.id;
        state.category_id_history.push(value.id);
    },

    NEW_PRODUCT_DELETE_PARENT_CATEGORY(state)
    {
        state.product.category_id = null;
        state.category_id_history = [];
    },

    NEW_PRODUCT_DELETE_CATEGORY_ID(state, category_id)
    {
        state.product.category_id = null;
    },

    NEW_PRODUCT_SET_DESCRIPTION(state, value)
    {
        state.product.description = value;
    },

    NEW_PRODUCT_ADD_PRICE_LIST(state, value){
        state.product.price.push(value);
    },

    NEW_PRODUCT_SET_PRICE(state, payload)
    {
        state.product.price[payload.index].price_list_id = payload.price_list_id;
        state.product.price[payload.index].price = payload.price;
    },

    NEW_PRODUCT_SET_INITIAL_STATUS(state){
        state.product.category_id_history = [],
        state.product.id = null,
        state.product.category_id = null,
        state.product.name = null,
        state.product.name_on_supplier = null,
        state.product.code = null,
        state.product.code_on_supplier = null,
        state.product.supplier = null,
        state.product.attributes = [],
        state.product.description = '',
        state.product.price = [];
        state.product.images = [];
    },

    EDIT_PRODUCT_SET_PRICE(state, payload)
    {
        let value = {
            price_list_id : '',
            price : '',
        }

        state.product.price.push(value);

        setTimeout(() => {
            state.product.price[payload.index].price_list_id = payload.price_list_id;
            state.product.price[payload.index].price = payload.price;
        }, 150);
    },

    EDIT_PRODUCT_SET_ID(state, value)
    {
        state.product.id = value;
    },
    

}

export default mutations;