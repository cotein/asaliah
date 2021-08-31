<template>
    <div class="row">
        <div class="col-md-12">
            <v-client-table
                ref="receipt_to_providers_list"
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

                <!-- <template slot="id" slot-scope="props">
                    <input type="checkbox" 
                        class="form-control" 
                        :disabled="(props.row.status_id == 20)?true:false"
                        :value="{id : props.row.id, provider_id : props.row.provider_id, data : props.row}" 
                        v-model="markedRows">
                </template> -->
            </v-client-table>
        </div>
    </div>
</template>

<script>
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import {mapGetters, mapActions} from 'vuex';
import auth from './../../../../../mixins/auth';
import sleep from './../../../../../mixins/sleep-mixin';
import row_number from './../../../publications/partials/row-number';
import CellStatus from './../../../pedidosClientes/PedidoListCellStatus';
import ReceiptToProviderListChildRow from './ReceiptToProviderListChildRow';
import ReceiptToProviderListCellPrint from './ReceiptToProviderListCellPrint';
export default {
    mixins : [auth, sleep],
    components : {
        
    },
    data() {
        return {
            spinner : false,
            pageCount : 1,
            searching : false,
            loading : false,
            markedRows:[],
            columns : [
                    //'id',
                    'row_number',
                    'number',
                    'created_at',
                    'total_orders',
                    'total_paid',
                    'balance',
                    'status',
                    'print'
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
                    created_at : 'Fecha de Pago',
                    total_orders : 'A Pagar',
                    total_paid : 'Pagado',
                    balance : 'Saldo',
                    status : 'Estado',
                    print : 'Imprimir'
                },
                templates: {
                    row_number : row_number,
                    status : CellStatus,
                    print : ReceiptToProviderListCellPrint
                },
                columnsClasses: {
                    id : 'text-center',
                    row_number : 'col-md-1 text-center',
                    number : 'col-md-2 text-center',
                    created_at : 'col-md-2 text-center',
                    total_orders : 'col-md-2 text-right',
                    total_paid : 'col-md-2 text-right',
                    balance : 'col-md-1 text-right',
                    status : 'col-md-1 text-center',
                    print : 'col-md-1 text-center',
                },
                groupBy : 'provider_name',
                toggleGroups : true,
                filterable: false,
                childRow : ReceiptToProviderListChildRow,
                cellClasses:{
                    row_number: [
                        {
                            class:'text-danger',
                            condition: row => row.balance_raw < 0
                        }
                    ],
                    number: [
                        {
                            class:'text-danger',
                            condition: row => row.balance_raw < 0
                        }
                    ],
                    created_at: [
                        {
                            class:'text-danger',
                            condition: row => row.balance_raw < 0
                        }
                    ],
                    total_orders: [
                        {
                            class:'text-danger',
                            condition: row => row.balance_raw < 0
                        }
                    ],
                    total_paid: [
                        {
                            class:'text-danger',
                            condition: row => row.balance_raw < 0
                        }
                    ],
                    balance: [
                        {
                            class:'text-danger',
                            condition: row => row.balance_raw < 0
                        }
                    ],
                }
            } 
        }
    },

    methods : {

        
    },


    computed : {

        ...mapGetters([
            'ReceiptToProvidersListGetter'
        ]),

        
    }, 

    watch : {

        ReceiptToProvidersListGetter(n)
        {
            this.rows = n;
        }
        
    },

    async mounted(){
        
    }
   

}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>