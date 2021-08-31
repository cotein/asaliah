<template>
    <div>
        <label class="control-label">Listado</label>
        <v-client-table
                ref="price_list_table"
                :columns="columns"
                :data="rows"
                :options="options"
            >
        </v-client-table>
    </div>
</template>

<script>
    import {Event} from 'vue-tables-2';
    import {mapGetters, mapActions} from 'vuex';
    import benefitComponent from './components/benefit.vue';
    import StatusButton from './../../../../Base/Button/StatusButton.vue';
    export default {
        
        data(){
            return {
                columns : [
                    'id',
                    'name',
                    'benefit',
                    'enable',
                    'edit'
                ],
                rows : [],
                options : {
                    orderBy: { column: false },
                    sortable: [],
                    uniqueKey : 'id',
                    perPage : 31,
                    pagination: { dropdown:false },
                    headings: {
                        id : '#',
                        name : 'Nombre',
                        benefit : 'Beneficio',
                        enable : 'Estado',
                        edit : 'Editar',
                    },
                    templates: {
                       benefit : benefitComponent,
                       enable : StatusButton
                    },
                    columnsClasses: {
                        id : 'col-md-2 text-center',
                        name : 'col-md-3 text-left',
                        benefit : 'col-md-3 text-center',
                        enable : 'col-md-2 text-center',
                        edit : 'col-md-2 text-center',

                    },

                    toggleGroups : true,
                    showChildRowToggler : true,
                    filterable: false,
                }            
            }
        },

        methods : {

            ...mapActions([
                'priceListGetListAction'
            ]),
        },

        computed : {

            ...mapGetters([
                'PriceListListGetter'
            ])
        },

        watch : {

            PriceListListGetter(n){
                this.rows = n;
            }
        },

        async mounted(){

            let list = await this.priceListGetListAction(this.User.token)
                .catch(err => console.log('Estoy en pricelist table mounted'));
            
            if (list) {
                this.$store.commit('PRICE_LIST_SET_LIST', list.data);
            }

            Event.$on('PriceListWasCreated', new_price_list => {
                this.$refs.price_list_table.tableData.unshift(new_price_list)
                //console.log(new_price_list);
                console.log(new_price_list);
            });

        }
    }
</script>

<style  scoped>
    div label {
        font-size: 2rem;
    }
</style>