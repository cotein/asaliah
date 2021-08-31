
<script>
    import {Event} from 'vue-tables-2';
    import TaxesTypeBase from './TaxesTypeBase';
    export default {

        extends : TaxesTypeBase,
        
        watch : {

            type(n){

                this.$store.commit('TAX_SET_TYPE', n);
            }
        },

        mounted(){

            Event.$on('set_tax_initial_status', () => {
                this.type = null
            })
        }
        
    }
</script>
