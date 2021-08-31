const getters = {

    ParentCategories(state){
        if (state.parent_categories != null) {
            return state.parent_categories;
        }
        return [];
    },

    ChildCategory(state){

        return (index) => {
            return state.child_categories[index];
        }
    },

    ChildCategories(state)
    {
        return state.child_categories;
    },
    
    NewCategory(state){
        return state.new_category;
    },

    IsParentCategoryGetter(state)
    {
        return state.new_category.is_parent_category;
    },

    AttributesFromCategoryGetter(state){
        return state.new_category.attributes;
    },

    SelectedCategoriesFromRootGetter(state)
    {
        return state.selected_categories_from_root;
    },

}

export default getters;