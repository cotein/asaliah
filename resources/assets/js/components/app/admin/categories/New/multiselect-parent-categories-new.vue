<script>
    import {mapGetters} from 'vuex';
    import multiselect_categories from './../Base/multiselect-categories';
    import parentCategoryMixin from './../../../../../mixins/Categories/parent-category-mixin';
    export default {

        extends : multiselect_categories,

        mixins : [parentCategoryMixin],

        data(){
            return{
                index : 0
            }
        },

        computed : {

            ...mapGetters([
                'IsParentCategoryGetter',
            ]),
        }
            
    }
</script>
