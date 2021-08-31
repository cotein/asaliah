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
                        <multiselect placeholder="Buscar Cliente" 
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
                    <div class="form-group col-md-3" style="padding-bottom-15px">
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
                        >Buscar Pedidos
                    </button>
                    <button 
                        class="btn btn-warning" 
                        type="submit"
                        :disabled="!HasComandaPrint"
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
                        @click.prevent="comandaPrint()"
                        >Imprimir Comanda
                    </button>
                </form>
        </div>
            <v-client-table
                ref="comanda_list"
                :columns="columns"
                :data="rows"
                :options="options"
            >
            
                <div slot="filter__id">
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
                        v-model="markedRows"
                    >
                </template>

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
    import { collect } from 'collect.js';
    import Paginate from 'vuejs-paginate'
    import Loading from 'vue-loading-overlay';
    import Multiselect from 'vue-multiselect';
    import CellStatus from './../PedidoListCellStatus';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import Comanda from './../../../../src/Pdf/Comanda';
    import ComandaListPrintCell from './ComandaListPrintCell';
    import * as constants from './../../../../src/const/Status';
    import row_number from './../../publications/partials/row-number';
    export default {
        props : ['paginati'],
        components : {
            Loading, Paginate, Multiselect 
        },

        data() {
            return {
                comandaArray : [],
                allMarked:false,
			    markedRows:[],
                www : 1,
                show_spinner : false,
                loading : false,
                spinner : false,
                customer : null,
                customers : [],
                status : null,
                statuses : [
                   {name : 'TODOS' , status_id : null},
                   {name : 'LISTADO' , status_id : constants.LISTADO},
                   {name : 'REMITIDO' , status_id : constants.REMITIDO},
                   {name : 'FACTURADO' , status_id : constants.FACTURADO},
                   {name : 'EN PRODUCCION' , status_id : constants.EN_PRODUCCION},
                   {name : 'EN STOCK' , status_id : constants.EN_STOCK},
                   {name : 'CROSS OVER' , status_id : constants.CROSS_OVER},
                   {name : 'DESPACHADO' , status_id : constants.DESPACHADO},
                   {name : 'ENTREGADO' , status_id : constants.ENTREGADO},
                   {name : 'REPORTADO' , status_id : constants.REPORTADO},
                ],
                columns : [
                    'id',
                    'number',
                    'date',
                    'code',
                    'total',
                    'status',
                    'print',
                ],
                rows : [],
                options: {
                    uniqueKey : 'id',
                    perPage : 20,
                    pagination: { dropdown:true },
                    headings: {
                        id : 'Chk',
                        number : '#',
                        date : 'Fecha de entrega',
                        code : 'Código',
                        total : 'Importe',
                        status : 'Estado',
                        print : 'Imprimir Comanda',

                    },
                    templates: {
                        number : row_number,
                        print : ComandaListPrintCell,
                        status : CellStatus
                    },
                    columnsClasses: {
                        id : 'text-center',
                        number : 'col-md-1 text-center',
                        date : 'col-md-2 text-center',
                        code : 'col-md-2 text-center',
                        total : 'col-md-3 text-right',
                        status : 'col-md-2 text-center',
                        print : 'col-md-2 text-center',

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
                    //childRow : PedidoListChildRow,
                    //rowClassCallback: function(row) { return 'table-condensed'; }

                } 
            }
        },

        computed : {
            ...mapGetters(
                [
                    'GetPedidos'
                ]
            ),

            HasComandaPrint()
            {
                let markedRows = collect(this.markedRows);

                if (markedRows.count() > 0) {
                    return true;
                }

                return false;
            }
        },

        watch : 
        {
            GetPedidos(n)
            {
                this.rows = n
                
                this.markedRows = [];

                this.rows.map(row => {
                    this.markedRows.push(row.id);
                });
            }
        },

        methods : {
            
            unmarkAll($e) {
                this.allMarked=false;
            },

            removeCustomer(el)
            {
                this.customer = null;

                this.loadData();
            },

            toggleAll() {
                this.markedRows = this.allMarked?this.$refs.comanda_list.data.map(row=>row.id):[];
            },

            comandaPrint()
            {
                let markedRows = collect(this.markedRows);

                markedRows.map(id => {
                    collect(this.rows).map(row => {

                        if (row.id == id) {
                            this.comandaArray.push(row);
                            return false;
                        }
                    });
                    
                } )

                let data = [];

                collect(this.comandaArray).map(d => {
                    data.push(
                        {
                            customer : d.customer,
                            cv : '---------',
                            op : d.user_on_list_status[0],
                            address : d.customer_address,
                            cellphone : (d.customer_cellphone)?d.customer_cellphone:'',
                            phone1 : (d.customer_phone1)? ' ' + d.customer_phone1:'',
                            phone2 : (d.customer_phone2)? ' ' +d.customer_phone2:'',
                            phone3 : (d.customer_phone3)? ' ' + d.customer_phone3:'',
                            code : d.code,
                            delivery_date : d.date,
                            items : d.items,
                            emition_date : this.$time(Date.now()).format("DD-MM-YYYY"),
                            origin : (d.is_meli_order) ? 'MercadoLibre' : 'Local',
                            comments : d.comments

                        }
                    )
                });
                
                this.spinner = true;

                setTimeout(() => {
                    let comanda = new Comanda;
                    comanda.generate(data);
                    comanda.print(); 
                    this.spinner = false;
                }, 500);
            },

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

                let url = '/api/pedido_cliente/index?page=' + page;

                if (this.customer != null) {
                    url = url + '&customer='+this.customer.id;
                }

                if (this.status != null) {
                    url = url + '&status='+this.status.status_id;
                }

                url = url;

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.get(url).then((response) => {
                    this.$store.commit('SET_PEDIDOS', response.data.data);
                    this.www = response.data.pagination.last_page;
                    let customers_data = response.data.customers_data;
                    this.options.groupMeta = customers_data;
                    
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
            }

        },

        mounted()
        {
            this.loadData();
            
            //this.$refs.comanda_list.filteredData.map(row=>console.log(row.id));

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