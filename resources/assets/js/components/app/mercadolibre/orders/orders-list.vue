<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <v-client-table
            ref="order-list"
            :columns="columns"
            :data="rows"
            :options="options"
        >

            <!-- <template slot="child_row" slot-scope="props" >
                <div class="col-md-4">
                    <h5>{{props.row.id}}</h5>
                    <p> {{props.row.title}}</p>
                </div>

                <wrapper_variations 
                    :colmd="'col-md-8'" 
                    :publication="props.row"
                    :token="token">
                </wrapper_variations>
                
            </template> -->

        </v-client-table>
                <div class="text-center">
                <paginate
                    :page-count="pageAcount"
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
    import 'vue-loading-overlay/dist/vue-loading.css';
    import order_detail_button from './order-detail-button';
    import row_number from './../../publications/partials/row-number.vue';
    export default {
        props : ['token'],
        components : {
            row_number, order_detail_button, Paginate, Loading
        },
        data() {
            return {
                loading : false,
                pageAcount : 1,
                offset : null,
                limit : 50,
                columns : [
                    'number',
                    'id',
                    'date',
                    'name',
                    'phone',
                    'price',
                    'status',
                    'action'
                ],
                rows : [],
                options: {
                    perPage: 50,
                    perPageValues: [10, 25, 50, 100],
                    headings: {
                        number : '#',
                        id : 'ID',
                        date : 'Fecha',
                        name : 'N. y Apellido',
                        phone : 'Teléfono',
                        price : 'Valor',
                        status : 'Estado',
                        action : 'Comprobante'
                    },
                    templates: {
                        number : row_number,
                        action : order_detail_button
                    },
                    columnsClasses: {
                        id : 'text-center',
                        date : 'text-center',
                        phone : 'text-center',
                        price : 'text-right',
                        status : 'text-center',
                        action : 'text-center',
                    },
                    filterable: []
                }
            }
        },
        watch : {

            GetOrders(n){
                this.rows = n;
            }

        },

        methods : {
            
            /* async pp () {
                
                let response = await this.$store.dispatch('get_all_orders', this.User.token);
                console.log(response);
                let total = response.data.paginate.total;

                for (let index = 0; index < total; index++) {
                    let response = await this.$store.dispatch('get_all_orders', this.User.token);
                    console.log(response.data.meli_data);
                    console.log('object  --- ' + index);
                }

            }, */
            async getOrders(){
                let orders = await this.$store.dispatch('getOrders', this.token);

                if (orders) {
                    console.log(orders);
                }
            },
            loadData(page=1)
                {
                    this.loading = true;
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    this.offset = (page * this.limit) - this.limit;

                    if (this.offset < 0) {
                        this.offset = 0
                    }
                    axios.post('/api/orders/getorders',
                        {
                            offset : this.offset,
                            limit : this.limit,
                            page : page
                        }
                    ).then((response) => {
                        this.rows = response.data.meli_data;
                        this.pageAcount = response.data.paginate.total
                        this.offset = response.data.paginate.offset
                    }).catch((err) => {
                        
                    }).finally(()=> this.loading = false);
                }
        },
        computed : {
            
            ...mapGetters(['GetOrders'])
        },

        mounted() {
            
            setTimeout(() => {
                
                //this.getOrders();
                this.loadData()

            }, 150);
            /* console.log('ppaspasoasas');
            this.$store.dispatch('get_all_orders', this.User.token); */
            //this.pp();
        },
       
    }
</script>
