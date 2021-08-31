<template>
    <div class="col-md-12">
        
            <v-client-table
                ref="publication_list"
                :columns="columns"
                :data="rows"
                :options="options"
            >
            
                <div slot="filter__id">
                    <input type="checkbox" 
                    class="form-control check-all" 
                    v-model='allMarked' 
                    >
                </div>

                <template slot="check" slot-scope="props">
                    <input type="checkbox" 
                    class="form-control" 
                    :value="props.row.id" 
                    v-model="markedRows">
                </template>
            
            </v-client-table>
        
    </div>
</template>

<script>
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import status from './../../status';
import meli_link from './../../meli_link';
import thumbnail from './../../thumbnail';
import {mapGetters, mapActions} from 'vuex';
import auth from './../../../../../mixins/auth';
import 'vue-loading-overlay/dist/vue-loading.css';
import currency from './../../../../../mixins/currency';
import PublicationListModel from './../PublicationListModel';
import toast_mixin from './../../../../../mixins/toast-mixin';
import PublicationListMetrica from './PublicationListMetrica';
import PublicationListChildRow from './PublicationListChildRow';
import row_number from './../../../publications/partials/row-number';
export default {
    mixins : [auth, toast_mixin, currency],
    data() {
        return {
            markedRows : [],
            allMarked : false,
            data_to_be_updated : [],
            columns : [
                'check',
                'number',
                'thumbnail',
                'brand',
                'model',
                'available_quantity',
                'price',
                'status'
            ],
            rows : [],
            options: {
                perPage : 31,
                headings: {
                    check : "Sel.",
                    number: "N°",
                    thumbnail : "Imagen",
                    brand : "Marca",
                    model : "Modelo",
                    available_quantity : "Métrica",
                    price : 'Valor',
                    new_price : 'Nuevo valor',
                    status : 'Estado',
                },
                templates: {
                    number : row_number,
                    thumbnail : thumbnail,
                    status : status,
                    available_quantity : PublicationListMetrica,
                    model : PublicationListModel
                },
                columnsClasses: {
                    number: 'text-center',
                    thumbnail : 'text-center',
                    title : 'text-center',
                    available_quantity : 'text-center',
                    price : 'text-center',
                    status : 'text-center',
                    brand : 'text-center',
                    model : 'text-center',
                    check : 'text-center',
                },
                childRow : PublicationListChildRow,
            }
        }
    },

    methods : {

       
        
    },


    computed : {

        ...mapGetters([
            'PublicationListGetter'
        ]),

        
    }, 

    watch : {

        PublicationListGetter(n){

            this.rows = n
        },

       
    },

    async mounted(){

        Event.$on('update_available_quantity_on_variation', (data) => {
            let ind = this.$refs.publication_list.tableData.findIndex(row => {
                    return row.id == data.publication.id
            });
            let inde = this.$refs.publication_list.tableData[ind].variations.findIndex(row => {
                    return row.id == data.variation_id
            });

            this.$refs.publication_list.tableData[ind].variations[inde].available_quantity = data.available_quantity;
        });

        Event.$on('update_price_on_variation', (publication) => {
            let ind = this.$refs.publication_list.tableData.findIndex(row => {
                    return row.id == publication.id
                });
                this.$refs.publication_list.tableData[ind].price = this.CurrencyFormat(publication.base_price);
        });

        Event.$on('update_available_quantity_on_publication', (publication) => {
            let ind = this.$refs.publication_list.tableData.findIndex(row => {
                    return row.id == publication.id
                });
                this.$refs.publication_list.tableData[ind].price = this.CurrencyFormat(publication.base_price);
                this.$refs.publication_list.tableData[ind].available_quantity = publication.available_quantity;
        });
        
        Event.$on('update_price_on_publication', (publication) => {
            let ind = this.$refs.publication_list.tableData.findIndex(row => {
                    return row.id == publication.id
                });
                this.$refs.publication_list.tableData[ind].price = this.CurrencyFormat(publication.base_price);
                this.$refs.publication_list.tableData[ind].available_quantity = publication.available_quantity;
        });
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