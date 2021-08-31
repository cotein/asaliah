<template>
    <div>
        <v-client-table
            ref="categories_list"
            :columns="columns"
            :data="rows"
            :options="options"
        >
        
        </v-client-table>
        <div class="col-md-12 text-center">
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
import StatusInfo from './StatusInfo.vue';
import EditButton from './EditButton.vue';
import Attribues from './Attributes.vue';
import row_number from '../../../publications/partials/row-number.vue';
    export default {
        
        components : {Paginate},

        data(){
            return {
                pageCount : 1,
                page : 1,
                columns : [
                    'number',
                    'code',
                    'name',
                    'attributes',
                    'status',
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
                        number : '#',
                        code : 'Código',
                        name : 'Nombre',
                        attributes : 'Atributos',
                        status : 'Estado',
                        edit : 'Editar',
                    },
                    templates: {
                        number : row_number,
                        status : StatusInfo,
                        attributes : Attribues,
                        edit : EditButton,
                    },
                    columnsClasses: {
                        number : 'col-md-1 text-center',
                        code : 'col-md-1 text-left',
                        name : 'col-md-6 text-left',
                        attributes : 'col-md-2 text-left',
                        status : 'col-md-2 text-center',
                    },
                    filterable: false,
                } 
            }
        },

        computed : {
            ...mapGetters([
                'ListProductsGetter'
            ])
        },

        watch : {

            ListProductsGetter(n)
            {
                this.rows = n;
            }

        },

        methods : {

            async loadData(page=1){

                let payload = {
                    page : page,
                    token : this.User.token
                }
            
                let response = await this.$store.dispatch('loadData', payload);

                if (response) {
                    this.pageCount = response.data.pagination.last_page;
                    this.$store.commit('ADD_PRODUCTS_TO_LIST_PRODUCTS', response.data.data);
                }

            }
        },

        mounted(){

            this.loadData();
        }
       
    }
</script>
