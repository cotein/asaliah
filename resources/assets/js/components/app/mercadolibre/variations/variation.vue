<template>
    <tr>
        <td class="text-center">{{index + 1}}</td>
        <td class="text-center">{{variation.id}}</td>
        <td class="text-center">{{(typeof variation.attribute_combinations[0] === 'undefined') ? '---' : variation.attribute_combinations[0].value_name}}</td>
        <td class="text-center">{{(typeof variation.attribute_combinations[1] === 'undefined') ? '---' : variation.attribute_combinations[1].value_name}}</td>
        <td class="text-center">{{variation.available_quantity}}</td>
        <td class="text-center">
            <div class="">
                <label > 
                    <div style="padding-left:10px" class="btn-group btn-group-sm" role="group">
                        <button  @click="decrementAvailableQuantity" class="btn btn-default" type="button" >
                            <span class="icon icon-minus"></span>
                        </button>
                        <div class="btn texto">
                            {{publication.available_quantity}}
                        </div>
                        <button @click="incrementAvailableQuantity" class="btn btn-default" type="button" >
                            <span class="icon icon-plus"></span>
                        </button>
                    </div>
                </label>
            </div>
        </td>
        <td class="text-center">
            <button @click="update_available_quantity" 
                    class="btn btn-primary btn-xs" 
                    type="button" 
                    :class="{'spinner spinner-inverse spinner-sm' : show_spinner}">
                Actualizar
            </button>
        </td>
    </tr>
</template>

<script>
    import {mapGetters} from 'vuex';
    export default {
        props : ['index', 'variation', 'publication_id', 'token'],

        data() {
            return {
                publication : {
                    id : null,
                    variation_id : null,
                    available_quantity : null
                },
                show_spinner : false,
            }
        },
        methods : {
            incrementAvailableQuantity(){
            
                this.publication.available_quantity = this.publication.available_quantity + 1;
            },

            decrementAvailableQuantity(){
                
                this.publication.available_quantity = this.publication.available_quantity - 1;
            },

            update_available_quantity(){
                
                let $vm = this;

                $vm.show_spinner = true;

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' +  $vm.token;
                    
                setTimeout(() => {

                    axios.put('/api/publication/update_available_quantity', 
                    {
                        'variation' : $vm.publication
                    }
                    ).then((result) => {

                        $vm.show_spinner = false;

                        $vm.$toast.info('Variación sincronizada correctamente.', 'Proceso exitoso', $vm.InfoOk);    

                        $vm.variation.available_quantity = result.data.body.available_quantity;
                    
                    }).catch((err) => {
                    
                        $vm.show_spinner = false;

                        $vm.$toast.error('Error: ' + err.response.status + ' Mensaje: ' + err.response.data , 'Se ha producido un error', $vm.ErrorNotification);    

                    });

                }, 500);
            }
        },
        computed : {
            ...mapGetters([
                'InfoOk',
                'ErrorNotification'
            ])
        },

        watch : {

            variation(n)
            {
                console.log('////////////////////////////');
                console.log(n.id);
                console.log(n);
            }
        },
        mounted() {
            let $vm = this;

            $vm.publication.id = $vm.publication_id;

            $vm.publication.variation_id = $vm.variation.id;

            $vm.publication.available_quantity = $vm.variation.available_quantity;
        },
       
    }
</script>
