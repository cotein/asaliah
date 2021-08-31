<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <v-client-table
            ref="paymentList"
            :columns="columns"
            :data="rows"
            :options="options"
        >
           <!--  <template slot="child_row" slot-scope="props" >
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
import collect from 'collect.js';
import Loading from 'vue-loading-overlay';
import {mapGetters, mapActions} from 'vuex';
import status from './extras/status-button';
import bill_button from './extras/bill-button';
import 'vue-loading-overlay/dist/vue-loading.css';
import row_number from './../publications/partials/row-number';
export default {
    components : {
        row_number, Loading, status, bill_button
    },

    props : {
        token : String,
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
                    date : 'Fecha',
                    code : 'Número de orden',
                    mercadopago_id : 'Mercadopago Id',
                    status : 'Estado',
                    billed : 'Facturado',
                    bill : 'Facturar'
                },
                templates: {
                    number : row_number,
                    status : status,
                    bill : bill_button
                },
                columnsClasses: {
                    number : 'text-center',
                    date : 'text-center',
                    code : 'text-center',
                    mercadopago_id : 'text-center',
                    status : 'text-center',
                    billed : 'text-center',
                    bill : 'text-center',
                },
                filterable: []
            }
        }
    },

    methods: {
        getPedidos(){
            this.$store.dispatch('getPedidos', this.token)
            .then((result) => {
                this.$store.commit('SET_PEDIDOS', result.data);
                this.rows = this.Pedidos;
            }).catch((err) => {
                
            }).finally(()=>{
                this.loading = false;
            });
        }
    },

    computed : {
        ...mapGetters([
            'Pedidos'
        ])
    },

    beforeMount() {
        this.getPedidos();
    },
    mounted() {
        this.$store.dispatch('fetchIvas');
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
        font-family: FontAwesome;
        content: "\f067";
        color :green;
    }

    .VueTables__child-row-toggler--open::before {
        font-family: FontAwesome;
        content: "\f111";
        color : red;
    }

    tr td:nth-child(1) {
        width: 15px;
    }

    tr td:nth-child(2) {
        width: 100px;
    }

    tr td:nth-child(3) {
        width: 131;
    }

    tr td:nth-child(4) {
        width: 131px;
    }
    
    .disabled {
        pointer-events: none;
        text-decoration:line-through;
    }
    .texto {
        text-decoration: bold;
        color: whitesmoke;
        background-color: grey;
    }
   
</style>
