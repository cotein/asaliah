import {mapGetters, mapActions} from 'vuex';
export default {

    data(){
        return {
            loading : false,
            index : 0
        }
    },

    methods : {
        
        ...mapActions([
            'updateCategoryValue'
        ]),

        async selectedCategory(el){

            let payload = {
                token : this.User.token,
                category_id : el.id
            }

            this.$store.commit('CLEAR_CHILD_CATEGORIES');

            let categories = await this.$store.dispatch('fetchChildCategories', payload)
                .catch((err) => {
                    console.error(err);
                });
            
            if (categories) {
                this.$store.commit('SET_CHILD_CATEGORIES', categories.data);
            }
        },

        removeCategory()
        {
            
            /* this.$store.commit('CLEAR_DATA_FROM_NEW_CATEGORY');
            this.$store.commit('CLEAR_CHILD_CATEGORIES');
            this.$store.commit('CLEAR_CATEGORY_ON_SELECTED_PATH_FROM_ROOT', this.index); */
        }
    },

    watch : {

        IsParentCategoryGetter(n){

            if (n) {
                
                this.parent_id = '';
                
                this.$store.commit('CLEAR_CHILD_CATEGORIES');
            }
        }
    },
    computed : {

        Categories(){
            return this.ParentCategories;
        },

        ...mapGetters([
            'ParentCategories',
            'SelectedCategoriesFromRootGetter',
        ]),

        CategoryValue(){
            return this.SelectedCategoriesFromRootGetter[this.index];
        }
    },
    
    async mounted(){

        let categories = await this.$store.dispatch('fetchParentCategories', this.User.token);

        if (categories) {
            this.$store.commit('SET_PARENT_CATEGORIES', categories.data);
        }
    }
}