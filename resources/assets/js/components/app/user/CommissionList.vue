<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <v-client-table
            ref="user_commissions"
            :columns="columns"
            :data="rows"
            :options="options"
        >
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
</template>

<script>
import {mapGetters} from 'vuex';
import Paginate from 'vuejs-paginate';
import Loading from 'vue-loading-overlay';
import auth from './../../../mixins/auth';
import {es} from 'vuejs-datepicker/dist/locale';
import CommissionMoney from './CommissionMoney';
import 'vue-loading-overlay/dist/vue-loading.css';
import BaseImponibleMoney from './BaseImponibleMoney';
import CommissionChildRow from './CommissionChildRow';
import toast_mixin from './../../../mixins/toast-mixin';
import row_number from './../publications/partials/row-number';
import cell_date from './../customers/invoices/PartialCellDate';
import InvoiceListStatusCell from './../customers/invoices/InvoiceListStatusCell';
export default {
    components : {
        Loading, Paginate
    },
    
    mixins : [auth, toast_mixin],

    data() {
        return {
                es : es,
                date : new Date(),
                loading : false,
                pageCount : 1,
                customer : null,
                customers : [],
                columns : [
                    'number',
                    'customer',
                    'pedido_code',
                    'pedido_base_imponible',
                    'pedido_created_at',
                    'percentage',
                    'commission'
                ],
                rows : [],
                options: {
                    perPage: 50,
                    perPageValues: [10, 25, 50, 100],
                    pagination: { dropdown:true },
                    headings: {
                        number : '#',
                        customer : 'Cliente',
                        pedido_code : 'Código del pedido',
                        pedido_base_imponible : 'Base imponible',
                        pedido_created_at : 'Fecha',
                        percentage : '%',
                        commission : 'Comisión'
                    },
                    templates: {
                        number : row_number,
                        pedido_created_at : cell_date,
                        commission : CommissionMoney,
                        pedido_base_imponible : BaseImponibleMoney
                    },
                    /* rowClassCallback: function(row) { 
                        console.log('ppppppppppppppppppppppppppp');
                        console.log(row);
                        return 'table-condensed'; 
                    }, */
                    /* cellClasses:{
                        name: [
                            {
                                class:'btn-danger',
                                condition: row => true
                            }
                        ]
                    }, */
                    columnsClasses: {
                        number : 'col-md-1 text-center',
                        pedido_code : 'col-md-2 text-center',
                        customer : 'col-md-3 text-left',
                        pedido_created_at : 'col-md-1 text-center',
                        percentage : 'col-md-1 text-center',
                        pedido_base_imponible : 'col-md-2 text-right',
                        commission : 'col-md-2 text-right'
                    },
                    //childRow : CommissionChildRow,
                    showChildRowToggler : true,
                    toggleGroups : true,
                    filterable: []
                } 
            }
    },

    methods : {

        loadData(page=1)
        {
            this.loading = true;

            let url = '/api/commissions/my?page=' + page;

            let payload = {
                token : this.User.token,
                url : url,
            }

            let commissions = this.$store.dispatch('get_my_commissions', payload)
            .catch((err) => {
                console.log(err);    
            }).finally(()=> this.loading = false);

            if (commissions) {
                console.log(commissions);
            }
        }
    },

    computed : {

        ...mapGetters([
            'CommissionsGetter'
        ])
    },

    watch : {

        CommissionsGetter(n)
        {
            this.rows = n;
        }
    },

    async mounted()
    {
        this.loadData();
        

    }
}
</script>

<style scoped>
    .top-15 {
        margin-top: 15px;
    }
</style>