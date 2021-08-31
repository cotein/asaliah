import collect from 'collect.js';

const mutations = {

    ADD_CATEGORIES(state, categories){
        state.categories = categories;
    },

    ADD_MAIN_CATEGORIES(state, main_categories){
        state.main_categories = main_categories;
    },

    SHOW_ALL_CATEGORY_FILTER(state){
        
        let categories = collect(state.categories);

        categories.each((cat, index) => {
            
            cat.show = true;
                
        });

    },
    
    SHOW_CATEGORY(state, category_id){
        
        let categories = collect(state.categories);

        categories.each((cat, index) => {
            
            if (cat.id == category_id) {

                cat.show = true;
                
            }
        });
    },

    SET_PARENT_CATEGORIES(state, value)
    {
        state.parent_categories = value;
    },

    SET_CHILD_CATEGORIES(state, value)
    {
        state.child_categories.push(value);
    },

    NEW_CATEGORY_SET_NAME(state, value)
    {
        state.new_category.name = value;
    },

    NEW_CATEGORY_SET_PARENT_ID(state, value)
    {
        if (value) {
            state.new_category.parent_id = value.id;
        }
    }, 

    NEW_CATEGORY_SET_IS_PARENT_CATEGORY(state, value)
    {
        state.new_category.is_parent_category = value;
    },

    ADD_ATTRIBUTE_TO_CATEGORY(state){
        state.new_category.attributes.unshift({'name' : '', 'value' : ''});
    },

    DELETE_ATTRIBUTE_FROM_CATEGORY(state, index){
        state.new_category.attributes.splice(index, 1);
    },

    SET_NAME_TO_ATTRIBUTE(state, payload){
        state.new_category.attributes[payload.index].name = payload.name;
    },

    CLEAR_CHILD_CATEGORIES(state){
        state.child_categories = [];
    },

    CLEAR_MY_CHILD_CATEGORIES(state, index){
        let count = state.child_categories.length;
        let my_first_son = index + 1;
        state.child_categories.splice(my_first_son, count);
    },
    
    CLEAR_CATEGORY_ON_SELECTED_PATH_FROM_ROOT(state, index){
        let count = state.selected_categories_from_root.length;
        let my_first_son = index + 1;
        state.selected_categories_from_root.splice(my_first_son, count);
    },

    CLEAR_DATA_FROM_NEW_CATEGORY(state)
    {
        state.new_category.name = null,
        state.new_category.parent_id = null,
        state.new_category.is_parent_category = false,
        state.new_category.attributes = [ {name : ''} ]
    },

    SET_CATEGORY_INITIAL_STATUS(state)
    {
        state.child_categories = [],
        state.selected_categories_from_root = [];
        state.new_category = {
            name : null,
            parent_id : null,
            is_parent_category : false,
            attributes : [
                {name : ''}
            ]
        }
    },

    EDIT_PRODUCT_SET_CHILD_CATEGORIES(state, value)
    {
        state.child_categories = value;
    },

    ADD_CATEGORY_TO_SELECTED_CATEGORIES_FROM_ROOT(state, value)
    {
        state.selected_categories_from_root.push(value);
    },

    SET_CATEGORIES_TO_SELECTED_CATEGORIES_FROM_ROOT(state, value)
    {
        state.selected_categories_from_root = value;
    },



}

export default mutations;