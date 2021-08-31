<template>
    <div class="card margin-top">
        <div class="card-header title bg-default">
            <h4>DOMICILIO {{index + 1}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" >Tipo</label>
                            <multiselect placeholder="Domicilio" 
                                id="address_type"
                                track-by="name" label="name"
                                :options="GetAddressType"
                                :internal-search="false" 
                                :clear-on-select="true" 
                                v-model="address.type"
                                @select="setCustomerAddressType"
                                selectLabel="Tipo"
                                selectedLabel="Seleccionado"
                                deselectLabel="Remover"
                                >
                                <span slot="noOptions">
                                        Lista Vacía
                                </span>
                                <span slot="noResult">
                                        La búsqueda no arrojó resultados
                                </span>
                            </multiselect>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" >Provincia</label>
                            <div class="">
                                <multiselect placeholder="Documento tipo" 
                                    track-by="name" label="name"
                                    :options="Provinces"
                                    :clear-on-select="false" 
                                    v-model="address.state"
                                    @select="setCustomerProvince"
                                    selectLabel="Seleccionar"
                                    selectedLabel="Seleccionado"
                                    deselectLabel="Remover"
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label" >Localidad</label>
                            <div class="">
                                <multiselect placeholder="Buscar localidad" 
                                        track-by="name" label="name"
                                        v-model="address.city"
                                        :options="localidades"
                                        :searchable="true"
                                        :internal-search="false" 
                                        :clear-on-select="false" 
                                        @select="setCustomerAddressCity"
                                        @search-change="localidadAsyncFind"
                                        >
                                        <span slot="noOptions">
                                                Lista Vacía
                                        </span>
                                        <span slot="noResult">
                                                La búsqueda no arrojó resultados
                                        </span>
                                    </multiselect>
                                <!-- <input v-model="set_city" :value="get_city()" class="form-control" type="text"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top">
                <div class="col-md-12">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" >Cód. Postal</label>
                            <div class="">
                                <input v-model="address.cp" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label" >Calle</label>
                            <div class="">
                                <input v-model="address.address" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" >Número</label>
                            <div class="">
                                <input v-model="address.number" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" >Entre calles</label>
                        <div class="">
                            <input v-model="address.between" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" >Observaciones</label>
                        <div class="">
                            <textarea v-model="address.obs" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import {mapGetters, mapActions} from 'vuex';
import auth from './../../../../mixins/auth';
import { required } from 'vuelidate/lib/validators';
import toast_mixin from './../../../../mixins/toast-mixin';

    export default {
        props : ['index', 'address'],

        components : {
            Multiselect
        },
        mixins : [auth, toast_mixin],

        data(){
            return {
                /* type : this.$store.state.CustomerNew.customer.addresses[this.index].type,
                state : this.$store.state.CustomerNew.customer.addresses[this.index].state,
                city : this.$store.state.CustomerNew.customer.addresses[this.index].city, */
                localidades : [],
            }
        },
        computed : {

            ...mapGetters(
                [
                    'GetAddressType',
                    'Provinces',
                    'GetPersonWSPUC',
                    'GetCustomersData',
                    'CustomerAddressType',
                    'CustomerAddressProvince',
                    'CustomerAddressCity',
                    'CustomerAddressAddress',
                    'CustomerAddressNumber',
                    'CustomerAddressBetween',
                    'CustomerAddressObs',
                    'CustomerAddressCp'
                ]
            ),
           
        },

        methods : {
            
            setCustomerAddressType(el)
            {   
                this.$store.commit('SET_CUSTOMER_ADDRESS_TYPE', {index : this.index, data : el});
            },

            setCustomerProvince(el)
            {
                this.localidades = [];
                this.$store.commit('SET_CUSTOMER_ADDRESS_CITY', {index : this.index, data : {}});
                this.$store.commit('SET_CUSTOMER_ADDRESS_PROVINCE', {index : this.index, data : el});
            },

            setCustomerAddressCity(el)
            {   
                this.$store.commit('SET_CUSTOMER_ADDRESS_CITY', {index : this.index, data : el});
                this.$store.commit('SET_CUSTOMER_ADDRESS_CP', {index : this.index, data : el.cp});
            },

            async localidad_find_by_name (province_id, localidad) {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

                let response = await axios.post('/api/localidades/find_by_name', {
                    localidad : localidad,
                    province_id : province_id
                }).catch((err) => {
                    console.log(err);
                });

                return response
            },

            localidadAsyncFind (query) {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

                axios.post('/api/localidades/find_by_name', {
                    localidad : query,
                    province_id : this.address.state.id
                }).then((result) => {
                    this.localidades = result.data;
                }).catch((err) => {
                    
                });
            },

            /* set_city($e)
            {
                let data = {
                    index : this.index,
                    number : $e.target.value
                }

                this.$store.commit('SET_CUSTOMER_ADDRESS_CITY', data);
            },

            get_city()
            {
                return this.$store.state.CustomerNew.customer.addresses[this.index].city.name;
            },

            set_cp($e)
            {
                let data = {
                    index : this.index,
                    number : $e.target.value
                }

                this.$store.commit('SET_CUSTOMER_ADDRESS_CP', data);
            },

            set_address($e)
            {
                let data = {
                    index : this.index,
                    number : $e.target.value
                }

                this.$store.commit('SET_CUSTOMER_ADDRESS_ADDRESS', data);
            },

            set_number($e)
            {
                let data = {
                    index : this.index,
                    number : $e.target.value
                }

                this.$store.commit('SET_CUSTOMER_ADDRESS_NUMBER', data);
            },

            set_between($e)
            {
                let data = {
                    index : this.index,
                    number : $e.target.value
                }

                this.$store.commit('SET_CUSTOMER_ADDRESS_BETWEEN', data);
            },

            set_obs($e)
            {
                let data = {
                    index : this.index,
                    number : $e.target.value
                }

                this.$store.commit('SET_CUSTOMER_ADDRESS_OBS', data);
            }, */

            
        },

        async mounted  () {
            
            await this.$store.dispatch('getAddressType', this.User.token);
            let provinces = await this.$store.dispatch('getProvinces', this.User.token);

            if (provinces) {
                this.$store.commit('SET_PROVINCES', provinces.data);
            }

        }
    }
</script>

<style lang="scss" scoped>

</style>