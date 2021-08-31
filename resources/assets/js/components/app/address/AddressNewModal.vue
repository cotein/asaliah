<template>
    <div id="address-new-modal" 
        ref="address_new_modal"
        tabindex="-1" 
        role="dialog" class="modal fade" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Generar nuevo domicilio</h4>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-9 col-xs-offset-1">
                                <label class="col-sm-3 control-label" for="form-control-1">Tipo</label>
                                <div class="col-sm-9">
                                    <multiselect placeholder="Domicilio" 
                                        id="address_type"
                                        track-by="name" label="name"
                                        :options="GetAddressType"
                                        :internal-search="false" 
                                        :clear-on-select="true" 
                                        v-model="address_type"
                                        @select="selectType"
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
                        <div class="form-group">
                            <div class="col-xs-9 col-xs-offset-1">
                                <label class="col-sm-3 control-label" for="form-control-1">Provincia</label>
                                <div class="col-sm-9">
                                    <multiselect placeholder="Provincias" 
                                        track-by="name" label="name"
                                        :options="Provinces"
                                        :clear-on-select="true" 
                                        :disabled="disabled_province"
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
                        <div class="form-group">
                            <div class="col-xs-9 col-xs-offset-1">
                                <label class="col-sm-3 control-label" for="form-control-1">Localidad</label>
                                <div class="col-sm-9">
                                    <multiselect placeholder="Buscar localidad" 
                                        track-by="name" label="name"
                                        v-model="localidad"
                                        :options="localidades"
                                        :disabled="disabled_localidad"
                                        :searchable="true"
                                        :internal-search="false" 
                                        :clear-on-select="false" 
                                        @select="selectLocalidad"
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
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="col-sm-3 control-label">Calle y número</label>
                                <div class="col-sm-9">
                                    <input 
                                        class="form-control"
                                        type="text"
                                        v-model="domicilio"
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="col-sm-3 control-label">Entre calles</label>
                                <div class="col-sm-9">
                                    <input 
                                        class="form-control"
                                        type="text"
                                        v-model="between_streets"
                                        >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 center-text">
                                <button 
                                    class="btn btn-primary"
                                    :disabled="($v.domicilio.$invalid || $v.between_streets.$ || disabled_province || disabled_localidad)"
                                    :class="{'spinner spinner-inverse spinner-sm' : saving}"
                                    @click.prevent="save"
                                    >Guardar domicilio
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../mixins/auth';
import { required } from 'vuelidate/lib/validators';
import toast_mixin from './../../../mixins/toast-mixin';
    export default {
        components : {
            Multiselect
        },
        mixins : [auth, toast_mixin],

        data(){
            return {
                address_type : null,
                province : null,
                domicilio : null,
                disabled_province : true,
                disabled_localidad : true,
                disabled_street : true,
                between_streets : '',
                localidad : null,
                localidades : [],
                saving : false
            }
        },

        computed : {

            ...mapGetters(
                [
                    'GetAddressType',
                    'Provinces',
                    'GetCustomersData'
                ]
            )
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

            setInitialStatus()
            {
                this.address_type = null,
                this.province = null,
                this.domicilio = null,
                this.disabled_province = true,
                this.disabled_localidad = true,
                this.disabled_street = true,
                this.between_streets = false,
                this.localidad = null,
                this.localidades = [],
                this.saving = false
            },
            
            selectType(el)
            {
                this.disabled_province = false;
            },

            selectProvince(el)
            {
                this.disabled_localidad = false;
            },

            selectLocalidad(el)
            {
                this.disabled_street = false;
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

            async save()
            {
                this.saving = true;

                let payload = {
                    
                    address : {
                        customer_id : this.GetCustomersData.id,
                        province : this.province,
                        localidad : this.localidad,
                        domicilio : this.domicilio,
                        type : this.address_type,
                        between_streets : this.between_streets
                    },
                    token : this.User.token
                }

                let new_address = await this.$store.dispatch('save_address', payload);

                if (new_address) {
                    this.success_message('Guardado correctamente', 'Domicilio del Cliente');
                    this.$store.commit('SET_CUSTOMER_ADDRESSES', []);
                    let array_address = [];
                    array_address.push(new_address.data);
                    this.$store.commit('SET_CUSTOMER_ADDRESSES', array_address);
                    this.$store.commit('SET_NEW_CUSTOMER_ADDRESS', new_address.data);
                    this.$store.commit('PEDIDO_CLIENTES_ADD_NEW_ADDRESS', new_address.data);
                }
                
                $("#address-new-modal").modal('hide');
                
                this.setInitialStatus();

                this.saving = false;
            }
        },
        
    }
    
</script>

<style>
    .modal-backdrop {
        background-color: transparent !important;
    }
    .fade {
        background-color: transparent !important;
    }
    .in {
        background-color: transparent !important;
    }
</style>