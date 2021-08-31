<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="row">
            <div class="col-md-12">
                <div class="form form-inline" >
                    <div class="form-group col-md-5" style="padding-bottom-15px">
                        <multiselect placeholder="Buscar Cliente" 
                            id="findCustomer"
                            track-by="name" label="name"
                            :loading="show_spinner_multiselect"
                            v-model="customer"
                            :options="customers"
                            :searchable="true"
                            :internal-search="false" 
                            :clear-on-select="true" 
                            @search-change="asyncFind"
                            @select="selectedCustomer"
                            @remove="removeCustomer"
                            selectLabel="Seleccionar"
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
                            selectLabel="Seleccionar"
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
                </div>
            </div>
        </div>
            <v-client-table
                ref="pedido_cliente_list"
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
                        :disabled="!props.row.has_delivery_date" 
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
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import Paginate from 'vuejs-paginate';
    import Loading from 'vue-loading-overlay';
    import Multiselect from 'vue-multiselect';
    import Datepicker from 'vuejs-datepicker';
    import CellEdit from './PedidoListCellEdit';
    import CellPrint from './PedidoListCellPrint';
    import {es} from 'vuejs-datepicker/dist/locale';
    import CellStatus from './PedidoListCellStatus';
    import Comanda from './../../../src/Pdf/Comanda';
    import sleep from './../../../mixins/sleep-mixin';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import PedidoListChildRow from './PedidoListChildRow';
    import toast_mixin from './../../../mixins/toast-mixin';
    import * as constants from './../../../src/const/Status';
    import row_number from './../publications/partials/row-number';
    import CellInvoiceGenerate from './PedidoListCellInvoiceGenerate';
    import async_find_customer from './../../../mixins/asyc-find-customer';
    import CustomerEditModal from './../customers/edit/CustomerEditModal';
    import CustomerEdit_Modal from './../customers/modal/CustomerEdit';
    import Iso8600Date from './../../../widgets/Iso860Date';
    export default {
        props : ['paginati'],
        components : {
            Loading, Paginate, Multiselect, Datepicker, CustomerEditModal, CustomerEdit_Modal
        },
        mixins : [async_find_customer, toast_mixin, sleep],
        data() {
            return {
                spinner : false,
                comandaArray : [],
                show : false,
                visible : false,
                date : new Date(),
                status_listated_date_from : null,
                status_listated_date_to : null,
                delivery_date_from : null,
                delivery_date_to : null,
                es : es,
                allMarked:false,
			    markedRows:[],
                www : 1,
                loading : false,
                status : null,
                statuses : [
                   {name : 'TODOS' , status_id : null},
                   {name : 'PENDIENTE' , status_id : constants.PENDIENTE},
                   {name : 'ELIMINADO' , status_id : constants.ELIMINADO},
                   {name : 'PRIMER CONTACTO' , status_id : constants.PRIMER_CONTACTO},
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
                    'customer',
                    'created_on_meli',
                    'date',
                    'code',
                    'total',
                    'status',
                    'print',
                    'edit',
                ],
                rows : [],
                options: {
                    orderBy: { column: false },
                    sortable: [],
                    uniqueKey : 'id',
                    perPage : 31,
                    pagination: { dropdown:false },
                    headings: {
                        id : 'Chk',
                        number : '#',
                        customer : 'Cliente',
                        created_on_meli : 'Fecha del Pedido',
                        date : 'Fecha de entrega',
                        code : 'Código',
                        total : 'Importe',
                        status : 'Estado',
                        print : 'Imprimir',
                        edit : 'Editar',

                    },
                    templates: {
                        number : row_number,
                        print : CellPrint,
                        edit : CellEdit,
                        delete : CellInvoiceGenerate,
                        status : CellStatus,
                        created_on_meli : Iso8600Date
                    },
                    columnsClasses: {
                        id : 'text-center',
                        number : 'col-md-1 text-center',
                        customer : 'text-left',
                        created_on_meli : 'col-md-2 text-center',
                        date : 'col-md-2 text-center',
                        code : 'col-md-2 text-center',
                        total : 'col-md-2 text-right',
                        status : 'col-md-1 text-center',
                        print : 'col-md-1 text-center',
                        edit : 'col-md-1 text-center',

                    },
                    //groupBy : 'customer',
                    //groupMeta: [],
                    cellClasses:{
                        id: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        number: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        created_on_meli: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        date: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        code: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        total: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        status: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        print: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],
                        edit: [
                            {
                                class:'success',
                                condition: row => (row.now)
                            }
                        ],

                    },
                    toggleGroups : true,
                    showChildRowToggler : true,
                    filterable: false,
                    childRow : PedidoListChildRow,
                } 
            }
        },

        computed : {
            ...mapGetters(
                [
                    'GetPedidos',
                    'GetCustomerPurchaserDocument',
                    'GetCustomersData',
                    'PedidoClientesAddNewAddressGetter'
                ]
            ),

            HasComandaPrint()
            {
                let markedRows = collect(this.markedRows);

                if (markedRows.count() > 0) {
                    return true;
                }

                return false;
            },

            Today(){
                return this.$moment(Date.now())
            },
        },

        watch : 
        {
            status_listated_date_from(n)
            {
                if (this.$moment(n) < this.$moment(this.delivery_date_from)) {
                    this.error_message('Fecha de Entrega DESDE no puede ser menor que Fecha estado listado DESDE', 'Fechas', 4000, 'center');   
                }
            },

            status_listated_date_to(n)
            {
                if(this.status_listated_date_from == null)
                {
                    this.info_message('Fecha desde no puede estar vacio', 'Fechas', 2000, 'center');
                    this.$refs.status_listated_date_to.clearDate();
                    this.status_listated_date_to = null
                }else if (this.$moment(n) < this.$moment(this.status_listated_date_from)) {
                    this.error_message('Fecha HASTA no puede ser menor que fecha DESDE', 'Fechas', 4000, 'center');
                    this.$refs.status_listated_date_to.clearDate();
                    this.status_listated_date_to = null;
                }
            },

            delivery_date_from(n)
            {
                if(this.$moment(n) < this.$moment(this.status_listated_date_from)) {
                    this.error_message('Fecha de entrega DESDE no puede ser menor que Fecha estado listado DESDE', 'Fechas', 4000, 'center');
                    this.$refs.delivery_date_from.clearDate();
                    this.delivery_date_from = null;
                }
            },

            delivery_date_to(n)
            {
                if(this.delivery_date_from == null)
                {
                    this.info_message('Fecha desde no puede estar vacio', 'Fechas', 2000, 'center');
                    this.$refs.delivery_date_to.clearDate();
                    this.delivery_date_to = null
                }else if (this.$moment(n) < this.$moment(this.delivery_date_from)) {
                    this.error_message('Fecha HASTA no puede ser menor que fecha DESDE', 'Fechas', 4000, 'center');
                    this.$refs.delivery_date_to.clearDate();
                }
            },

            GetPedidos(n)
            {
                this.rows = n;

                this.markedRows = [];

                this.rows.map(row => {

                    if (row.has_delivery_date) {
                        this.markedRows.push(row.id);
                    }
                });
            },

            GetCustomerPurchaserDocument(n)
            {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.customer_id == this.GetCustomersData.id
                });
                this.$refs.pedido_cliente_list.tableData[ind].customer = this.GetCustomersData.name;
                this.$refs.pedido_cliente_list.tableData[ind].customer_document_number = this.GetCustomersData.number;
                this.$refs.pedido_cliente_list.tableData[ind].customer_phone1 = this.GetCustomersData.phone_1;
                this.$refs.pedido_cliente_list.tableData[ind].customer_phone2 = this.GetCustomersData.phone_2;
                this.$refs.pedido_cliente_list.tableData[ind].customer_phone3 = this.GetCustomersData.phone_3;
                this.$refs.pedido_cliente_list.tableData[ind].has_afip_data = true;
                this.$refs.pedido_cliente_list.tableData[ind].customer_DocTipo = this.GetCustomersData.purchaser_document;
                this.$refs.pedido_cliente_list.tableData[ind].customer_inscription_id = this.GetCustomersData.inscription_id;
                this.$refs.pedido_cliente_list.tableData[ind].customer_inscription_name = this.GetCustomersData.inscription;
            },

            GetCustomersData(n)
            {
                this.$refs.pedido_cliente_list.tableData.forEach((row, index) => {
                    if (row.customer_id == this.GetCustomersData.id)
                    {
                        this.$refs.pedido_cliente_list.tableData[index].customer = this.GetCustomersData.name;
                        this.$refs.pedido_cliente_list.tableData[index].customer_document_number = this.GetCustomersData.number;
                        this.$refs.pedido_cliente_list.tableData[index].customer_phone1 = this.GetCustomersData.phone_1;
                        this.$refs.pedido_cliente_list.tableData[index].customer_phone2 = this.GetCustomersData.phone_2;
                        this.$refs.pedido_cliente_list.tableData[index].customer_phone3 = this.GetCustomersData.phone_3;
                        this.$refs.pedido_cliente_list.tableData[index].has_afip_data = this.GetCustomersData.customer_has_afip_data;
                        this.$refs.pedido_cliente_list.tableData[index].customer_has_afip_data = this.GetCustomersData.customer_has_afip_data;
                        this.$refs.pedido_cliente_list.tableData[index].customer_DocTipo = this.GetCustomersData.purchaser_document;
                        this.$refs.pedido_cliente_list.tableData[index].customer_inscription_id = this.GetCustomersData.inscription_id;
                        this.$refs.pedido_cliente_list.tableData[index].customer_inscription_name = this.GetCustomersData.inscription;
                    }
                });
            }
        },

        methods : {

            clear_dates()
            {
                this.$refs.status_listated_date_from.clearDate();
                this.$refs.status_listated_date_to.clearDate();
                this.$refs.delivery_date_from.clearDate();
                this.$refs.delivery_date_to.clearDate();
                this.status_listated_date_from = null;
                this.status_listated_date_to = null;
                this.delivery_date_from = null;
                this.delivery_date_to = null;
            },
            customFormatter(date){
                return this.$moment(date).format("DD/MM/YYYY");
            },
            toggleAll()
            {

            },

            unmarkAll()
            {

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

            goTo(customer_id)
            {
                window.location.href = "/clientes/edicion/" + customer_id;
            },

            loadData(page=1)
            {
                this.loading = true;
                
                this.comandaArray = [];
                this.allMarked = false;
                this.markedRows = [];
                
                let url = '/api/pedido_cliente/index?page=' + page;

                if (this.customer != null) {
                    url = url + '&customer='+this.customer.id;
                }

                if (this.status != null) {
                    url = url + '&status='+this.status.status_id;
                }

                if (this.status_listated_date_from != null) {
                    let status_listated_date_from = this.$moment(this.status_listated_date_from).format("YYYY-MM-DD 00:00:00");
                    url = url + '&status_listated_date_from='+status_listated_date_from;
                }

                if (this.status_listated_date_to != null) {
                    let status_listated_date_to = this.$moment(this.status_listated_date_to).format("YYYY-MM-DD 23:59:59");
                    url = url + '&status_listated_date_to='+status_listated_date_to;
                }

                if (this.delivery_date_from != null) {
                    let delivery_date_from = this.$moment(this.delivery_date_from).format("YYYY-MM-DD 00:00:00");
                    url = url + '&delivery_date_from='+delivery_date_from;
                }

                if (this.delivery_date_to != null) {
                    let delivery_date_to = this.$moment(this.delivery_date_to).format("YYYY-MM-DD 23:59:59");
                    url = url + '&delivery_date_to='+delivery_date_to;
                }

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.get(url).then((response) => {
                    this.$store.commit('SET_PEDIDOS', response.data.data);
                    this.www = response.data.pagination.last_page;
                    let customers_data = response.data.customers_data;
                    this.options.groupMeta = customers_data;
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
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
                    
                } );

                let data = [];

                collect(this.comandaArray).map(d => {
                    data.push(
                        {
                            customer : d.customer,
                            cv : '---------',
                            op : d.user_on_list_status[0],
                            address : d.pedido_delivery_address.name,
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
                    let comanda = new Comanda();
                    comanda.generate(data);
                    comanda.print(); 
                    this.spinner = false;
                }, 500);
            },

        },

        async mounted()
        {
            await this.$store.dispatch('get_company', this.User.token);
            
            if (sessionStorage.getItem("order_id") != null) {

                let payload = {
                    token : this.User.token,
                    code : sessionStorage.getItem("order_id")
                }
                sessionStorage.removeItem("order_id");
                this.sleep(500);
                let pedido = await this.$store.dispatch('pedido_show', payload)
                    .catch((err) => {
                        console.log('EEEEEEError');
                        console.log(err);
                    }).finally(()=>{
                        
                    });

                if(pedido)
                {
                    let order = [];
                    order.push(pedido.data);
                    this.$store.commit('SET_PEDIDOS', order);
                }
            }

            Event.$on('pedido_cliente_list', data => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.id
                });
                this.$refs.pedido_cliente_list.tableData[ind].status = data.status;
                this.$refs.pedido_cliente_list.tableData[ind].status_id = data.status_id;
                this.$refs.pedido_cliente_list.tableData[ind].customer_addresses = data.customer_addresses;

                let addresses = collect(data.customer_addresses);

                addresses.map(address => {
                    if (address.type == 'FISCAL') {
                        this.$store.commit('PEDIDO_CLIENTES_SET_FISCAL_ADDRESS', address.name);
                    }else{
                        this.$store.commit('PEDIDO_CLIENTES_SET_DELIVERY_ADDRESS', address.name);
                    }

                    if (address.type == 'ENTREGA') {
                        this.$store.commit('PEDIDO_CLIENTES_SET_DELIVERY_ADDRESS', address.name);
                    }else{
                        this.$store.commit('PEDIDO_CLIENTES_SET_FISCAL_ADDRESS', address.name);
                    }
                });

                this.$refs.pedido_cliente_list.tableData.forEach((row, index) => {
                    
                    if (row.customer_id == data.customer_id) {
                        this.$refs.pedido_cliente_list.tableData[index].customer_addresses = data.customer_addresses;
                        this.$refs.pedido_cliente_list.tableData[index].customer_DocTipo = data.customer_DocTipo;
                        this.$refs.pedido_cliente_list.tableData[index].customer_inscription_name = data.customer_inscription_name;
                        this.$refs.pedido_cliente_list.tableData[index].customer_document_number = data.customer_document_number;
                        this.$refs.pedido_cliente_list.tableData[index].customer = data.customer;
                        this.$refs.pedido_cliente_list.tableData[index].customer_has_afip_data = data.customer_has_afip_data;
                    }    
                });
            });

            Event.$on('pedido_cliente_list_update_comments', data => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.id
                });
                this.$refs.pedido_cliente_list.tableData[ind].comments = data.comments;

            });

            Event.$on('pedido_cliente_update_delivery_date', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.id
                });
                this.$refs.pedido_cliente_list.tableData[ind].date = data.date;
                this.$refs.pedido_cliente_list.tableData[ind].has_delivery_date = true;
            });

            Event.$on('pedido_cliente_delete', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.id
                });
                this.$refs.pedido_cliente_list.tableData.splice(ind, 1);
            });

            Event.$on('set_customer_address', (data) => {
                
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.data.id
                });
                
                this.$refs.pedido_cliente_list.tableData[ind].has_address = true;
                
                this.$refs.pedido_cliente_list.tableData.forEach((row, index) => {
                    
                    if (row.customer_id == data.address.person_id) {

                        if (this.$refs.pedido_cliente_list.tableData[index].customer_addresses) {
                            this.$refs.pedido_cliente_list.tableData[index].customer_addresses.push(data.address);
                            this.$refs.pedido_cliente_list.tableData[index].has_address = true;
                        }else{
                            this.$refs.pedido_cliente_list.tableData[index].customer_addresses = [];
                            this.$refs.pedido_cliente_list.tableData[index].customer_addresses.push(data.address);
                            this.$refs.pedido_cliente_list.tableData[ind].has_address = true;
                        }
                    }    
                });
            });

            Event.$on('set_customer_data_updated', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.data.id
                });
                this.$refs.pedido_cliente_list.tableData[ind].customer_DocTipo = data.customer_updated_data.purchaser_document;
                this.$refs.pedido_cliente_list.tableData[ind].customer_inscription_name = data.customer_updated_data.inscription;
                this.$refs.pedido_cliente_list.tableData[ind].customer_document_number = data.customer_updated_data.number;
                this.$refs.pedido_cliente_list.tableData[ind].customer = data.customer_updated_data.name;
                this.$refs.pedido_cliente_list.tableData[ind].customer_has_afip_data = data.customer_updated_data.customer_has_afip_data;
                this.$refs.pedido_cliente_list.tableData[ind].customer_addresses = data.customer_updated_data.addresses;
                
                this.$refs.pedido_cliente_list.tableData.forEach((row, index) => {
                    
                    if (row.customer_id == data.customer_updated_data.id) {
                        this.$refs.pedido_cliente_list.tableData[index].customer_addresses = data.customer_updated_data.addresses;
                        this.$refs.pedido_cliente_list.tableData[index].customer_DocTipo = data.customer_updated_data.purchaser_document;
                        this.$refs.pedido_cliente_list.tableData[index].customer_inscription_id = data.customer_updated_data.inscription_id;
                        this.$refs.pedido_cliente_list.tableData[index].customer_inscription_name = data.customer_updated_data.inscription;
                        this.$refs.pedido_cliente_list.tableData[index].customer_document_number = data.customer_updated_data.number;
                        this.$refs.pedido_cliente_list.tableData[index].customer = data.customer_updated_data.name;
                    }    
                });
                
            });

            let address_type = await this.$store.dispatch('getAddressType', this.User.token);

            if (address_type) {
                this.$store.commit('SET_ADDRESS_TYPE', address_type.data);
            }

            Event.$on('open_child_row_component', (id) => {
                let openRows = collect(this.$refs.pedido_cliente_list.openChildRows);

                openRows.map(row => {
                    if (row != id) {
                        this.$refs.pedido_cliente_list.toggleChildRow(row);
                    }
                })
            });

            Event.$on('save_fiscal_address', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.pedido_id
                });
                this.$refs.pedido_cliente_list.tableData[ind].pedido_fiscal_address = data.address.data;
            });

            Event.$on('remove_fiscal_address', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.pedido_id
                });
                this.$refs.pedido_cliente_list.tableData[ind].pedido_fiscal_address = false;
            });

            Event.$on('save_delivery_address', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.pedido_id
                });
                this.$refs.pedido_cliente_list.tableData[ind].pedido_delivery_address = data.address.data;
            });

            Event.$on('remove_delivery_address', (data) => {
                let ind = this.$refs.pedido_cliente_list.tableData.findIndex(row => {
                    return row.id == data.pedido_id
                });
                this.$refs.pedido_cliente_list.tableData[ind].pedido_delivery_address = false;
            });
            
            Event.$on('update_customer_from_modal_form', (customer) => {

                this.$refs.pedido_cliente_list.tableData.findIndex((row, index) => {
                    if (row.customer_id == customer.id) {
                        this.$refs.pedido_cliente_list.tableData[index].customer_addresses = customer.addresses;
                        this.$refs.pedido_cliente_list.tableData[index].customer_cellphone = customer.cell_phone;
                        this.$refs.pedido_cliente_list.tableData[index].customer_contact = customer.contact;
                        this.$refs.pedido_cliente_list.tableData[index].customer_has_afip_data = customer.customer_has_afip_data;
                        this.$refs.pedido_cliente_list.tableData[index].email = customer.email;
                        this.$refs.pedido_cliente_list.tableData[index].customer_phone_1 = customer.phone_1;
                        this.$refs.pedido_cliente_list.tableData[index].customer_phone_2 = customer.phone_2;
                        this.$refs.pedido_cliente_list.tableData[index].customer_phone_3 = customer.phone_3;
                    }
                });
            });

            Event.$on('open-order-from-notification', (notification)=> {
                this.$refs.pedido_cliente_list.tableData.findIndex((row, index) => {
                    if (row.meli_id == notification) {
                        this.$refs.pedido_cliente_list.toggleChildRow(row.id);
                    }
                });
            });

            Event.$on('open-order-from-notification_order', (notification)=> {
                this.$refs.pedido_cliente_list.tableData.findIndex((row, index) => {
                    if (row.meli_id == notification) {
                        this.$refs.pedido_cliente_list.toggleChildRow(row.id);
                    }
                });
            });

            /* window.Echo.channel('hook-message-channel')
                .listen('.Web-Hook-Message-Event', (message) => {
                    this.$refs.pedido_cliente_list.tableData.findIndex((row, index) => {
                        if (message.message.order_id == row.meli_id) {
                            this.$store.commit('ADD_MELI_MESSAGE', message.message);
                        }
                    });
                });
            
            window.Echo.channel('hook-order-channel')
                .listen('.Web-Hook-Order-Event', (order) => {
                    this.$refs.pedido_cliente_list.tableData.push(order.order);
                }); */

            
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