
<script>
import TaxesStatesBase from './TaxesStatesBase'
export default {
    
    extends : TaxesStatesBase,

    watch: {
        
        state(n)
        {
            this.loading = true;

            this.sleep(200);
                
            let payload = {
                token : this.User.token,
                tax_id : this.data.id,
                type : this.type,
            }

            let state = this.$store.dispatch('set_state', payload)
                .catch((err) => {
                    this.error_message('No se pudo actualizar la categoría a la que pertenece éste impuesto.', 'Impuestos');
                })
                .finally(() => this.loading = false);
            
            if (state) {
                this.success_message('Categoría actualizada correctamente.', 'Impuestos');
            }
        }
    },
    
    mounted()
    {
        if (this.data.state_id) {
            this.state.id = this.data.state_id;
            this.state.name = this.data.state_name;
        }
    }

}
</script>