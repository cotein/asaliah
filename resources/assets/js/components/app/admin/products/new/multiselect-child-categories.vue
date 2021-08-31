<script>
import collect from 'collect.js';
    import {mapGetters} from 'vuex';
    import child_category_mixin from '../../../../../mixins/Categories/child-category-mixin';
    import multiselect_child_categories from '../../categories/New/multiselect-child-categories-new.vue'
    
    export default {

        extends : multiselect_child_categories,

        mixins : child_category_mixin,

        data(){
            return {
                loading : false,
                parent_id : ''
            }
        },

        methods : {
            
            async selectedCategory(category){

                let payload = {
                    token : this.User.token,
                    category_id : category.id
                }

                if (collect(category.attributes).isEmpty() ) {

                    let categories = await this.$store.dispatch('fetchChildCategories', payload)
                    .catch((err) => {
                        console.error(err);
                    });
                
                    if (categories) {
                        if (categories.data.length) {
                            this.$store.commit('SET_CHILD_CATEGORIES', categories.data);
                        }
                    }
                    
                }else{
                    console.log(category);
                    this.$store.commit('NEW_PRODUCT_SET_ATTRIBUTES', category.attributes);
                    this.$store.commit('NEW_PRODUCT_SET_CATEGORY_ID', category);
                }
                
            },
            
            removeCategory(category){
                this.$store.commit('CLEAR_MY_CHILD_CATEGORIES');
                this.$store.commit('NEW_PRODUCT_DELETE_CATEGORY_ID');
            }
        },

        watch : {
            
        },
        
        computed : {
            
            
        }        
    }
</script>
