<template>
    <div class="card margin-top">
        <div class="card-header title bg-default">
            <h4>IMPUESTOS</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" :class="{'has-error' : ProviderErrorRegimenGetter}">
                        <span><label class="control-label" >Regimen de Ganancias </label><small> - Sólo Responsables Inscriptos -</small></span>
                        <multiselect placeholder="Documento tipo" 
                            track-by="name" label="name"
                            :value="ProviderRegimen"
                            :options="Regimenes"
                            :clear-on-select="false" 
                            @input="setProviderRegimen"
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
                        <p class="text-danger" v-if="ProviderErrorRegimenGetter">{{ProviderErrorRegimenGetter[0]}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 117px;">
                        <h5>RETENER IIBB</h5>
                        <span>
                            NO
                        <label class="switch switch-primary">
                            <input class="switch-input" type="checkbox" v-model="iibb_exempt">
                            <span class="switch-track"></span>
                            <span class="switch-thumb"></span>
                        </label>
                        SI
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 117px;">
                        <h5>RETENER GANANCIAS</h5>
                        <span>
                            NO
                        <label class="switch switch-primary">
                            <input 
                                :disabled="! IsRespopnsableInscripto"
                                class="switch-input"
                                type="checkbox" v-model="gcias_exempt">
                            <span class="switch-track"></span>
                            <span class="switch-thumb"></span>
                        </label>
                        SI
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 117px;">
                        <h5>RETENER IVA</h5>
                        <span>
                            NO
                        <label class="switch switch-primary">
                            <input 
                                :disabled="! IsRespopnsableInscripto"
                                class="switch-input" 
                                type="checkbox" 
                                v-model="iva_exempt">
                            <span class="switch-track"></span>
                            <span class="switch-thumb"></span>
                        </label>
                        SI
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 117px;">
                        <h5>RETENER SUSS</h5>
                        <span>
                            NO
                        <label class="switch switch-primary">
                            <input class="switch-input" type="checkbox" v-model="suss_exempt">
                            <span class="switch-track"></span>
                            <span class="switch-thumb"></span>
                        </label>
                        SI
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import { required } from 'vuelidate/lib/validators';
import toast_mixin from './../../../../mixins/toast-mixin';
import WsPucResponse from './../../../../src/Afip/WsPucResponse';
    export default {
        components : {
            Multiselect
        },

        data(){
            return {
                regimenes : [],
                isRespopnsableInscripto : false
            }
        },

        mixins : [auth, toast_mixin],

        watch : {

            GetPersonWSPUC(n)
            {
                let wspuc = new WsPucResponse(n);

                if (wspuc.hasRegimenGeneral()) {
                    this.isRespopnsableInscripto = true;
                }
            }
        },
        computed : {

            IsRespopnsableInscripto()
            {
                return this.isRespopnsableInscripto;
            },

            ...mapGetters(
                [
                    'ProviderContactName',
                    'ProviderRegimen',
                    'ProviderTaxIIBBExempt',
                    'ProviderTaxGciasExempt',
                    'ProviderTaxIvaExempt',
                    'ProviderTaxSUSSExempt',
                    'ProviderErrorRegimenGetter',
                    'GetPersonWSPUC'
                ]
            ),

            Regimenes()
            {
                return this.regimenes;
            },

            iibb_exempt : {
                get()
                {
                    return this.ProviderTaxIIBBExempt;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_TAX_IIBB_EXEMPT', value);
                }
            },

            gcias_exempt : {
                get()
                {
                    return this.ProviderTaxGciasExempt;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_TAX_GCIAS_EXEMPT', value);
                }
            },

            iva_exempt : {
                get()
                {
                    return this.ProviderTaxIvaExempt;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_TAX_IVA_EXEMPT', value);
                }
            },

            suss_exempt : {
                get()
                {
                    return this.ProviderTaxSUSSExempt;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_TAX_SUSS_EXEMPT', value);
                }
            }

        },

        methods : {
            ...mapActions([
                'setProviderRegimen',
            ]),

            async get_regimenes  () {
                
                try {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                    let response = await axios.get('/api/providers_regimen/index');

                    this.regimenes = response.data;

                } catch (e) {
                    console.log('error en get_regimenes method');
                    console.log(e);
                }
            },
        },

        async mounted  () {
            
            await this.get_regimenes();
        }
    }
</script>

<style lang="scss" scoped>

</style>