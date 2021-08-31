<script>
    import {mapGetters} from 'vuex';
    import childCategoryMixin from './../../../../../mixins/Categories/child-category-mixin';
    import multiselect_categories from './../Base/multiselect-categories'
    export default {

        extends : multiselect_categories,

        props : ['index'],

        mixins : [childCategoryMixin],

    }
</script>
