
<script>
    import TaxesAccountingAccountBase from './TaxesAccountingAccountBase'
    export default {

        extends : TaxesAccountingAccountBase,
        
        watch : {

            async accounting_account(n){

                this.loading = true;

                this.sleep(200);
                
                let payload = {
                    token : this.User.token,
                    tax_id : this.data.id,
                    accounting_account : this.accounting_account,
                }

                let accounting_account = await this.$store.dispatch('set_accounting_account', payload)
                    .catch((err) => {
                        this.error_message('No se pudo actualizar la cuenta contable', 'Impuestos');
                    }).finally(() => this.loading = false);
                
                if (accounting_account) {
                    this.success_message('Cuenta contable actualizada correctamente', 'Impuestos');
                }
            }
        },

        mounted()
        {
            this.accounting_account.id = this.data.accounting_account_id;
            this.accounting_account.name = this.data.accounting_account_name;
        }
    }
</script>
