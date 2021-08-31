<script>
    import {mapGetters} from 'vuex';
    import multiselect_provider_base from './../Base/multiselect-provider-base'
    import multiselect_provider from './../../../../../mixins/Products/ProviderMultiselect';
    export default {

        extends : multiselect_provider_base,

        mixins : [multiselect_provider],
        
        data(){
            return {
                loading : false,
            }
        },
    }
</script>
