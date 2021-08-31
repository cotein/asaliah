<template>
<div class="row">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-header" >
                Caraterísticas
                <span class="pull-right">
                    <strong>{{data.title}}</strong>
                </span>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="text-center col-md-1">#</th>
                    <th class="text-center  col-md-1">ID</th>
                    <th class="text-center col-md-1">Disponibles</th>
                    <th class="text-center col-md-1">Vendidas</th>
                    <th class="text-center col-md-2">Attributos</th>
                    <th class="text-center col-md-3">Nueva Cantidad</th>
                    <th class="text-center col-md-3">Nuevo Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">{{data.id}}</td>
                        <td class="text-center">{{data.available_quantity}}</td>
                        <td class="text-center">{{data.sold_quantity}}</td>
                        <td class="text-center">---</td>
                        <td class="text-center" > 
                            <div class="form form-horizontal">
                            <label > 
                                <div style="padding-left:10px" class="btn-group btn-group-sm" role="group">
                                    <button  @click="decrement_quantity" class="btn btn-default" type="button" >
                                        <span class="icon icon-minus"></span>
                                    </button>
                                    <vue-autonumeric 
                                        class="btn btn-default text-right"
                                        style="width:71px"
                                        :options=int_options
                                        v-model="quantity"
                                    ></vue-autonumeric>
                                    <button @click="increment_quantity" class="btn btn-default pull-right" type="button" >
                                        <span class="icon icon-plus"></span>
                                    </button>
                                </div>
                            </label>
                            <button  
                                    class="btn btn-primary btn-xs" 
                                    type="button" 
                                    @click="update_available_quantity_on_publication"
                                    :class="{'spinner spinner-inverse spinner-sm' : show_spinner_quantity}">
                                Actualizar
                            </button>
                            </div>
                        </td>
                        <td class="text-center"> 
                            <div class="form form-horizontal">
                                <vue-autonumeric 
                                    class="text-right"
                                    style="width:121px"
                                    :options=money_options
                                    v-model="new_price"
                                ></vue-autonumeric>
                                <button  
                                        class="btn btn-primary btn-xs" 
                                        type="button" 
                                        @click="update_price_on_publication"
                                        :class="{'spinner spinner-inverse spinner-sm' : show_spinner_price}">
                                    Actualizar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import Datepicker from 'vuejs-datepicker';
    import {es} from 'vuejs-datepicker/dist/locale';
    import auth from './../../../../../mixins/auth';
    import sleep from './../../../../../mixins/sleep-mixin';
    import toast_mixin from './../../../../../mixins/toast-mixin';
    import VueAutonumeric from '../../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        props: ['data'],
        components : {VueAutonumeric},
        mixins : [auth, toast_mixin, sleep],
        data() {
            return {
                show_spinner_quantity :false,
                show_spinner_price : false,
                new_price : 0,
                quantity  : 0,
                money_options : {
                    digitGroupSeparator: '.',
                    decimalCharacter: ',',
                    decimalCharacterAlternative: '.',
                    currencySymbol: '$ ',
                    currencySymbolPlacement: 'p',
                    roundingMethod: 'U',
                    minimumValue: '0',
                    modifyValueOnWheel  : false,
                    showOnlyNumbersOnFocus : true,
                },
                int_options : {
                    digitGroupSeparator: '.',
                    decimalCharacter: ',',
                    decimalCharacterAlternative: '.',
                    decimalPlaces : '0',
                    roundingMethod: 'U',
                    minimumValue: '0',
                    modifyValueOnWheel  : false,
                    showOnlyNumbersOnFocus : true,
                },
            }
        },

        methods : {

            increment_quantity()
            {
                this.quantity = this.quantity + 1
            },

            decrement_quantity()
            {
                if (this.quantity == 0) {
                    this.quantity = 0;
                }else{

                    this.quantity = this.quantity - 1
                }
            },

            async update_available_quantity_on_publication()
            {
                this.show_spinner_quantity = true;
                
                let payload = {
                    token : this.User.token,
                    publication_id : this.data.id,
                    available_quantity : this.quantity
                }
                this.sleep(500);
                let publication = await this.$store.dispatch('update_available_quantity_on_publication', payload)
                .catch((error) => {
                    console.log(error.response);
                 }).finally(()=> this.show_spinner_quantity = false);
                
                if (publication) {
                    let data = {
                        publication : publication.data.body,
                    }
                    Event.$emit('update_available_quantity_on_publication', data.publication);
                    this.success_message('Cantidad actualizada correctamente', 'Publicaciones', 3000);
                }
            },

            async update_price_on_publication  () {
                
                this.show_spinner_price = true;
                
                let payload = {
                    token : this.User.token,
                    publication_id : this.data.id,
                    price : this.new_price
                }
                this.sleep(500);
                let publication = await this.$store.dispatch('update_price_on_publication', payload)
                .catch((error) => {
                    console.log(error.response);
                 }).finally(()=> this.show_spinner_price = false);
                
                if (publication) {
                    let data = {
                        publication : publication.data.body,
                    }
                    Event.$emit('update_price_on_publication', data.publication);
                    this.success_message('Cantidad actualizada correctamente', 'Publicaciones', 3000);
                }
            }
            
        },
    }
</script>
