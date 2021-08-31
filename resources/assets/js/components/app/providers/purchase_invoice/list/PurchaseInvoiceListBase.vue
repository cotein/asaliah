<template>
    <div class="row">
        <div class="col-md-12">
            <loading 
                :active.sync="loading" 
                color="#0469c7"
                :can-cancel="false" 
                :is-full-page="true">
            </loading>
            <div class="row">
                <div class="col-md-12">
                    <div class="form form-inline" >
                        <div class="form-group col-md-6" style="padding-bottom-15px">
                            <ProviderFindByName />
                        </div>
                            
                        <div style="padding-top:21px">
                            <button 
                                @click="loadData"
                                class="btn btn-primary" 
                                type="button"
                                :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : search_spinner}"
                                >Buscar Comprobantes
                            </button>
                            <button 
                                @click="order_payment_generate"
                                :disabled="! EnablePayButton"
                                class="btn btn-warning" 
                                :class="{'btn btn-warning spinner spinner-inverse spinner-sm' : spinner}"
                                type="button"
                                >
                                Generar Orden de pago
                            </button>
                            <ExportIvaCompras />
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top-15px">
                    <div class="col-md-3 form-group text-center">
                                <small>DESDE</small>
                                    <datepicker
                                        ref="from_date"
                                        :language="es"
                                        :value="from_date"
                                        input-class="my-input"
                                        :format="customFormatter"
                                        v-model="from_date"
                                    ></datepicker>
                            </div>
                            <div class="col-md-3 col-md-offset-2 form-group text-center">
                                <small>HASTA</small>
                                    <datepicker
                                        ref="to_date"
                                        :language="es"
                                        :value="to_date"
                                        input-class="my-input"
                                        :format="customFormatter"
                                        v-model="to_date"
                                    ></datepicker>
                            </div>
                </div>
            </div>
                <v-client-table
                    ref="purchase_invoice_list"
                    :columns="columns"
                    :data="rows"
                    :options="options"
                >
                
                <!-- <div slot="filter__id">
                    <input type="checkbox" 
                    class="form-control check-all" 
                    v-model='allMarked' 
                    @change="toggleAll()">
                </div>	 -->

                <template slot="id" slot-scope="props">
                    <input type="checkbox" 
                        class="form-control" 
                        :disabled="(props.row.status_id == 18 || props.row.status_id == 20)?true:false"
                        :value="{id : props.row.id, provider_id : props.row.provider_id, data : props.row}" 
                        v-model="markedRows">
                </template>

                </v-client-table>
            <div class="text-center">
                <paginate
                    :page-count="pageCount"
                    :click-handler="loadData"
                    :prev-text="'Ant.'"
                    :next-text="'Sig.'"
                    :container-class="'pagination'">
                </paginate>
            </div>
        </div>
    </div>
</template>

