<template>
    <div class="card margin-top">
        <div class="card-header title bg-default">
            <h4>DATOS DEL CONTRIBUYENTE</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group" :class="{'has-error' : CustomerErrorNameGetter}">
                            <label class="control-label" >Nombre O Razón Social</label>
                            <input v-model="name" class="form-control" type="text">
                            <p class="text-danger" v-if="CustomerErrorNameGetter">{{CustomerErrorNameGetter[0]}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group" :class="{'has-error' : CustomerErrorPurchaseDocumentGetter}">
                            <label class="control-label" >Documento Tipo</label>
                            <div class="">
                                <multiselect placeholder="Documento tipo" 
                                    track-by="name" label="name"
                                    :value="CustomerPurchaseDocumentGetter"
                                    :options="PurchaserDocuments"
                                    :loading="purchaser_spinner"
                                    :clear-on-select="false" 
                                    @input="setCustomerPurchaseDocument"
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                            <p class="text-danger" v-if="CustomerErrorPurchaseDocumentGetter">{{CustomerErrorPurchaseDocumentGetter[0]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group" :class="{'has-error' : CustomerErrorNumberGetter}">
                            <label class="control-label" >Número</label>
                            <input  v-model="number" class="form-control" type="text">
                            <p class="text-danger" v-if="CustomerErrorNumberGetter">{{CustomerErrorNumberGetter[0]}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top">
                <div class="col-md-6">
                    <div class="form-group" >
                        <label class="control-label" >Tipo de Cliente</label>
                        <div class="">
                            <multiselect placeholder="Inscripción" 
                                track-by="name" label="name"
                                :value="CustomerTypeGetter"
                                :options="type_customer"
                                :loading="inscription_spinner"
                                :clear-on-select="false" 
                                @input="setCustomerType"
                                selectLabel="Seleccionar tipo de Cliente"
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
                            <p class="text-danger" v-if="CustomerErrorInscriptionGetter">{{CustomerErrorInscriptionGetter[0]}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="form-group" :class="{'has-error' : CustomerErrorInscriptionGetter}">
                            <label class="control-label" >Inscripción</label>
                            <div class="">
                                <multiselect placeholder="Inscripción" 
                                    track-by="name" label="name"
                                    :value="CustomerInscriptionGetter"
                                    :options="GetInscriptions"
                                    :loading="inscription_spinner"
                                    :clear-on-select="false" 
                                    @input="setCustomerInscription"
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                                <p class="text-danger" v-if="CustomerErrorInscriptionGetter">{{CustomerErrorInscriptionGetter[0]}}</p>
                            </div>
                        </div>
                    </div>
                    <fade-transition>
                        <div class="col-md-4" v-if="CustomerStatus">
                            <div class="panel panel-body text-center" data-toggle="match-height" style="height: 117px;">
                                <h5>ESTADO DE CONTRIBUYENTE</h5>
                                <strong><h3>{{CustomerStatus}}</h3></strong>
                            </div>
                        </div>
                    </fade-transition>
                    <fade-transition>
                        <div class="col-md-4" v-if="CustomerTipoPersona">
                            <div class="panel panel-body text-center" data-toggle="match-height" style="height: 117px;">
                                <h5>CONTRIBUYENTE TIPO</h5>
                                <strong><h3>{{CustomerTipoPersona}}</h3></strong>
                            </div>
                        </div>
                    </fade-transition>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="control-label" >Cuenta Contable</label>
                            <div class="">
                                <multiselect placeholder="Inscripción" 
                                    track-by="name" label="name"
                                    :value="CustomerAccountingAccount"
                                    :options="AccountingAccountsGetter"
                                    :clear-on-select="false" 
                                    :disabled="true"
                                    @input="setCustomerAccountingAccount"
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
                        <div class="form-group" :class="{'has-error' : CustomerErrorSubLevelAccountingAccountGetter}">
                            <label class="control-label" >Cuenta Gastos</label>
                            <div class="">
                                <multiselect placeholder="Inscripción" 
                                    track-by="name" label="name"
                                    :value="CustomerSubLevelAccountingAccount"
                                    :options="AccountingAccountsGetter"
                                    :clear-on-select="false" 
                                    @input="setCustomerSubLevelAccountingAccount"
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                                <p class="text-danger" v-if="CustomerErrorSubLevelAccountingAccountGetter">{{CustomerErrorSubLevelAccountingAccountGetter[0]}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">
                        <label class="control-label" >Cuenta Contable</label>
                        <p>
                            <button
                                @click="open_modal_accounting_account"
                                class="btn btn-primary"
                            >
                                NUEVA
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import {mapGetters, mapActions} from 'vuex';
import auth from './../../../../mixins/auth';
    export default {
        components : {Multiselect},
        mixins : [auth],
        data(){
            return {
                inscriptions : [],
                purchaser_spinner : true,
                inscription_spinner : true,
                type_customer : [
                    {
                        id : 1,
                        name : 'MINORISTA'
                    },
                    {
                        id : 2,
                        name : 'MAYORISTA'
                    }
                ]
            }
        },

        methods : {

            ...mapActions([
                'setCustomerInscription', 
                'setCustomerPurchaseDocument',
                'setCustomerAccountingAccount',
                'setCustomerSubLevelAccountingAccount',
                'setCustomerType'
            ]),

            open_modal_accounting_account()
            {
                Event.$emit('open-accounting-account-modal');
            },

            async get_inscriptions  () {
                
                try {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                    let response = await axios.get('/api/inscription/index');

                    this.$store.commit('SET_INSCRIPTIONS', response.data);

                } catch (e) {
                    console.log('error en get_inscriptions method');
                    console.log(e);
                }
            },

            async get_purchase_documents  () {
                
                try {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                    let response = await axios.get('/api/purchase_document/index');

                    this.$store.commit('SET_PURCHASER_DOCUMENT', response.data);

                } catch (e) {
                    console.log('error en get_purchase_documents method');
                    console.log(e);
                }
            }
        },

        computed : {
            ...mapGetters([
                'CustomerAccountingAccount',
                'CustomerPurchaseDocumentGetter',
                'CustomerName',
                'CustomerStatus',
                'CustomerTipoPersona',
                'PurchaserDocuments',
                'CustomerNumber',
                'GetInscriptions',
                'CustomerTypeGetter',
                'AccountingAccountsGetter',
                'CustomerInscriptionGetter',
                'CustomerSubLevelAccountingAccount',
                'CustomerErrorNameGetter',
                'CustomerErrorNumberGetter',
                'CustomerErrorInscriptionGetter',
                'CustomerErrorPurchaseDocumentGetter',
                'CustomerErrorSubLevelAccountingAccountGetter'
            ]),

            name : {
                get()
                {
                    return this.CustomerName;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_NAME', value);
                }
            },

            number : {
                get()
                {
                    return this.CustomerNumber;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_NUMBER', value);
                }
            },
        },

        async mounted(){
            await this.get_inscriptions();
            this.inscription_spinner = false
            await this.get_purchase_documents();
            this.purchaser_spinner = false
        }
    }
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>