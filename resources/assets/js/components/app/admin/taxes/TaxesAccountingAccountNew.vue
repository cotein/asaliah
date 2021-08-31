
<script>
    import TaxesAccountingAccountBase from './TaxesAccountingAccountBase'
    export default {

        extends : TaxesAccountingAccountBase,
        
        watch : {

            accounting_account(n){
                console.log(n);
                this.$store.commit('TAX_SET_ACCOUNTING_ACCOUNT', n);
            }
        },

        mounted(){

            Event.$on('set_tax_initial_status', () => {
                this.accounting_account = null
            });
            
        }
        
    }
</script>