<script>
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import Paginate from 'vuejs-paginate'
import Loading from 'vue-loading-overlay';
import Multiselect from 'vue-multiselect';
import Datepicker from 'vuejs-datepicker';
import {mapGetters, mapActions} from 'vuex';
import auth from './../../../../../mixins/auth';
import {es} from 'vuejs-datepicker/dist/locale';
import ExportIvaCompras from './ExportIvaCompras';
import 'vue-loading-overlay/dist/vue-loading.css';
import sleep from './../../../../../mixins/sleep-mixin';
import ProviderFindByName from './../../ProviderFindByName';
import toast_mixin from './../../../../../mixins/toast-mixin';
import row_number from './../../../publications/partials/row-number';
import PurchaseInvoiceListChildRow from './PurchaseInvoiceListChildRow';
import CellStatus from './../../../pedidosClientes/PedidoListCellStatus';
export default {
    mixins : [auth, toast_mixin, sleep],
    components : {
        Multiselect, Datepicker, ProviderFindByName, Paginate, Loading, ExportIvaCompras
    },
    data() {
        return {
            spinner : false,
            search_spinner : false,
            pageCount : 1,
            es:es,
            from_date : null,
            to_date : null,
            searching : false,
            loading : false,
            markedRows:[],
            columns : [
                    'id',
                    'row_number',
                    'voucher',
                    'long_number',
                    'date',
                    'total',
                    'paid',
                    'balance',
                    'status',
            ],
            rows : [],
            options: {
                uniqueKey : 'id',
                perPage : 20,
                pagination: { dropdown:true },
                headings: {
                    id : 'Chk',
                    row_number : '#',
                    voucher : 'Comprobante',
                    long_number : 'Número',
                    date : 'Fecha',
                    total : 'Importe',
                    paid : 'Pagado',
                    balance : 'Saldo',
                    status : 'Estado',
                },
                templates: {
                    row_number : row_number,
                    status : CellStatus
                },
                columnsClasses: {
                    id : 'col-md-1 text-center',
                    row_number : 'col-md-1 text-center',
                    voucher : 'col-md-2 text-left',
                    long_number : 'col-md-2 text-center',
                    date : 'col-md-2 text-center',
                    total : 'col-md-2 text-right',
                    paid : 'col-md-1 text-right',
                    balance : 'col-md-1 text-right',
                    status : 'col-md-1 text-center',
                },
                groupBy : 'provider_name',
                groupMeta: [],
                /* [
                        {
                            value: 'VILLALBA NATALIA',
                            data:{
                                population:1216,
                                countries:54
                            }
                        },
                ], */
                toggleGroups : true,
                filterable: false,
                childRow : PurchaseInvoiceListChildRow,
                cellClasses:{
                    row_number: [
                        {
                            class:'text-danger',
                            condition: row => row.voucher_id == 3 || row.voucher_id == 8 || row.voucher_id == 13
                        }
                    ],
                    voucher: [
                        {
                            class:'text-danger',
                            condition: row => row.voucher_id == 3 || row.voucher_id == 8 || row.voucher_id == 13
                        }
                    ],
                    long_number: [
                        {
                            class:'text-danger',
                            condition: row => row.voucher_id == 3 || row.voucher_id == 8 || row.voucher_id == 13
                        }
                    ],
                    date: [
                        {
                            class:'text-danger',
                            condition: row => row.voucher_id == 3 || row.voucher_id == 8 || row.voucher_id == 13
                        }
                    ],
                    total: [
                        {
                            class:'text-danger',
                            condition: row => row.voucher_id == 3 || row.voucher_id == 8 || row.voucher_id == 13
                        }
                    ],
                },

            } 
        }
    },

    methods : {

        customFormatter(date){
            return this.$moment(date).format("dd/MM/yyyy");
        },

        async order_payment_generate()
        {
            this.spinner = true;
            this.sleep(500);
            let provider_id = this.markedRows[0].provider_id;

            this.markedRows.forEach(element => {

                if (provider_id != element.provider_id) {
                    this.info_message('No es posible generar un pago de distintos proveedores', 'Proveedores', 5000, 'bottomCenter');
                    this.spinner = false;
                    throw new Error('i');
                }
            });

            this.$store.commit('ORDER_PAYMENT_SET_PURCHASE_INVOICES_TO_PAY', this.markedRows);
            this.sleep(750);
            let payment_order = await this.$store.dispatch('order_payment_store', this.User.token)
            .catch((err) => {
                console.log('order_payment_generate method');
                console.log(err);
                return false;
            }).finally(() => this.spinner = false);

            if (payment_order) {
                this.success_message('Orden de pago generada correctamente', 'Pagos', 2500);
                payment_order.data.items.forEach(element => {
                    let ind = this.$refs.purchase_invoice_list.tableData.findIndex(row => {
                        console.log(row.id == element.id, row.id + ' | ' + element.id);
                        return row.id == element.id
                    });
                    this.$refs.purchase_invoice_list.tableData[ind].status_id = element.status_id;
                    this.$refs.purchase_invoice_list.tableData[ind].status = element.status_name;
                });
            }

        },

        goTo()
        {
            window.location.href = "/proveedores/comprobantes/pagar";
        },

        loadData(page=1)
        {
            this.loading = true;
            let url = '/api/purchase_invoice/index?page=' + page + '&from_date='+ this.$time(this.from_date).format("YYYY-MM-DD")  + '&to_date=' + this.$time(this.to_date).format("YYYY-MM-DD");

            if (this.SelectedProviderGetter) {
                url = url +  '&provider='+this.SelectedProviderGetter.id;
            }

            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                
            axios.get(url).then((response) => {
                this.$store.commit('PURCHASE_INVOICE_LIST', response.data.data);
                this.pageCount = response.data.pagination.last_page;
                //this.options.groupMeta = customers_data;
            }).catch((err) => {
                
            }).finally(()=> this.loading = false);
        },
      
    },

    computed : {

        ...mapGetters([
            'PurchaserInvoiceList',
            'SelectedProviderGetter'
        ]),

        EnablePayButton()
        {
            let rows = collect(this.markedRows);

            if (rows.count() > 0) {
                return true;
            }

            return false;
        }
    }, 

    watch : {

        PurchaserInvoiceList(n){

            this.rows = n
        },

        SelectedProviderGetter(n)
        {
            this.loadData()
        },

        from_date(n)
        {
            this.$store.commit('IVA_COMPRAS_FROM_DATE', n);
        },

        to_date(n)
        {
            this.$store.commit('IVA_COMPRAS_TO_DATE', n);
        }


    },

    async mounted(){
        this.from_date = this.$moment().startOf('year').format('DD/MM/YYYY');
        this.to_date = this.$moment().startOf('date').format('DD/MM/YYYY');
        this.markedRows = [];
        await this.loadData();
        
    }
   

}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>