<template>
    <li class="col-md-12" style="list-style-type: none;">
        <div  style="margin-top:15px; margin-bottom:15px">
            <div class="col-md-3"> 
                <strong>Tipo de Pago</strong>
                <multiselect placeholder="Tipo de Pago" 
                    id="payment_type"
                    track-by="name" label="name"
                    v-model="type"
                    :options="payment_types"
                    @select="selectedPaymentType"
                    selectLabel="Pago"
                    selectedLabel="Seleccionado"
                    deselectLabel="Quitar"
                    >
                </multiselect>
            </div>
            <div  class="col-md-6" >
                <strong>Banco</strong>
                <multiselect placeholder="Banco" 
                    id="bank_search"
                    track-by="name" label="name"
                    :loading="show_spinner"
                    v-model="bank"
                    :options="banks"
                    :searchable="true"
                    :internal-search="false" 
                    :clear-on-select="true" 
                    @search-change="asyncFindBank"
                    @select="selectedBank"
                    selectLabel="Banco"
                    selectedLabel="Seleccionado"
                    deselectLabel="Quitar"
                    >
                    <span slot="noOptions">
                            Lista Vacía
                    </span>
                    <span slot="noResult">
                            La búsqueda no arrojó resultados
                    </span>
                </multiselect>
            </div>
            <div class="col-md-3">
                <strong>Número de Comprobante</strong>
                <input 
                    type="text" 
                    class="form-control"
                    @input="setCancelationNumber"
                >
            </div>
        </div>

        <!-- SECOND LINE -->
        <div class="col-md-12" style="margin-top:15px; margin-bottom:15px ; padding-bottom:15px; border-bottom:black solid 1px">
            <div class="col-md-3"  >
                <strong>Fecha</strong>
                <datepicker 
                    :language="es"
                    :value="date"
                    :format="customFormatter"
                    :disabled-dates="DisabledDates"
                    v-model="date"
                    @selected="cancelationDocumentDate"
                ></datepicker>
            </div>
            <div class="col-md-5"  > 
                <strong>Propietario</strong>
                <input type="text" class="form-control" @input="setCancelationOwner">
            </div>
            <div class="col-md-3">
                <strong>Importe</strong>
                <vue-autonumeric 
                    class="form-control"
                    v-model="total"
                    :options=options
                ></vue-autonumeric>
            </div>
            <div class="text-center col-md-1"  > 
                <button 
                    v-tooltip="'Quitar del recibo'"
                    class="btn btn-outline-danger btn-icon sq-32"
                    @click="remove_cancelation"
                    :disabled="!CanRemoveCancelationDocument"
                >
                    <span class="icon icon-trash"></span>
                </button>
            </div>
        </div>
    </li>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Multiselect from 'vue-multiselect';
    import Datepicker from 'vuejs-datepicker';
    import auth from './../../../../mixins/auth';
    import {es} from 'vuejs-datepicker/dist/locale';
    import VueAutonumeric from './../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        props : ['number'],
        components : {Multiselect, VueAutonumeric, Datepicker},
        mixins : [auth],
        data(){
            return{
                es : es,
                date : new Date(),
                options : {
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
                show_spinner : false,
                spinner : false,
                type : null,
                payment_types : [
                    {'id' : 1, 'name' : 'CHEQUE'},
                    {'id' : 2, 'name' : 'MERCADO PAGO'},
                    {'id' : 3, 'name' : 'EFECTIVO'},
                    {'id' : 4, 'name' : 'TRANSFERENCIA'},
                    {'id' : 5, 'name' : 'TARJ. CRÉDITO'},
                    {'id' : 6, 'name' : 'TARJ. DÉBITO'},
                ],
                invoice : null,
                bank : null,
                banks : [],
                total : 0
            }
        },

        watch : {

            total(n, o)
            {
                let data = {
                    index : this.number,
                    total : n
                }

                this.$store.commit('CANCELATION_DOCUMENTS_SET_TOTAL', data);
            }
        },

        methods : {

            selectedPaymentType(el)
            {
                let data = {
                    index : this.number,
                    type_id : el.id
                }
                this.$store.commit('CANCELATION_DOCUMENTS_SET_TYPE', data);
            },

            asyncFindBank(query)
            {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

                axios.post('/api/bank/find_by_name', {
                    bank : query
                }).then((result) => {
                    this.banks = result.data;
                }).catch((err) => {
                    
                });
            },

            selectedBank(el)
            {
                let data = {
                    index : this.number,
                    bank_id : el.id
                }
                this.$store.commit('CANCELATION_DOCUMENTS_SET_BANK', data);
            },

            remove_cancelation()
            {
                this.$store.commit('CANCELATION_DOCUMENTS_REMOVE', this.number);
            },

            customFormatter(date){
                return this.$moment(date).format("DD-MM-YYYY")
            },

            cancelationDocumentDate(value){

                let date = this.$moment(value).format("YYYYMMDD");

                let data = {
                    index : this.number,
                    date : date
                }

                this.$store.commit('CANCELATION_DOCUMENTS_SET_DATE', data);
            },

            setCancelationNumber($e)
            {
                let data = {
                    index : this.number,
                    number : $e.target.value
                }

                this.$store.commit('CANCELATION_DOCUMENTS_SET_NUMBER', data);
            },

            setCancelationOwner($e)
            {
                let data = {
                    index : this.number,
                    owner : $e.target.value
                }

                this.$store.commit('CANCELATION_DOCUMENTS_SET_OWNER', data);
            },
            
        },

        computed : {
            ...mapGetters(
                [
                    'GetCancelationsFromCustomerRecibo',
                    'CanRemoveCancelationDocument',
                ]
            ),

            DisabledDates(){
                return {
                    to:  this.$moment(this.Today).subtract(5, 'days').toDate(),
                    from: this.$moment(this.Today).add(365, 'days').toDate(),
                } 
            },

            Today(){
                return this.$moment(Date.now())
            },

            
        },

        mounted()
        {
            setTimeout(() => {
                this.cancelationDocumentDate(this.date);
            }, 200);
        }
        
    }
</script>

<style lang="scss" scoped>
    .center--vertical {
        vertical-align: middle;
    }
</style>