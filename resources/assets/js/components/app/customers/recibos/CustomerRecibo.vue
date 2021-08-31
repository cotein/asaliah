<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="row bottom-20">
            <div class="col-md-6">
                <CustomerReciboFindCustomer />
            </div>
            <div class="col-md-4 col-md-offset-2">
                <datepicker 
                    :language="es"
                    :value="date"
                    :format="customFormatter"
                    :disabled-dates="DisabledDates"
                    v-model="date"
                    @selected="receiptDate"
                ></datepicker>
            </div>
        </div>
       
        <div class="row bottom-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                            <button 
                                @click="addComprobante"
                                type="button" 
                                class="btn btn-default pull-right">Agregar Comprobante</button>
                        <strong>Comprobantes de Ventas</strong>
                    </div>
                    <div class="card-body" data-toggle="match-height" style="height: 262px;">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-4 text-center">Comprobante</th>
                                <th class="col-md-2 text-center">Fecha</th>
                                <th class="col-md-2 text-center">Importe</th>
                                <th class="col-md-2 text-center">Saldo</th>
                                <th class="col-md-1 text-center">Quitar</th>
                            </tr>
                            </thead>
                            <fade-transition group tag="tbody" >
                                <template v-for="(row, index) in GetInvoicesFromCustomerRecibo">
                                    <CustomerReciboInvoiceRow :number="index" :key="index"/>
                                </template>
                            </fade-transition>
                        </table>
                    </div>
                    <div class="card-footer pull-right">
                        <h4>
                            {{TotalFromCustomerRecibos | currency}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

         <div class="row bottom-20">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-danger">
                        <button 
                            @click="addCancelation"
                            type="button" 
                            class="btn btn-default pull-right">Agregar Comprobante de Cancelación
                        </button>
                        <strong>Comprobantes de Cancelación</strong>
                    </div>
                    <div class="card-body" data-toggle="match-height" style="height: 262px;">
                        <fade-transition group tag="ol" >
                            <CustomerReciboCancelationRow v-for="(row, index) in GetCancelationsFromCustomerRecibo" :number="index" :key="index"/>
                        </fade-transition>
                    </div>
                    <div class="card-footer pull-right">
                        <h4>
                            {{TotalFromCancelationDocuments | currency}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button 
                    v-tooltip="'Generar recibo'"
                    class="btn btn-primary"
                    :disabled="EnableCancelationDocument"
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 

                    @click="receiptGenerate"
                >
                    GENERAR RECIBO
                </button>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loading from 'vue-loading-overlay';
    import Datepicker from 'vuejs-datepicker';
    import auth from './../../../../mixins/auth';
    import {es} from 'vuejs-datepicker/dist/locale';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import toast_mixin from './../../../../mixins/toast-mixin'
    import CustomerReciboInvoiceRow from './CustomerReciboInvoiceRow';
    import CustomerReciboFindCustomer from './CustomerReciboFindCustomer';
    import CustomerReciboCancelationRow from './CustomerReciboCancelationRow';
    export default {
        mixins : [auth, toast_mixin],
        components : {
            Loading, CustomerReciboFindCustomer, CustomerReciboInvoiceRow, CustomerReciboCancelationRow, Datepicker
        },
        data(){
            return {
                es : es,
                date : new Date(),
                loading : false,
                date : null,
                spinner : false
            }
        },

        computed : {
            ...mapGetters(
                [
                    'GetCustomerFromCustomerRecibo',
                    'GetInvoicesFromCustomerRecibo',
                    'TotalFromCustomerRecibos',
                    'GetCancelationsFromCustomerRecibo',
                    'TotalFromCancelationDocuments',
                    'EnableCancelationDocument'
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

        methods : {

            customFormatter(date){
                return this.$moment(date).format("DD-MM-YYYY")
            },

            addComprobante()
            {
                this.$store.commit('CUSTOMER_RECIBO_ADD_INVOICE');
            },

            addCancelation()
            {
                this.$store.commit('CUSTOMER_RECIBO_ADD_CANCELATION');
            },

            async receiptGenerate()
            {
                this.spinner = true;

                let receipt = await this.$store.dispatch('receipt_store', this.User.token)
                .then((result) => {
                    this.success_message('Recibos', 'Generado correctamente');
                }).finally(()=>this.spinner = false);

            },

            receiptDate(value){

                let date = this.$moment(value).format("YYYYMMDD");

                this.$store.commit('CANCELATION_DOCUMENTS_SET_RECEIPT_DATE', date);
            },

        },

        mounted()
        {
            setTimeout(() => {
                this.receiptDate(this.date);
            }, 200);
        }

    }
</script>

<style scoped>
    .bottom-20{
        margin-bottom: 20px;
    }
</style>