<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <v-client-table
            ref="publicationList"
            :columns="columns"
            :data="rows"
            :options="options"
        >

            <template slot="beforeTable" >
                <div class="row" style="padding-bottom:15px">
                    <div class="col-md-2">
                        <label class="switch switch-primary">
                            <input class="switch-input" type="checkbox"
                            v-model='allMarked' 
                            @click="allMarked = !allMarked"
                            @change="markAll()">
                            <span class="switch-track"></span>
                            <span class="switch-thumb"></span>
                            <span style="margin-left:51px">Todas</span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <label > Variar el valor en
                        <div style="padding-left:10px" class="btn-group btn-group-sm" role="group">
                            <button  @click="decrementPrice()" class="btn btn-default" type="button" >
                                <span class="icon icon-minus"></span>
                            </button>
                            <div class="btn texto">
                                {{NewPrice + '%'}}
                            </div>
                            <button  @click="incrementPrice()" class="btn btn-default" type="button" >
                                <span class="icon icon-plus"></span>
                            </button>
                        </div>
                        </label>
                    </div>
                    <div class="col-md-offset-4 col-md-2 ">
                        <button @click="updatePriceAndQuantity()"  class="btn btn-warning pull-right" type="button" >
                            Actualizar Precio
                        </button>
                    </div>
                </div>
            </template>

            <template slot="child_row" slot-scope="props" >
                <div class="col-md-4">
                    <h5>{{props.row.id}}</h5>
                    <p> {{props.row.title}}</p>
                </div>

                <wrapper_variations 
                    :colmd="'col-md-8'" 
                    :publication="props.row"
                    :token="token">
                </wrapper_variations>
                
            </template>

        </v-client-table>
    </div>
</template>

