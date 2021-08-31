<template>
    <div class="card margin-top">
        <div class="card-header title bg-default">
            <h4>DOMICILIO</h4>
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
                                :value="ProviderAddressType"
                                @input="setProviderAddressType"
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
                                    :value="ProviderAddressProvince"
                                    :options="Provinces"
                                    :clear-on-select="false" 
                                    @input="setProviderProvince"
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
                                <input v-model="city" class="form-control" type="text">
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
                                <input v-model="cp" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label" >Calle</label>
                            <div class="">
                                <input v-model="address" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label" >Número</label>
                            <div class="">
                                <input v-model="number" class="form-control" type="text">
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
                            <input v-model="between" class="form-control" type="text">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" >Observaciones</label>
                        <div class="">
                            <textarea v-model="obs" class="form-control" rows="3"></textarea>
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
        components : {
            Multiselect
        },
        mixins : [auth, toast_mixin],

        computed : {

            ...mapGetters(
                [
                    'GetAddressType',
                    'Provinces',
                    'GetPersonWSPUC',
                    'GetCustomersData',
                    'ProviderAddressType',
                    'ProviderAddressProvince',
                    'ProviderAddressCity',
                    'ProviderAddressAddress',
                    'ProviderAddressNumber',
                    'ProviderAddressBetween',
                    'ProviderAddressObs',
                    'ProviderAddressCp'
                ]
            ),

            city : {
                get()
                {
                    return this.ProviderAddressCity;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_CITY', value);
                }
            },

            cp : {
                get()
                {
                    return this.ProviderAddressCp;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_CP', value);
                }
            },

            address : {
                get()
                {
                    return this.ProviderAddressAddress;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_ADDRESS', value);
                }
            },

            number : {
                get()
                {
                    return this.ProviderAddressNumber;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_NUMBER', value);
                }
            },

            between : {
                get()
                {
                    return this.ProviderAddressBetweem;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_BETWEEN', value);
                }
            },

            obs : {
                get()
                {
                    return this.ProviderAddressObs;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_OBS', value);
                }
            }
        },

        

        methods : {
            ...mapActions([
                'setProviderAddressType',
                'setProviderProvince'
            ])
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