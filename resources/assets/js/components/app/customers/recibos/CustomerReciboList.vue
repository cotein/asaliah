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
                    <div class="form-group col-md-6" style="padding-bottom-15px">
                        <multiselect placeholder="Buscar Cliente - NOMBRE / DNI / CUIT / CUIL" 
                            id="findCustomer"
                            track-by="name" label="name"
                            :loading="show_spinner"
                            v-model="customer"
                            :options="customers"
                            :searchable="true"
                            :internal-search="false" 
                            :clear-on-select="true" 
                            @search-change="asyncFind"
                            @select="selectedCustomer"
                            @remove="removeCustomer"
                            selectLabel="Seleccionar cliente"
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
                    <div class="form-group col-md-4" style="padding-bottom-15px">
                        <multiselect placeholder="Estados" 
                            track-by="name" label="name"
                            v-model="status"
                            :options="statuses"
                            @select="selectedStatus"
                            @remove="removeStatus"
                            selectLabel="Seleccionar estado"
                            selectedLabel="Seleccionado"
                            deselectLabel="Quitar"
                            >
                        </multiselect>
                    </div>
                    <button 
                        class="btn btn-primary" 
                        type="submit"
                        @click.prevent="loadData()"
                        >Buscar Recibos</button>
                </form>
        </div>
            <v-client-table
                ref="pedido_cliente_list"
                :columns="columns"
                :data="rows"
                :options="options"
            >
            
            <!-- <div slot="filter__id">
                <input type="checkbox" 
                class="form-control check-all" 
                v-model='allMarked' 
                @change="toggleAll()">
            </div>	

            <template slot="id" slot-scope="props">
                <input type="checkbox" 
                @change="unmarkAll()" 
                class="form-control" 
                :value="props.row.id" 
                v-model="markedRows">
            </template> -->

            <!-- <span slot="__group_meta" slot-scope="{ data}">
                <button v-if="data.delivery_address"
                        class="btn btn-primary btn-sm pull-right"
                        @click="goTo( data.customer_id ) "
                        type="button">
                        Editar Cliente
                </button>
            </span> -->
            
            </v-client-table>
        <div class="text-center">
            <paginate
                :page-count="www"
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
    import {Event} from 'vue-tables-2';
    import Paginate from 'vuejs-paginate'
    import Loading from 'vue-loading-overlay';
    import Multiselect from 'vue-multiselect';
    import auth from './../../../../mixins/auth';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import * as constants from './../../../../src/const/Status';
    import StatusCell from './../invoices/InvoiceListStatusCell';
    import CustomerReciboPrintCell from './CustomerReciboPrintCell';
    import row_number from './../../publications/partials/row-number';
    import CustomerReciboListChildRow from './CustomerReciboListChildRow';
    export default {
        props : ['paginati'],
        components : {
            Loading, Paginate, Multiselect 
        },
        mixins : [auth],
        data() {
            return {
                allMarked:false,
			    markedRows:[],
                www : 1,
                show_spinner : false,
                loading : false,
                customer : null,
                customers : [],
                status : null,
                statuses : [
                   
                ],
                columns : [
                    //'id',
                    //'customer',
                    'row_number',
                    'number',
                    'date',
                    'total_invoices_import',
                    'cancelation_documents_import',
                    'diff_import',
                    'status',
                    'print',
                ],
                rows : [],
                options: {
                    uniqueKey : 'receipt_id',
                    perPage : 20,
                    pagination: { dropdown:true },
                    headings: {
                        //id : 'Chk',
                        row_number : '#',
                        number : 'Número',
                        date : 'Fecha',
                        total_invoices_import : 'A pagar',
                        cancelation_documents_import : 'Pagado',
                        diff_import : 'Deuda',
                        status : 'Estado',
                        print : 'Imprimir',

                    },
                    templates: {
                        row_number : row_number,
                        print : CustomerReciboPrintCell,
                        status : StatusCell
                    },
                    columnsClasses: {
                        id : 'text-center',
                        row_number : 'text-center',
                        number : 'text-center',
                        date : 'text-center',
                        total_invoices_import : 'text-right',
                        cancelation_documents_import : 'text-right',
                        diff_import : 'text-right',
                        status : 'text-center',
                        print : 'text-center',
                        edit : 'text-center',
                    },
                    cellClasses:{
                        diff_import: [
                            {
                                class:'text-danger',
                                condition: row => row.diff_import > 0
                            }
                        ]
                    },
                    groupBy : 'customer',
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
                    childRow : CustomerReciboListChildRow,
                    //rowClassCallback: function(row) { return 'table-condensed'; }

                } 
            }
        },

        computed : {
            ...mapGetters(
                [
                    'GetCompay'
                ]
            )
        },

        methods : {

            removeCustomer(el)
            {
                this.customer = null;

                this.loadData();
            },

            selectedCustomer(el)
            {
                this.customer = el;
            },

            selectedStatus(el)
            {
                this.status = el;
            },

            removeStatus(el)
            {
                this.status = null;

                this.loadData();
            },

            async asyncFind (query) {
            
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                
                let customer = await axios.post('/api/customer/find_customer_by_name', 
                    {
                        customer : query
                    })

                this.customers = customer.data;
            },

            goTo(customer_id)
            {
                window.location.href = "/clientes/edicion/" + customer_id;
            },

            loadData(page=1)
            {
                this.loading = true;
                let url = '/api/receipt/index?page=' + page;

                if (this.customer != null) {
                    url = url + '&customer='+this.customer.id;
                }

                if (this.status != null) {
                    url = url + '&status='+this.status.status_id;
                }

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.get(url).then((response) => {
                    console.log(response);
                    this.rows = response.data.data
                    /* this.$store.commit('SET_PEDIDOS', response.data.data);
                    this.www = response.data.pagination.last_page;
                    let customers_data = response.data.customers_data;
                    this.options.groupMeta = customers_data; */
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
            }

        },

        mounted()
        {
            this.loadData();

            this.$store.dispatch('get_company', this.User.token)
            
        }
       
    }
</script>

<style slot-scope>
    .v-collapse-content{
        max-height: 0;
        transition: max-height 0.5s ease-out;
        overflow: hidden;
        padding: 0;
    }

    .v-collapse-content-end{
        transition: max-height 0.5s ease-in;
    }

    .VueTables__child-row-toggler {
        width: 16px;
        height: 16px;
        line-height: 16px;
        display: block;
        margin: auto;
        text-align: center;
    }

    .VueTables__child-row-toggler--closed::before {
       /* font-family: FontAwesome; 
        content: "\f067";
        color :green; */
        content:  "+";
        font-size: 150%
    }

    .VueTables__child-row-toggler--open::before {
        /* font-family: FontAwesome;
        content: "\f111";
        color : red; */
        content: "-";
        font-size: 150%
    }

    .VueTables--client {
        min-height: 500px; 
    }
</style>