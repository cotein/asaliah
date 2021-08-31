<template>
    <div :class="colmd">
        <div v-if="HasVariations">
            <h5>Variantes</h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Talle</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Modificar Cantidad</th>
                        <th class="text-center">Actualizar Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <variation v-for="(variation, index) in publication.variations" 
                        :index="index" 
                        :variation="variation" 
                        :key="index"
                        :publication_id="publication.id"
                        :token="token">
                    </variation>
                </tbody>
            </table>
        </div>
        <div v-else>
            <h5>Datos del producto</h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">Talle</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Modificar Cantidad</th>
                        <th class="text-center">Actualizar Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <available_quantity_change :publication="publication"/>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import collect from 'collect.js';
    import variation from './variation';
    import auth from './../../../../mixins/auth';
    import available_quantity_change from './available_quantity_change';
    export default {
        props : ['colmd', 'publication', 'token'],
        components : {
            variation, available_quantity_change
        },
        data(){
            return {
                show_spinner : false
            }
        },
        mixins : [auth],
        computed : {

            HasVariations()
            {
                let variations = collect(this.publication.variations);

                if (variations.count() > 0) {
                    return true;
                } 
                return false;
            }
        },

        methods : {

            update_available_quantity(){
                
                let $vm = this;

                $vm.show_spinner = true;

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' +  this.User.token;
                    
                setTimeout(() => {

                    axios.put('/api/publication/update_available_quantity', 
                    {
                        'variation' : $vm.publication
                    }
                    ).then((result) => {

                        $vm.show_spinner = false;

                        $vm.$toast.info('Variación sincronizada correctamente.', 'Proceso exitoso', $vm.InfoOk);    

                        $vm.publication.available_quantity = result.data.body.available_quantity;
                    
                    }).catch((err) => {
                    
                        $vm.show_spinner = false;

                        $vm.$toast.error('Error: ' + err.response.status + ' Mensaje: ' + err.response.data , 'Se ha producido un error', $vm.ErrorNotification);    

                    });

                }, 500);
            }
        }
    }
</script>
