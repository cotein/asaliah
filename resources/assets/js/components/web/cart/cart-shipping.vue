<template>
    <div class="tt-shopcart-col">
        <div class="row">
            <div class="col-md-12">
                <div class="tt-shopcart-box">
                    <h4 class="tt-title">
                        LUGAR DE ENVIO
                    </h4>
                    <p>Ingresar domicilio para obtener gasto estimado de envío.</p>
                    <form class="form-default">
                        <div class="form-group">
                            <label for="address_country">PAÍS <sup>*</sup></label>
                            <multiselect 
                                v-model="country"
                                @input="updateCountry"  
                                placeholder="Buscar provincia" 
                                label="name" track-by="name" 
                                :options="Countries" 
                                :show-labels="false">
                                <span slot="noOptions">
                                    Lista Vacía
                                </span>
                            </multiselect>
                            <p class="text-danger" v-if="! $v.country.required">El campo es requerido</p>
                        </div>
                        <!-- <province_ /> -->
                       <div class="form-group">
                            <label for="address_province">PROVINCIA<sup>*</sup></label>
                            <multiselect 
                                v-model="province"
                                @input="updateProvince" 
                                placeholder="Buscar provincia" 
                                label="name" track-by="name" 
                                :options="Provinces" 
                                @select="selectedProvince"
                                @remove="removeProvince()"
                                :show-labels="false">
                                <span slot="noOptions">
                                    Lista Vacía
                                </span>
                            </multiselect>
                            <p class="text-danger" v-if="! $v.province.required">El campo es requerido</p>
                        </div>
                        <div class="form-group">
                            <label for="address_zip">CIUDAD <sup>*</sup></label>
                            <multiselect 
                                v-model="city"
                                @input="updateCity"  
                                placeholder="Código Postal | Ciudad" 
                                label="name" track-by="name" 
                                :options="Cities" 
                                :loading="spinner_cities"
                                @remove="initShippingPrice()"
                                @select="calculate_shiping()"
                                :disabled="! $v.province.required"
                                :show-labels="false">
                                <span slot="noOptions">
                                    Lista Vacía
                                </span>
                            </multiselect>
                            <p class="text-danger" v-if="! $v.city.required">El campo es requerido</p>
                        </div>
                        <div class="form-group">
                            <label for="address_zip">CALLE <sup>*</sup></label>
                            <input type="text" 
                                    class="form-control" 
                                    placeholder="Calle"
                                    :value="street"
                                    @input="updateStreet"
                                    :disabled="! $v.city.required">
                            <p class="text-danger" v-if="! $v.city.required">El campo es requerido</p>
                        </div>
                        <div class="form-group">
                            <label for="address_zip">NÚMERO <sup>*</sup></label>
                            <input type="text" 
                                    class="form-control" 
                                    placeholder="Número"
                                    :value="street_number"
                                    @input="updateStreet_number"
                                    :disabled="! $v.street.required"
                                >
                            <p class="text-danger" v-if="! $v.street_number.numeric">El campo debe ser de tipo numérico</p>
                            <p class="text-danger" v-if="! $v.street_number.required">El campo es requerido</p>
                        </div>
                        <!-- <div class="text-center">
                            <h3 >{{ShippingPrice | currency}}</h3>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tt-shopcart-box">
                    <h4 class="tt-title">
                        EMAIL
                    </h4>
                    <p>Campo requerido</p>
                    <form class="form-default">
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="name" 
                                class="form-control" 
                                id="address_zip" placeholder="Email..."
                                :value="email"
                                @input="updateEmail"
                                :disabled="! $v.street_number.required"
                                >
                            <p class="text-danger" v-if="! $v.email.email">El email es requerido</p>
                            <p class="text-danger" v-if="! $v.email.required">Email inválido</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tt-shopcart-box">
                    <h4 class="tt-title">
                        IMPORTANTE
                    </h4>
                    <p>Si lo requiere, agregar instrucciones necesarias de envío...</p>
                    <form class="form-default">
                        <textarea v-model="message" class="form-control" rows="7"></textarea>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="tt-shopcart-box tt-boredr-large">
                    <table class="tt-shopcart-table01">
                        <tbody>
                            <tr>
                                <td class="text-center"><h4>COMPRA</h4></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center"><h2 style="color:red">{{TotalPrice | currency}}</h2></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tt-shopcart-box tt-boredr-large">
                    <table class="tt-shopcart-table01">
                        <tbody>
                            <tr>
                                <td class="text-center"><h4>COSTO DE ENVÍO</h4></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center"><h2 style="color:red">{{ShippingPrice | currency}}</h2></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="tt-shopcart-box tt-boredr-large">
                    <table class="tt-shopcart-table01">
                        <tbody>
                            <tr>
                                <td class="text-center"><h4>COSTO TOTAL</h4></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center"><h2 style="color:red">{{TotalPrice + ShippingPrice | currency}}</h2></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:31px" >
            <div class="col-md-12 text-center" v-if="$v.email.required">
                <payment_button 
                    :ammount="TotalPrice" 
                ></payment_button>
            </div>
        </div>
    </div>
