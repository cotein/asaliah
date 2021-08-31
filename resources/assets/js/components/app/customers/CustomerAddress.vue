<template>
    <div class="form form-horizontal" style="margin-bottom:15px"> 
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Tipo</label>
                    <div class="col-sm-9">
                        <multiselect placeholder="Domicilio" 
                            id="address_type"
                            track-by="name" label="name"
                            :options="GetAddressType"
                            :internal-search="false" 
                            :clear-on-select="true" 
                            v-model="address_type"
                            selectLabel="Tipo domicilio"
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
            <div class="col-md-8">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Domicilio</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" disabled :value="address.name">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Provincias</label>
                    <div class="col-sm-9">
                        <multiselect placeholder="Provincias" 
                            track-by="name" label="name"
                            :options="Provinces"
                            :internal-search="false" 
                            :clear-on-select="true" 
                            v-model="province"
                            selectLabel="Provincia"
                            selectedLabel="Seleccionado"
                            deselectLabel="Remover"
                            @select="selectProvince"
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
            <div class="col-md-8">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Localidad</label>
                    <div class="col-sm-9">
                        <multiselect placeholder="Buscar localidad" 
                            track-by="name" label="name"
                            :loading="show_spinner"
                            v-model="localidad"
                            :options="localidades"
                            :searchable="true"
                            :internal-search="false" 
                            :clear-on-select="false" 
                            @search-change="asyncFind"
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Calle y número</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" v-model="domicilio">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <label class="col-sm-3 control-label">Entre calles</label>
                                        <div class="col-sm-9">
                        <input class="form-control" type="text" v-model="between_streets">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <button 
                class="btn btn-primary"
                :disabled="($v.domicilio.$invalid || $v.between_streets.$invalid)"
                :class="{'spinner spinner-inverse spinner-sm' : updating}"
                @click="address_update"
                >Actualizar domicilio
                
            </button>
        </div>
    </div>
</template>

<script>
import collect from 'collect.js';
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../mixins/auth';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import { required } from 'vuelidate/lib/validators';
import toast_mixin from './../../../mixins/toast-mixin';
    export default {
        props : ['address', 'index'],
        mixins : [auth, toast_mixin],
        components : {
            Multiselect
        },
        
        data() 
        {
            return {
                updating : false,
                loading : false,
                customer : {},
                show_spinner : false,
                address_type : {
                    id : null,
                    name : null
                },
                province : {
                    id : null,
                    name : null
                },
                localidad :  {
                    id : null,
                    name : null
                },
                localidades : [],
                domicilio : null,
                between_streets : null
                
            }
        },

        computed : {

            ...mapGetters(
                [
                    'GetAddressType',
                    'Provinces'
                ]
            ),

        },

        watch : {
            GetAddressType(n)
            {
                this.GetAddressType.forEach(item => {
                    if (this.address.type == item.name) {
                        this.address_type = item;
                    }
                });
            }
        },

        validations(){
        return {
            domicilio : {
                required,
            },
            between_streets : {
                required
            }
        }
    },

        methods : {

            selectProvince(el)
            {

            },

            asyncFind (query) {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

                axios.post('/api/localidades/find_by_name', {
                    localidad : query,
                    province_id : this.province.id
                }).then((result) => {
                    this.localidades = result.data;
                }).catch((err) => {
                    
                });
            },

            async address_update()
            {
                this.updating = true;

                let payload = {
                    
                    address : {
                        id : this.address.id,
                        province : this.province,
                        localidad : this.localidad,
                        domicilio : this.domicilio,
                        type : this.address_type,
                        between_streets : this.between_streets
                    },
                    token : this.User.token
                }

                let updated_address = await this.$store.dispatch('update_address', payload);

                if (updated_address) {
                    this.success_message('Actualización correcta', 'Domicilio del Cliente');
                    
                    let data = {
                        index : this.index,
                        address : updated_address.data
                    }

                    this.$store.commit('SET_CUSTOMER_ADDRESS', data);
                }

                this.updating = false;
            }
            
        },

        mounted()
        {
            this.province.id = this.address.state_id;
            this.province.name = this.address.state;

            this.localidad.id = this.address.city_id;
            this.localidad.name = this.address.city;

            this.address_type.id = this.address.type_id;
            this.address_type.name = this.address.type;

            this.domicilio = this.address.domicilio;
            this.between_streets = this.address.between_streets;
        }
    }
</script>

<style lang="scss" scoped>

</style>