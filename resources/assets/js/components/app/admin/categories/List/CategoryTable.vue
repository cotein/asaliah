<template>
    <div>
        <v-client-table
                ref="categories_list"
                :columns="columns"
                :data="rows"
                :options="options"
            >
            
            </v-client-table>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import StatusInfo from './StatusInfo.vue';
import row_number from './../../../publications/partials/row-number.vue';
    export default {
        data(){
            return {
                columns : [
                    'number',
                    'name',
                    'status',
                    'isFather',
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
                        name : 'Categoría',
                        status : 'Estado',
                        isFather : 'Es madre',
                    },
                    templates: {
                        number : row_number,
                        status : StatusInfo,
                    },
                    columnsClasses: {
                        number : 'col-md-1 text-center',
                        name : 'col-md-8 text-left',
                        status : 'col-md-2 text-center',
                        isFather : 'col-md-1 text-center',

                    },
                    filterable: false,
                } 
            }
        },

        computed : {
            ...mapGetters([
                'CategoriesList'
            ])
        },

        watch : {

            CategoriesList(n)
            {
                this.rows = n;
            }

        },

        mounted(){

            Event.$on('StatusCategoryWasChange', (category) => {

                this.$refs.categories_list.tableData.forEach((row, index) => {
                    if (row.id == category.data.id) {
                        console.log('category');
                        this.$refs.categories_list.tableData[index].status = category.data.active;
                    }
                })
            });
        }
    }
</script>

<style lang="scss" scoped>

</style>