<script>
import price from './price';
import check from './check';
import status from './status';
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import meli_link from './meli_link';
import thumbnail from './thumbnail';
import date_format from './date-format';
import Loading from 'vue-loading-overlay';
import {mapGetters, mapActions} from 'vuex';
import busVue from './../../../extras/eventBus';
import 'vue-loading-overlay/dist/vue-loading.css';
import row_number from './../publications/partials/row-number';
export default {
    props : {
        token : String,
    },
    components : {
        Loading
    },
    data() {
        return {
            allMarked : false,
            data_to_be_updated : [],
            increment_price : 0,
            increment_available_quantity : 0,
            loading : true,
            columns : [
                'check',
                'number',
                'thumbnail',
                'brand',
                'model',
                'available_quantity',
                'price',
                'new_price',
                'status'
            ],
            rows : [],
            original_rows : [],
            options: {
                perPage: 15,
                filterByColumn:true,
                perPageValues: [10, 25, 50, 100],
                headings: {
                    check : "Sel.",
                    number: "N°",
                    thumbnail : "Imagen",
                    brand : "Marca",
                    model : "Modelo",
                    available_quantity : "Stock",
                    price : 'Valor',
                    new_price : 'Nuevo valor',
                    status : 'Estado',
                },
                templates: {
                    number : row_number,
                    thumbnail : thumbnail,
                    price : price,
                    check : check,
                    status : status,
                },
                columnsClasses: {
                    number: 'text-center',
                    id: 'text-center',
                    thumbnail : 'text-center',
                    category_id : 'text-center',
                    title : 'text-center',
                    available_quantity : 'text-center',
                    //listing_type_id : 'text-center',
                    start_time : 'text-center',
                    meli_link : 'text-center',
                    price : 'text-center',
                    date_format : 'text-center',
                    status : 'text-center',
                    edit : 'text-center',
                    brand : 'text-center',
                    model : 'text-center',
                    check : 'text-center',
                    new_price : 'text-center',
                },
                //sorteable: ["id", 'category_id', 'status', 'price', 'brand', 'model'],
                filterable: ["id", 'category_id', 'status', 'price', 'brand', 'model', 'title']
            }
        }
    },
    methods: {
        ...mapActions([
            'fetchPublicationHeaders'
        ]),

        incrementPrice(){
            
            this.increment_price = this.increment_price + 1;

            this.newPrice();
        },

        decrementPrice(){

            this.increment_price = this.increment_price - 1;

            this.newPrice();
        },
        
        incrementAvailableQuantity(){
            
            this.increment_available_quantity = this.increment_available_quantity + 1;

            this.newQuantity();

        },

        decrementAvailableQuantity(){
            
            this.increment_available_quantity = this.increment_available_quantity - 1;

            this.newQuantity();
        },
        
        updateNewAvailableQuantity(rows){

            rows.each((row)=>{

                if (row.selected_to_update) {

                    row.new_available_quantity = (row.available_quantity + this.increment_available_quantity);
                        
                }
            });

        },

        newQuantity(){

            let rows_to_show = collect(this.rows);

            this.updateNewAvailableQuantity(rows_to_show);

            let rows_to_update = collect(this.data_to_be_updated);

            this.updateNewAvailableQuantity(rows_to_update);

        },

        updateNewPrice(rows){

            rows.each((row)=>{

                if (row.selected_to_update) {

                    row.new_price = this.$options.filters.currency(row.price + (row.price * this.increment_price / 100))
                        
                }
            });

        },

        newPrice(){

            let rows = collect(this.rows);

            this.updateNewPrice(rows);
            
            let rows_to_update = collect(this.data_to_be_updated);

            this.updateNewPrice(rows_to_update);
        },

		markAll() {   

            this.data_to_be_updated = [];

            if (this.allMarked) {

                Event.$emit('checkAll');

                let all = collect(this.$refs.publicationList.allFilteredData);

                let result = all.each((row)=>{
                    
                    return row.selected_to_update = true;
                
                });

                this.data_to_be_updated = result.all();

                this.rows = result.all();
                
            }else{
                
                this.data_to_be_updated = [];

                Event.$emit('uncheckAll');

                this.$refs.publicationList.$data.query = "";

                Vue.set(this, 'rows', this.original_rows)
                
            }

        },

        updatePriceAndQuantity(){

            let $vm = this;

            let data = collect(this.data_to_be_updated);

            if (data.count() > 0) {
                
                $vm.loading = true;

                data.each((row, index) => {
                    
                    setTimeout(() => {

                        window.axios.defaults.headers.common['Authorization'] = 'Bearer ' +  $vm.token;
                    
                        axios.put('/api/publication/update_price', 
                            {
                                'row' : row
                            }
                        ).then((result) => {
                            
                            $vm.$toast.info('Publicación actualizada correctamente ' + (index + 1) + ' de ' + data.count(), 'Proceso exitoso', $vm.InfoOk);    

                            if ((index + 1) == data.count()) {
                            
                                $vm.loading = false;

                                //location.reload();

                            }
                            console.log('result updfate price');
                            console.log(result);
                            Event.$emit('price_change', result);
                        }).catch((err) => {

                            $vm.loading = false;

                            $vm.$toast.error('Error: ' + err.response.status + ' Mensaje: ' + err.response.data , 'Se ha producido un error', $vm.ErrorNotification);    

                        });
                        
                    }, 1000 * index);
                })
            }
        },

        replaceDataInRows(rowsData, data){
            let $vm = this;
            let rows = collect(rowsData);

            rows.each((r, i) => {
                
                if (r.id == data.id) {
                    rowsData[i].available_quantity = data.available_quantity;
                    rowsData[i].new_available_quantity = 0;
                    rowsData[i].price = data.price;
                    rowsData[i].new_price = 0;
                }
            });
        }

    },

    computed : {
        ...mapGetters([
            'MeliPublications',
            'MeliPublicationsHeader',
            'UserToken',
            'PublicationsFromHere',
            'InfoOk',
            'ErrorNotification'
        ]),

        NewPrice(){
            return this.increment_price;
        },

        NewAvailableQuantity(){
            return this.increment_available_quantity;
        },

    },
    mounted() {
        let $vm = this;

        setTimeout(() => {
            Event.$emit('token', $vm.token);
        }, 1100);

        setTimeout(() => {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' +  $vm.token;
                axios.get('/api/publication/index')
                .then((result) => {

                    $vm.loading = false;

                    $vm.rows = result.data;

                    $vm.original_rows = result.data

                }).catch((err) => {
                    $vm.loading = false;
                });
            }, 750);
            
        Event.$on('vue-tables.filter', (payLoad)=>{
            
            $vm.increment_price = 0;

            $vm.data_to_be_updated = [];
            
            $vm.allMarked = false;

            Event.$emit('uncheckAll');

        });

        Event.$on('checked', (row) => {
            
            let index = null;
            
            $vm.data_to_be_updated.push(row);

            collect($vm.rows).each((r, i)=>{

                if (r.id == row.id) {
                    
                    $vm.rows[i].selected_to_update = true;

                }
            });
        });

        Event.$on('unchecked', (row) => {

            let index = null;

            collect($vm.data_to_be_updated).each((r, i)=>{

                if (r.id == row.id) {

                    Vue.delete($vm.data_to_be_updated, i);

                    $vm.rows[i].new_price = $vm.$options.filters.currency(0);

                }
            });
        });

        Event.$on('available_quantity_change', (publication) => {
            let ind = this.$refs.publicationList.tableData.findIndex(row => {
                return row.id == publication.id
            });
            this.$refs.publicationList.tableData[ind].available_quantity = publication.available_quantity;
        });
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
        width: 20px;
    }
    tr td:nth-child(5) {
        width: 100px;
    }
    tr td:nth-child(6) {
        width: 140px;
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
