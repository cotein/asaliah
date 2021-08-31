
<script>
    import TaxesTypesBase from './TaxesTypeBase';

    export default {

        extends : TaxesTypesBase,
        
        watch : {

            type(n){

                this.loading = true;

                this.sleep(200);
                
                let payload = {
                    token : this.User.token,
                    tax_id : this.data.id,
                    type : this.type,
                }

                let type = this.$store.dispatch('set_type', payload)
                    .catch((err) => {
                        this.error_message('No se pudo actualizar la categoría a la que pertenece éste impuesto.', 'Impuestos');
                    }).finally(() => this.loading = false);
                
                if (type) {
                    this.success_message('Categoría actualizada correctamente.', 'Impuestos');
                }
                
            }
        },
        
        mounted()
        {
            this.type.id = this.data.type_id;
            this.type.name = this.data.type_name;
        }
    }
</script>

<style lang="scss" scoped>

</style>