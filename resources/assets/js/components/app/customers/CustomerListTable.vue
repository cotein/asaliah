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
                            v-model="customer"
                            :options="customers"
                            :loading="show_spinner_multiselect"
                            :searchable="true"
                            :internal-search="false" 
                            :clear-on-select="true" 
                            @search-change="asyncFind"
                            :options-limit="300"
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
                    <!-- <div class="form-group col-md-4" style="padding-bottom-15px">
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
                    </div> -->
                    <button 
                        class="btn btn-primary col-md-offset-4" 
                        type="submit"
                        @click.prevent="loadData()"
                        >Buscar Cliente</button>
                </form>
        </div>
        <v-client-table
            ref="pedido_cliente_list"
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
    import auth from './../../../mixins/auth';
    import Loading from 'vue-loading-overlay';
    import Multiselect from 'vue-multiselect';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import CustomerListCellEdit from './CustomerListCellEdit';
    import CustomerListCellDelete from './CustomerListCellDelete';
    import row_number from './../publications/partials/row-number';
    import async_find_customer from './../../../mixins/asyc-find-customer';
    export default {
        components : {
            Loading, Paginate, Multiselect
        },
        mixins : [auth, async_find_customer],
        data() {
            return {
                loading : false,
                pageCount : 1,
                columns : [
                    'num',
                    'name',
                    'number',
                    'edit',
                    'delete',

                ],
                rows : [],
                options: {
                    perPage: 50,
                    perPageValues: [10, 25, 50, 100],
                    pagination: { dropdown:true },
                    headings: {
                        num : '#',
                        name : 'Nombre',
                        number : 'CUIT',
                        edit : 'Editar',
                        delete : 'Eliminar',
                    },
                    templates: {
                        num : row_number,
                        edit : CustomerListCellEdit,
                        delete : CustomerListCellDelete,
                    },
                    columnsClasses: {
                        num : 'col-md-1 text-center',
                        name : 'col-md-5 text-left',
                        number : 'col-md-4 text-center',
                        edit : 'col-md-1 text-center',
                        delete : 'col-md-1 text-center',
                    },
                    toggleGroups : true,
                    filterable: [],
                    //childRow : PedidoListChildRow
                } 
            }
        },

        computed : {
            ...mapGetters(
                [
                    'GetCustomersList'
                ]
            )
        },

        watch : 
        {
            GetCustomersList(n)
            {
                this.rows = n;
            }
        },

        methods : {

            loadData(page=1)
            {
                let url = '/api/customer/index?page=' + page;

                if (this.customer != null) {
                    url = url + '&customer='+this.customer.id;
                }

                this.loading = true;

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.get(url).then((response) => {
                    this.$store.commit('SET_CUSTOMERS_LIST', response.data.data);
                    this.pageCount = response.data.pagination.last_page;
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
            }
        },
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
</style>