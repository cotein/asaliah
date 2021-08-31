<template>
    <div>
        <v-client-table
                ref="activate_user_list"
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
import user_rol from './ActivateUserRol';
import status_button from './ActivateUserStatusButton';
import row_number from './../../publications/partials/row-number';
    export default {
        data(){
            return {
                columns : [
                    'number',
                    'name',
                    'rol',
                    'status',
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
                        name : 'Usuario',
                        rol : 'Categorìa',
                        status : 'Estado',

                    },
                    templates: {
                        number : row_number,
                        status : status_button,
                        rol : user_rol
                    },
                    columnsClasses: {
                        number : 'col-md-1 text-center',
                        name : 'col-md-5 text-left',
                        rol : 'col-md-5 text-center',
                        status : 'col-md-1 text-center',

                    },
                    cellClasses:{
                        

                    },
                    filterable: false,
                } 
            }
        },

        computed : {
            ...mapGetters([
                'UsersGetter'
            ])
        },

        watch : {

            UsersGetter(n)
            {
                this.rows = n;
            }

        },

        mounted(){

            Event.$on('activate_user', (user) => {

                this.$refs.activate_user_list.tableData.forEach((row, index) => {
                    if (row.user_id == user.user_id) {
                        this.$refs.activate_user_list.tableData[index].active = user.active;
                        this.$refs.activate_user_list.tableData[index].status = user.status;
                    }
                })
            });
        }
    }
</script>

<style lang="scss" scoped>

</style>