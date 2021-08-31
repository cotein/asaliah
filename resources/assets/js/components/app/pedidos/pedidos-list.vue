<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <v-client-table
            ref="pedido-list"
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
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loading from 'vue-loading-overlay';
    import bill_button from './extras/bill-button';
    import 'vue-loading-overlay/dist/vue-loading.css';
    import row_number from './../publications/partials/row-number';
    export default {
        props : ['token'],
        components : {
            row_number, Loading, bill_button
        },
        data() {
            return {
                loading : true,
                columns : [
                    'number',
                    'date',
                    'code',
                    'mercadopago_id',
                    'status',
                    'billed',
                    'bill',
                ],
                rows : [],
                options: {
                    perPage: 50,
                    perPageValues: [10, 25, 50, 100],
                    headings: {
                        number : '#',
                        date : 'Fecha de creación',
                        code : 'Código interno',
                        mercadopago_id : 'ID M. Pago',
                        status : 'Estado',
                        billed : 'Facturado',
                        bill : 'Facturar',
                    },
                    templates: {
                        number : row_number,
                        bill : bill_button,
                    },
                    columnsClasses: {
                        code : 'text-center',
                        date : 'text-center',
                        mercadopago_id : 'text-center',
                        status : 'text-center',
                        billed : 'text-center',
                        bill : 'text-center',
                    },
                    cellClasses:{
                        date: [
                            {
                                class:'diego',
                                condition : row=>true==true
                            }
                        ]
                    },
                    filterable: []
                }
            }
        },
        watch : {
            Pedidos(n){
                this.rows = n;
            }
        },

        methods : {
            
            getPedidos(){
                this.$store.dispatch('getPedidos', this.token).then((result) => {
                    
                    this.$store.commit('SET_PEDIDOS', result.data);

                }).catch((err) => {
                    
                }).finally(()=>{
                    this.loading = false;
                });
            }
        },
        computed : {
            ...mapGetters(['Pedidos']),
        },

        mounted() {
            
            setTimeout(() => {
                
                this.getPedidos();

            }, 150);

        },
       
    }
</script>

<style scoped>
    .diego {
        width: 500px;
    }
    td:nth-child(2) {
        width: 500px;
    }
</style>