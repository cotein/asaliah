<template>
    <div class="row">
        <div class="col-md-12">
            <loading 
                :active.sync="loading" 
                color="#0469c7"
                :can-cancel="false" 
                :is-full-page="true">
            </loading>
            <div class="row" style="padding-bottom-15px">
                <div class="col-md-12">
                    <div class="form form-inline" >
                        <div class="form-group col-md-6" style="padding-bottom-15px">
                            <ProviderFindByName />
                        </div>
                        <div style="padding-top:21px" class="pull-right">
                            <!-- <button 
                                class="btn btn-primary" 
                                type="button"
                                >Buscar Proveedor
                            </button> -->
                            <button 
                                @click="payment_generate"
                                class="btn btn-warning" 
                                :class="{'btn btn-warning spinner spinner-inverse spinner-sm' : spinner}"
                                type="button"
                                :disabled="! EnablePayButton || spinner"
                                >
                                Pagar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                <v-client-table
                    ref="payment_order_table"
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
                        :value="{id : props.row.id, provider_id : props.row.provider_id, data : props.row}" 
                        :disabled="props.row.status_id==7 || props.row.status_id==18"
                        v-model="markedRows">
                </template>

    <!--             <span slot="__group_meta" slot-scope="{ data}">
                    <button 
                            class="btn btn-primary btn-sm pull-right"
                            @click="goTo( data.customer_id ) "
                            type="button">
                            Editar Cliente
                    </button>
                </span> -->
                
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
import auth from './../../../../mixins/auth';
import {es} from 'vuejs-datepicker/dist/locale';
import CellDelete from './OrderPymentCellDelete';
import 'vue-loading-overlay/dist/vue-loading.css';
import sleep from './../../../../mixins/sleep-mixin';
import ProviderFindByName from './../ProviderFindByName';
import OrderPaymentChildRow from './OrderPaymentChildRow';
import toast_mixin from './../../../../mixins/toast-mixin';
import row_number from './../../publications/partials/row-number';
import CellStatus from './../../pedidosClientes/PedidoListCellStatus';

export default {
    mixins : [auth, toast_mixin, sleep],
    components : {
        Multiselect, Datepicker, ProviderFindByName, Paginate, Loading
    },
    data() {
        return {
            spinner : false,
            pageCount : 1,
            es:es,
            searching : false,
            loading : false,
            markedRows:[],
            columns : [
                    'id',
                    'row_number',
                    'number',
                    'date',
                    'total',
                    'status',
                    'delete'
            ],
            rows : [],
            options: {
                uniqueKey : 'id',
                perPage : 20,
                pagination: { dropdown:false },
                headings: {
                    id : 'Chk',
                    row_number : '#',
                    number : 'Número',
                    date : 'Fecha',
                    total : 'Importe',
                    status : 'Estado',
                    delete : 'Emilinar',
                },
                templates: {
                    row_number : row_number,
                    status : CellStatus,
                    delete : CellDelete
                },
                columnsClasses: {
                    id : 'col-md-1 text-center',
                    row_number : 'col-md-1 text-center',
                    number : 'col-md-2 text-center',
                    date : 'col-md-2 text-center',
                    total : 'col-md-2 text-right',
                    status : 'col-md-2 text-center',
                    delete : 'col-md-2 text-center',
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
                childRow : OrderPaymentChildRow,
                rowClassCallback: function(row) { 
                   /*  console.log('row');
                    console.log(row);
                    if (row.voucher_id == 3 || row.voucher_id == 8 || row.voucher_id == 11) {
                        
                        return 'text-danger'; 
                    } */
                }

            } 
        }
    },

    methods : {

        loadData(page=1)
        {
            this.loading = true;
            let url = '/api/order_payment/index?page=' + page;

            if (this.SelectedProviderGetter) {
                url = url + '&provider='+this.SelectedProviderGetter.id;
            }

            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                
            axios.get(url).then((response) => {
                this.$store.commit('ORDER_PAYMENT_SET_ORDERS', response.data.data);
                this.pageCount = response.data.pagination.last_page;
                //this.options.groupMeta = customers_data;
            }).catch((err) => {
                
            }).finally(()=> this.loading = false);
        },

        payment_generate()
        {
            this.spinner = true;
            this.$store.commit('RECEIPT_TO_PROVIDERS_SET_ORDERS', []);
            this.sleep(150);
            this.$store.commit('RECEIPT_TO_PROVIDERS_SET_ORDERS', this.markedRows);
            this.sleep(300);
            this.spinner = false;
            window.localStorage.setItem('markedRows', JSON.stringify(this.markedRows));
            this.goTo();

        },

        goTo()
        {
            window.location.href = "/proveedores/recibos/nuevo";
        },
    },


    computed : {

        ...mapGetters([
            'GetOrderPayments',
            'SelectedProviderGetter',
            'GetCompany'
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

        GetOrderPayments(n){

            this.rows = n
        },

        SelectedProviderGetter(n)
        {
            this.loadData()
        }
       
    },

    async mounted(){

        this.markedRows = [],
        await this.loadData();

        Event.$on('payment_order_delete', order => {
            let ind = this.$refs.payment_order_table.tableData.findIndex(row => {
                return row.id == order.id
            });
            this.$refs.payment_order_table.tableData[ind].status_id = order.status_id;
            this.$refs.payment_order_table.tableData[ind].status = 'ELIMINADO';
        })
        
        await this.$store.dispatch('get_company', this.User.token);
        //lo del pdf tiene que ir en un boton imprimir
        
    }

}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>