</template>
<script>
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import province_ from './localization/province';
import currency from './../../../mixins/currency';
import {mapGetters, mapActions, mapState} from 'vuex';
import payment_button from './../mercado-pago/payment-button';
import { required, numeric, email } from 'vuelidate/lib/validators'

export default {
    props : ['products'],
    components : {
        Multiselect, payment_button, province_
    },
    mixins : [currency],
    data() {
        return {
            country : {
                id : 1,
                name : 'Argentina',
                afip_code : 200
            },
            province : null,
            city : null,
            email : null,
            street : null,
            street_number : null,
            spinner_cities : false,
            shipping_amount : 0
        }
    },

    validations : {
        email : {
            required,
            email
        },

        street_number : {
            required,
            numeric
        },

        street : {
            required,
        },

        country : {
            required,
        },
        
        province : {
            required,
        },

        city : {
            required,
        },

    },

    watch: {
        email(n)
        {
            console.log(n);
        }
    },

    methods: {

        updateCountry(e){
            this.country = e;
            this.$store.commit('SET_COUNTRY', e);
        },

        updateProvince(e){
            this.province = e;
            this.$store.commit('SET_PROVINCE', e);
        },

        updateCity(e){
            this.city = e;
            this.$store.commit('SET_CITY', e);
        },

        updateEmail(e){
            this.email = e.target.value;
            this.$store.commit('SET_EMAIL', e.target.value);
        },
        
        updateStreet_number(e){
            this.street_number = e.target.value;
            this.$store.commit('SET_STREET_NUMBER', e.target.value);
        },

        updateStreet(e){
            this.street = e.target.value;
            this.$store.commit('SET_STREET', e.target.value);
        },

        initShippingPrice(){
            this.shipping_amount = 0;
        },

        initCity(){
            this.city = null;
        },

        removeProvince(){
            
            this.initShippingPrice();

            this.initCity();

            //this.removeCities();

        },

        getProvinces(){
            this.$store.dispatch('getProvinces')
                .then((result) => {
                    this.$store.commit('SET_PROVINCES', result.data);
                }).catch((err) => {
                    
                });
        },

        selectedProvince(el){

            this.initShippingPrice();

            this.initCity();
            
            this.$store.commit('SET_PROVINCE', el);

            this.spinner_cities = true;

            this.$store.dispatch('getCities', el)
            .then((result) => {
                this.$store.commit('SET_CITIES', result.data);
            }).catch((err) => {
                
            }).finally(() => {
                this.spinner_cities = false;
            });
        },

        calculate_shiping(){
            let $vm = this;
            setTimeout(() => {
                
                this.$store.commit('SET_CITY', $vm.city);

                axios.post('/shipping', {
                     'city' : $vm.city
                })
                    .then((result) => {
                        
                        let data = JSON.parse(result.data);

                        let options = data.options;

                        for (let x in options){
                            if (options[x].name == 'Normal a domicilio') {
                                $vm.shipping_amount = options[x].cost;
                            }
                        }
                        
                    }).catch((err) => {
                        
                    }).finally(()=>{
                        
                    })
            },  150);
           
        }
    },

    computed : {
        ...mapState(['cart']),

        ...mapGetters([
            'Provinces', 'Countries', 'Cities', 'EmailGetter'
        ]),

        message: {
            get () {
                return this.$store.state.cart.message;
            },
            set (value) {
                this.$store.commit('SET_MESSAGE', value);
            }
        },

       /*  email: {
            get () {
                return this.$store.state.cart.email;
            },
            set (value) {
                this.$store.commit('SET_EMAIL', value);
            }
        }, */

        /* street: {
            get () {
                return this.$store.state.cart.street;
            },
            set (value) {
                this.$store.commit('SET_STREET', value);
            }
        }, */

        /* street_number: {
            get () {
                return this.$store.state.cart.street_number;
            },
            set (value) {
                this.$store.commit('SET_STREET_NUMBER', value);
            }
        }, */

        /* shipping_amount: {
            get () {
                return this.$store.state.cart.shipping_amount;
            },
            set (value) {
                this.$store.commit('SET_SHIPPING_AMOUNT', value);
            }
        }, */

        TotalPrice(){
            
            let products = collect(this.products);
            
            return products.map(i => {

                return i.quantity * this.CurrencyToNumber(i.item.price);
                
            }).sum();
        },

        ShippingPrice(){
            return this.shipping_amount;
        }


    },

    watch: {
        shipping_amount(n){
            console.log('object');
            console.log(n);
            this.$store.commit('SET_SHIPPING_AMOUNT', n);
        }
    },

    mounted() {

        this.getProvinces();

        this.$store.commit('SET_COUNTRY', this.country);

        console.log(this.$v.email);

    },
}
</script>