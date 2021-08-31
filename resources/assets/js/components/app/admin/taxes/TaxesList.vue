<template>
    <div  style="overflow-x: auto;">
        <TaxNew />
        <v-client-table
                ref="taxes_list"
                :columns="columns"
                :data="rows"
                :options="options"
            >
        </v-client-table>
    </div>
</template>

<script>
import TaxNew from './TaxNew';
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Paginate from 'vuejs-paginate';
import TaxesStatesUpdate from './TaxesStatesUpdate';
import status_button from './TaxesStatusButton';
import TaxesStatusButton from './TaxesStatusButton';
import row_number from './../../publications/partials/row-number';
import TaxesAccountingAccountUpdate from './TaxesAccountingAccountUpdate';
import TaxesTypeUpdate from './TaxesTypeUpdate.vue';
    export default {
        components : {
            Paginate, TaxNew
        },
        data(){
            return {
                columns : [
                    'number',
                    'name',
                    'accounting_account',
                    'type',
                    'state',
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
                        name : 'Impuesto',
                        accounting_account : 'Cuenta contable asignada',
                        type : 'Categoría',
                        state : 'Provincia',
                        status : 'Estado',

                    },
                    templates: {
                        number : row_number,
                        status : status_button,
                        accounting_account : TaxesAccountingAccountUpdate,
                        type : TaxesTypeUpdate,
                        state : TaxesStatesUpdate,
                        status : TaxesStatusButton
                    },
                    columnsClasses: {
                        number : 'col-md-1 text-center',
                        name : 'col-md-2 text-left',
                        accounting_account : 'col-md-4 text-center',
                        type : 'col-md-2 text-center',
                        state : 'col-md-2 text-center',
                        status : 'col-md-1 text-center',
                    },
                    filterable: false,
                } 
            }
        },

        computed : {
            ...mapGetters([
                'TaxesGetter'
            ])
        },

        watch : {

            TaxesGetter(n)
            {
                this.rows = n;
            }
        },

        async mounted(){

            let taxes = await this.$store.dispatch('get_taxes', this.User.token);

            if (taxes) 
            {
                this.$store.commit('SET_TAXES', taxes);
            }

            await this.$store.dispatch('get_accounting_accounts', this.User.token);

            let tax_types = await this.$store.dispatch('get_tax_types', this.User.token);

            if (tax_types) 
            {
                this.$store.commit('SET_TAX_TYPES', tax_types);
            }

            let states = await this.$store.dispatch('getProvinces');
            
            if (states)
            {
                this.$store.commit('SET_PROVINCES', states.data);
            }

            Event.$on('tax_set_active', (data) => {

                this.$refs.taxes_list.tableData.forEach((row, index) => {
                    if (data.id == row.id) {
                        this.$refs.taxes_list.tableData[index].status = data.status;
                        this.$refs.taxes_list.tableData[index].status_name = data.status_name;
                    }
                });
            })
        }
    }
</script>

<style lang="scss" scoped>

</style>