<template>
    <tr>
        <td></td>
        <td class="text-center">{{publication.id}}</td>
        <td class="text-center">---</td>
        <td class="text-center">---</td>
        <td class="text-center">---</td>
        <td class="text-center">
            <div class="">
                <label > 
                    <div style="padding-left:10px" class="btn-group btn-group-sm" role="group">
                        <button  @click="decrement" class="btn btn-default" type="button" >
                            <span class="icon icon-minus"></span>
                        </button>
                        <div class="btn texto">
                            {{quantity}}
                        </div>
                        <button @click="increment" class="btn btn-default" type="button" >
                            <span class="icon icon-plus"></span>
                        </button>
                    </div>
                </label>
            </div>
        </td>
        <td class="text-center">
            <button @click="avalilable_quantity_change" 
                    class="btn btn-primary btn-xs" 
                    type="button" 
                    :class="{'spinner spinner-inverse spinner-sm' : show_spinner}">
                Actualizar
            </button>
        </td>
    </tr>
</template>

<script>
import {Event} from 'vue-tables-2';
import auth from './../../../../mixins/auth';
import toast_mixin from './../../../../mixins/toast-mixin';
export default {
    props : ['publication'],
    mixins : [auth, toast_mixin],
    data(){
        return {
            quantity : 0,
            show_spinner : false,
        }
    },
    methods : {

        increment()
        {
            this.quantity++;
        },

        decrement()
        {
            if (! (this.quantity < 1)) {
                
                this.quantity--;
            }
        },


        async avalilable_quantity_change()
            {
                this.show_spinner = true;
                try {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                    let response = await axios.put('/api/mercadolibre/avalilable_quantity_change',
                    {
                        item_id : this.publication.id,
                        quantity : this.quantity,
                    });

                    this.show_spinner = false;
                    
                    console.log(response);
                    Event.$emit('available_quantity_change', response.data.body);
                    
                    this.success_message('Cantidad actualizada correctamente', 'Publicación', 3000);

                } catch (e) {
                    console.log('error en avalilable_quantity_change action');
                    console.log(e);
                }
            },
    }

}
</script>

<style>

</style>