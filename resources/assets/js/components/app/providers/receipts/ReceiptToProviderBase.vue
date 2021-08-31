<template>
    <div>
        <loading 
                :active.sync="loading" 
                color="#0469c7"
                :can-cancel="false" 
                :is-full-page="true">
            </loading>
        <div class="card">
            <div class="card-header" >
                <div class="col-md-12">
                    <h4><strong>{{ReceiptToProvidersOrdersGetters[0].data.provider_name}}</strong></h4>
                </div>
                <div class="col-md-3 text-center">
                    <p><strong>TOTAL FACTURAS</strong></p>
                    <h4>
                        <strong class="text-danger">
                             {{ReceiptToProvidersTotalVouchers.debitos | currency}}
                        </strong>
                    </h4>
                </div>
                <div class="col-md-3 text-center" v-if="ReceiptToProvidersTotalVouchers.creditos < 0">
                    <p><strong>TOTAL CREDITOS</strong></p>

                    <h4>
                        <strong class="text-danger">
                             {{ReceiptToProvidersTotalVouchers.creditos | currency}}
                        </strong>
                    </h4>
                </div>
                <div class="col-md-3 text-center">
                    <p><strong>A PAGAR</strong></p>

                    <h4>
                        <strong class="text-danger">
                             {{ReceiptToProvidersTotalVouchers.debitos + ReceiptToProvidersTotalVouchers.creditos | currency}}
                        </strong>
                    </h4>
                </div>
                <div class="col-md-3 text-center">
                    <p><strong>PAGANDO</strong></p>

                    <h4>
                        <strong class="text-danger">
                             {{ReceiptToProvidersTotal | currency}}
                        </strong>
                    </h4>
                </div>
            </div>
            <div class="card-body">
                <ReceiptToProviderOrders />
                <ReceiptToProviderCancelationDocument />
            </div>
            <div  class="card-footer text-center" >
                <button 
                    class="btn btn-primary btn-sm pull-right" 
                    :class="{'spinner spinner-inverse spinner-sm' : receipt_store_spinner}"
                    :disabled="receipt_store_spinner"
                    type="button"
                    @click="receipt_provider_store"
                    >Generar recibo
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Loading from 'vue-loading-overlay';
import auth from './../../../../mixins/auth';
import sleep from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import ReceiptToProviderOrders from './ReceiptToProviderOrders';
import ReceiptToProviderReceipts from './ReceiptToProviderReceipts';
import ReceiptToProviderCancelationDocument from './ReceiptToProviderCancelationDocument';
    export default {
        mixins : [toast_mixin, auth],
        components : {
            ReceiptToProviderOrders, ReceiptToProviderReceipts, ReceiptToProviderCancelationDocument, Loading
        },
        data(){
            return {
                receipt_store_spinner : false,
                loading : false
            }
        },
        mixins : [auth, toast_mixin, sleep],
        computed : {

            ...mapGetters([
                'ReceiptToProvidersTotal',
                'ReceiptToProvidersTotalPaid',
                'ReceiptToProvidersTotalOrders',
                'ReceiptToProvidersTotalVouchers',
                'ReceiptToProvidersOrdersGetters',
                'ReceiptToProvidersPendingReceiptsGetters',
            ])
        },
        
        methods : {

            async get_banks()
            {
                try {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                    let response = await axios.get('/api/bank/index');

                } catch (e) {
                    throw e;
                }
            },

            async receipt_provider_store()
            {
                this.receipt_store_spinner = true;
                this.sleep(1500);
                let receipt = await this.$store.dispatch('receipt_provider_store', this.User.token)
                .catch(err => {
                    console.log(err.response.data);
                    //let e = JSON.parse(err.response.data);
                    //this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                }).finally(() => {
                    this.receipt_store_spinner = false;
                })

                if (receipt) {
                    this.$store.commit('SET_RECEIPT_TO_PROVIDER_INITIAL_STATUS');
                    this.success_message('Recibo generado correctamente', 'Recibos', 2500)
                }
            }
        },

        beforeMount(){
            let markedRows = window.localStorage.getItem('markedRows');

            this.$store.commit('RECEIPT_TO_PROVIDERS_SET_ORDERS', JSON.parse(markedRows));

            window.localStorage.clear();
        },

        watch : {

            ReceiptToProvidersTotalPaid(n, old)
            {
                if (n > this.ReceiptToProvidersTotal || n < this.ReceiptToProvidersTotal) {
                    this.info_message('Recibo', 'El importe total a pagar difiere de lo informado en los documentos de pago.', 7000, 'bottomCenter')
                    
                }
            }
        },
        
        async mounted(){
            await this.get_banks();

            

            /* let provider_id = this.ReceiptToProvidersOrdersGetters[0].provider_id;

            let payload = {
                token : this.User.token,
                provider_id : provider_id
            }

            let receipts = await this.$store.dispatch('get_receipts_from_provider', payload);
            console.log('///////////////////////');
            console.log(receipts); */
        }
    }
</script>

<style lang="scss" scoped>

</style>