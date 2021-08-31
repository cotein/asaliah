
<script>
    import {Event} from 'vue-tables-2';
    import TaxesStatesBase from './TaxesStatesBase';
    
    export default {

        extends : TaxesStatesBase,
        
        watch : {

            state(n){

                this.$store.commit('TAX_SET_STATE', n);
            }
        },

        mounted(){

            Event.$on('set_tax_initial_status', () => {
                this.state = null
            });
            
        }
        
    }
</script>
