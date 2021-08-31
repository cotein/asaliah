<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="row">
                <form class="form form-inline" >
                    <div class="form-group col-md-5" style="padding-bottom-15px">
                        <multiselect placeholder="Buscar Cliente" 
                            id="findCustomer"
                            track-by="name" label="name"
                            v-model="customer"
                            :options="customers"
                            :searchable="true"
                            :internal-search="false" 
                            :clear-on-select="true" 
                            @search-change="asyncFind"
                            @select="selectedCustomer"
                            @remove="removeCustomer"
                            selectLabel="Cliente"
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
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Desde</label>
                            <datepicker 
                                :language="es"
                                :value="date"
                                v-model="date"
                            ></datepicker>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hasta</label>
                            <datepicker 
                                :language="es"
                                :value="date"
                                v-model="date"
                            ></datepicker>
                        </div>
                    </div>
                    
                    <button 
                        class="btn btn-primary " 
                        type="button"
                        @click.prevent="loadData()"
                        >Buscar</button>
                    <!-- <button 
                        class="btn btn-default " 
                        type="button"
                        @click.prevent="GroupByDelete()"
                        >www</button> -->
                </form>
        </div>
        <v-client-table
            ref="invoice-list"
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
    import QrAfip from './../../../../src/Pdf/QrAfip';
    
    import {mapGetters} from 'vuex';
    import Paginate from 'vuejs-paginate';
    import Loading from 'vue-loading-overlay';
    import cell_date from './PartialCellDate';
    import Multiselect from 'vue-multiselect';
    import Datepicker from 'vuejs-datepicker';
    import {es} from 'vuejs-datepicker/dist/locale';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import cell_print from './PartialCellPrintInvoice';
    import InvoiceListChildRow from './InvoiceListChildRow';
    import InvoiceListStatusCell from './InvoiceListStatusCell';
    import row_number from './../../publications/partials/row-number.vue';
    import asyc_find_customer from './../../../../mixins/asyc-find-customer';
    export default {
        
        components : {
            Loading, Paginate, InvoiceListChildRow, Multiselect, Datepicker
        },

        mixins : [asyc_find_customer],

        data() {
            return {
                es : es,
                date : new Date(),
                loading : true,
                pageCount : 1,
                customer : null,
                customers : [],
                columns : [
                    'number',
                    'name',
                    'date',
                    'total',
                    'status',
                    'print'
                ],
                rows : [],
                options: {
                    perPage: 50,
                    perPageValues: [10, 25, 50, 100],
                    pagination: { dropdown:true },
                    headings: {
                        number : '#',
                        name : 'Comprobante',
                        date : 'Fecha',
                        total : 'Importe',
                        status : 'Estado',
                        print : 'Acciones'
                    },
                    templates: {
                        number : row_number,
                        date : cell_date,
                        status : InvoiceListStatusCell,
                        print : cell_print
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
                        number : 'col-md-1 text-center pp',
                        name : 'text-left',
                        date : 'col-md-2 text-center',
                        total : 'col-md-2 text-right',
                        status : 'col-md-1 text-center',
                        print : 'col-md-1 text-center',
                    },
                    groupBy : 'customer',
                    childRow : InvoiceListChildRow,
                    showChildRowToggler : true,
                    toggleGroups : true,
                    filterable: []
                } 
            }
        },

        computed : {
            ...mapGetters([
                'InvoicesList'
            ])
        },

        watch : {
            InvoicesList(n)
            {
                let $vm = this;
                $vm.rows = n
            }
        },

        methods : {
            
            loadData(page=1)
            {
                this.loading = true;

                let url = '/api/sale_invoice/index?page=' + page;

                if (this.customer != null) {
                    url = url + '&customer='+this.customer.id;
                }

                if (this.status != null) {
                    url = url + '&status='+this.status.status_id;
                }

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.post(url).then((response) => {
                    this.pageCount = response.data.pagination.last_page;
                    this.rows = response.data.data
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
            },

            GroupByDelete()
            {
                this.$set(this.options, 'groupBy', '');
            }
        },

        mounted() {
            this.loadData();
            
            this.loading = false;
        }
    }
</script>

<style  scoped>
/* table.my-size tr td { font-size: 12px; } */
/* .activeRow {
  background-color: black !important;
} */
</style>