<template>
    <div>
        <div class="row">
            <div class="col-md-5">
                <date_picker_widget></date_picker_widget>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <label for="">Comprobante</label>
                <ul class="list-inline">
                    <li class="">
                        <div class="radio">
                            <label>
                                <input type="radio" name="message" value="F" v-model="sale_type"> Factura
                            </label>
                        </div>
                    </li>
                    <li class="">
                        <div class="radio">
                            <label>
                                <input type="radio" name="message" value="DEBITO" v-model="sale_type"> Nota de Débito
                            </label>
                        </div>
                    </li>
                    <li class="">
                        <div class="radio">
                            <label>
                                <input type="radio" name="message" value="CREDITO" v-model="sale_type"> Nota de Crédito
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-3" v-if="! GetPersonWSPUCisArray">
                <label for="">CUIT - CUIL - DNI</label>
                <input class="form-control" type="text" v-model="cuit"> 
                <p class="text-danger" v-if="! $v.cuit.required">cuit inválido</p>
                <p class="text-danger" v-if="! $v.cuit.numeric">El campo es numérico</p>
                <p class="text-danger" v-if="! $v.cuit.minLength || ! $v.cuit.maxLength">La longitud del campo se compone entre {{$v.cuit.$params.minLength.min}} y {{$v.cuit.$params.maxLength.max}} carateres </p>
                <p class="text-danger" v-if="has_error" v-text="message"></p>
            </div>
            <div class="col-md-3" v-else>
                <label for="">CUIT - CUIL - DNI</label>
                <div class="form-group">
                    <label class="col-sm-6 control-label" for="form-control-6">Seleccione una persona de la lista</label>
                    <div class="col-sm-6">
                        <select v-model="selectedCustomer" @change="selectAndSearchPerson($event)">
                            <option v-for="option in GetPersonWSPUC.idPersonaListReturn.idPersona" :key="option">{{option}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button 
                    class="btn btn-primary" 
                    type="button" 
                    style="margin-top:25px"
                    :class="{'spinner spinner-inverse spinner-sm' : searching}"
                    @click="personSearch()"
                    :disabled="$v.cuit.$invalid"
                    >Buscar Sujeto</button>
            </div>
            <div class="col-md-1" v-if="ExistCustomer">
                <button 
                    style="margin-top:25px"
                    class="btn btn-warning" 
                    data-toggle="modal" 
                    data-target="#add-address-modal" 
                    type="button">Actualizar Domicilio</button>
            </div>
        </div>
        <collapse-transition :duration="500">
            <div class="row" v-show="show">
                <div class="col-md-6" >
                    <div class="box" >
                        <label for="">Nombre</label>
                        <input class="form-control" type="text" v-model="name"> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box" >
                        <label for="">Tipo</label>
                        <input class="form-control" type="text" v-model="key_type"> 
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box" >
                        <label for="">Número</label>
                        <input class="form-control" type="text" v-model="id_number"> 
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box" >
                        <label for="">Domicilio</label>
                        <!-- <input class="form-control" type="text" v-model="address">  -->
                        <select class="custom-select" v-model="address">
                            <option 
                                :value="address.name" 
                                v-for="address in ExistCustomer.addresses" 
                                :key="address.id"
                                >{{address.name}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12" v-if="HasCities" style="margin-top:31px">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-21">Posibles ciudades del cliente (Mismo CP)</label>
                        <div class="col-sm-9">
                            <select @change="selectCity($event)" class="custom-select" id="form-control-21">
                                <option v-for="city in PosiblesCities" :key="city.id">{{city.name}}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <billing_data></billing_data>
            </div>
        </collapse-transition>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import auth from '../../../mixins/auth';
import toast_mixin from '../../../mixins/toast-mixin';
import billing_data from './billing-data';
import {CollapseTransition} from 'vue2-transitions';
import async_find_product_multiselect from './async-find-product-multiselect';
import { required, numeric, maxLength, minLength } from 'vuelidate/lib/validators';
export default {
    components :{
        CollapseTransition, async_find_product_multiselect, billing_data
    },
    mixins : [auth, toast_mixin],
    data() {
        return {
            cuit : null,
            type : null,
            show : false,
            searching : false,
            has_error : false,
            message : '',
            persona_list_return : [],
            selectedCustomer : null
        }
    },

    methods : {
        openModalError(){
            Event.$emit('show-modal-error');
        },

        selectAndSearchPerson(event){
            console.log(event.target.value);
            this.cuit = event.target.value;

            this.personSearch()
        },

        selectCity(event){
            this.$store.commit('SET_NAME_CITY', event.target.value);
        },

        initialValues(){
            this.name = '';
            this.address = '';
            this.id_number = '';
            this.key_type = '';
        },

        async existCustomer(payload){
            const customer = await this.$store.dispatch('existCustomer', payload);
            return customer; 
        },

        async storeCustomer(payload){
            const customer = await this.$store.dispatch('store_customer', payload);
            return customer; 
        },

        async personSearch(){
            
            let $vm = this;

            $vm.$store.commit('DELETE_EXIST_CUSTOMER');

            $vm.has_error = false;
            $vm.message = '';
            $vm.searching = true;
            $vm.show = false;
            
            $vm.initialValues();

            const payload = {
                token : $vm.User.token,
                cuit : $vm.cuit
            }
            
            await $vm.existCustomer(payload);

            if ( ! $vm.ExistCustomer ) {

                const payload = {
                    token : $vm.User.token,
                    cuit : $vm.cuit
                }

                let person = await this.$store.dispatch('getPersonFromAfip', payload)
                .catch((err)=>{
                    console.log(err.response.data);
                    if (Array.isArray(err.response.data)) {
                            
                            this.error_message(err.response.data[0].Msg, 'Código: '+err.response.data[0].Code, 4000);
                        }else{
                            this.error_message(err.response.data, 'Código: 431', 4000);
                        }
                    return false;
                }).finally(() => this.searching = false);
                
                if ($vm.GetPersonWSPUC != null) {
                    
                    if ($vm.GetPersonWSPUC.hasOwnProperty('idPersonaListReturn')) {
                        
                        if (! $vm.GetPersonWSPUCisArray) {
                            /**
                             * idPersonaListReturn a veces posee un sujeto a pesar que es una lista
                            */
                            const payload = {
                                token : $vm.User.token,
                                cuit : $vm.GetPersonWSPUC.idPersonaListReturn.idPersona
                            }
                            /**
                             * Vuelve a llamar a la AFIP con el CUIL de la persona
                             */
                            await this.$store.dispatch('getPersonFromAfip', payload).catch((err)=>{
                                let e = JSON.parse(err.response.data);
                                console.log(e);
                                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                                return false;
                            }).finally(() => this.searching = false);
                            
                        }
                    }

                    const customer = {
                        token : $vm.User.token,
                        customer : $vm.GetPersonWSPUC
                    }
                        
                    await $vm.storeCustomer(customer).catch((error) => {
                        console.log('voucher-type-component ' + error);
                        $vm.has_error = true;
                        //$vm.message = error.response.data
                    });
                }
            }

            $vm.searching = false;
            $vm.show = true;
            
        },

    },
    computed : {

        ...mapGetters([
            'ExistCustomer',
            'WspucHasError',
            'GetPersonWSPUC',
            'HasCities',
            'PosiblesCities',
            'HasAddress',
            'GetPersonWSPUCisArray'
        ]),

        name : {
            get(){
                return this.$store.state.customers.sale.customer.name;
            },
            set(value){
                this.$store.commit('SET_NAME', value);
            }
        },

        id_number : {
            get(){
                return this.$store.state.customers.sale.customer.id_number;
            },
            set(value){
                this.$store.commit('SET_ID_NUMBER', value);
            }
        },

        address : {
            get(){
                return this.$store.state.customers.sale.customer.address;
            },
            set(value){
                this.$store.commit('SET_ADDRESS', value);
            }
        },

        key_type : {
            get(){
                return this.$store.state.customers.sale.customer.key_type;
            },
            set(value){
                this.$store.commit('SET_KEY_TYPE', value);
            }
        },

        sale_type : {
            get(){
                return this.$store.state.customers.sale.type;
            },
            set(value){
                this.$store.commit('SET_SALE_TYPE', value);
            }
        },

        HasPersonaList(){

            if ( ! this.persona_list_return == []) {
                return true;
            }

            return false;
        },

        PersonaList(){
            if ( this.persona_list_return == []) {
                return [];
            }
            return this.persona_list_return;
        }


    },
    validations(){
        return {
            cuit : {
                required,
                numeric,
                maxLength : maxLength(11),
                minLength : minLength(6)
            }
        }
    },
    
}
</script>