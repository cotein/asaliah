import {mapGetters, mapActions} from 'vuex';
export default {

    data(){
        return {
            loading : false,
        }
    },

    methods : {
        
        updateCategoryValue(category){
            
            if (category && category.id) {
                this.$store.commit('ADD_CATEGORY_TO_SELECTED_CATEGORIES_FROM_ROOT', category);
                if (parseInt(category.parent_id) > 0) {
                    this.$store.commit('NEW_CATEGORY_SET_PARENT_ID', category);
                }
            }else{
                this.$store.commit('CLEAR_CATEGORY_ON_SELECTED_PATH_FROM_ROOT', this.index);
            }
        },

        async selectedCategory(el){

            let payload = {
                token : this.User.token,
                category_id : el.id
            }

            let categories = await this.$store.dispatch('fetchChildCategories', payload)
                .catch((err) => {
                    console.error(err);
                });
            
            if (categories) {
                if (categories.data.length) {
                    this.$store.commit('SET_CHILD_CATEGORIES', categories.data);
                }
            }
        },

        removeCategory()
        {
            this.$store.commit('CLEAR_MY_CHILD_CATEGORIES', this.index);
        }
    },

    computed : {

        ...mapGetters([
            'ChildCategory',
            'SelectedCategoriesFromRootGetter',
            'IsParentCategoryGetter'
        ]),
        

        Categories(){
            return this.ChildCategory(this.index);
        },

        CategoryValue(){
            return this.SelectedCategoriesFromRootGetter[this.index + 1];
        }
        
    },
}