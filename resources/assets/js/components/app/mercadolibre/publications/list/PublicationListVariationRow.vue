<template>
    <tr>
        <td class="text-center">{{index + 1}}</td>
        <td class="text-center">{{variation.id}}</td>
        <td class="text-center">{{variation.available_quantity}}</td>
        <td class="text-center">{{variation.sold_quantity}}</td>
        <td class="text-center">
            <ul>
                <li v-for="attr in variation.attribute_combinations" :key="attr.name">
                    {{attr.name}} - {{attr.values[0].name}}
                </li>
            </ul>
        </td>
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
                    @click="update_available_quantity_on_variation"
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
                        @click="update_price_on_variation"
                        :class="{'spinner spinner-inverse spinner-sm' : show_spinner_price}">
                    Actualizar
                </button>
            </div>
        </td>
    </tr>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import Datepicker from 'vuejs-datepicker';
    import {es} from 'vuejs-datepicker/dist/locale';
    import auth from './../../../../../mixins/auth';
    import sleep_mixin from './../../../../../mixins/sleep-mixin';
    import toast_mixin from './../../../../../mixins/toast-mixin';
    import VueAutonumeric from '../../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';

    export default {
        props: ['variation', 'index', 'data'],
        components : {VueAutonumeric},
        mixins : [auth, toast_mixin, sleep_mixin],
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

            async update_available_quantity_on_variation()
            {
                this.show_spinner_quantity = true;
                
                let payload = {
                    token : this.User.token,
                    publication_id : this.data.id,
                    variations : [
                        {
                            id : this.variation.id,
                            available_quantity : this.quantity
                        }
                    ]
                }
                this.sleep(500);
                let publication = await this.$store.dispatch('update_available_quantity_on_variation', payload)
                .catch((error) => {
                    }).finally(()=> this.show_spinner_quantity = false);
                
                if (publication) {
                    let data = {
                        publication : publication.data.body,
                        variation_id : this.variation.id,
                        available_quantity : this.quantity
                    }

                    Event.$emit('update_available_quantity_on_variation', data);
                    this.success_message('Cantidad actualizada correctamente', 'Publicaciones', 3000);
                }
            },

            async update_price_on_variation()
            {
                this.show_spinner_price = true;

                let variations = collect(this.data.variations).map((v,index) => {
                    return [
                        {
                            'id' : v.id,
                            'price' : this.new_price
                        }
                    ]
                    
                });
                
                let payload = {
                    token : this.User.token,
                    publication_id : this.data.id,
                    variations : variations
                }

                this.sleep(500);
                let publication = await this.$store.dispatch('update_price_on_variation', payload)
                .catch((error) => {
                    }).finally(()=> this.show_spinner_price = false);
                
                if (publication) {
                    console.log(publication);
                    console.log('publication');
                    Event.$emit('update_price_on_variation', publication.data.body);
                    this.success_message('Precio de la publicación actualizado correctamente', 'Publicaciones', 3000);
                }
            },
            
        },
    }
</script>
<style>
    .my-input{
        background-color: white;
        border-style:solid !important;
        border-color:#5d5d5d !important;
        border-width:1px !important;
        text-align: center;
        width: 250px !important;
    }
    .my-success{
        background-color: #4C8A48;
    }
    .my-danger{
        background-color: #E91808;
    }
    .my-info {
        background-color: #555e7a;
    }
    .my-warning {
        background-color: #ff9c00;
    }
    .my-texto {
        text-decoration: bold;
        color: whitesmoke;
        background-color: grey;
        width: 31px;
    }
</style>