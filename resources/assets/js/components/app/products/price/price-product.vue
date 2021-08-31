<template>
    <div>
        <async_find_product></async_find_product>
        <v-client-table
            ref="pricelist_by_product"
            :columns="columns"
            :options="options"
            v-model="rows"
            @input="input"
            @update="price_update"
        >
            <a slot="price" slot-scope="props" target="_blank" :href="props.row.price" class="glyphicon glyphicon-eye-open"></a>
            <div slot="price" slot-scope="{row, update, setEditing, isEditing, revertValue}">
                <span @click="setEditing(true)" v-if="!isEditing()">
                    <a>{{row.price}}</a>
                </span>
                <span v-else>
                    <!-- <input type="text" v-model="row.price"> -->
                    <vue-autonumeric 
                        class="form-control"
                        v-model="row.price"
                        :options="numeric_options"
                    ></vue-autonumeric>
                    <button 
                        type="button" 
                        class="btn btn-primary btn-xs" 
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : loading}"
                        @click="update(row.price); 
                        setEditing(false)">Actualizar
                    </button>
                    <button type="button" class="btn btn-default btn-xs" @click="revertValue(); setEditing(false)">Cancelar</button>
                </span>

            </div>
        </v-client-table>
        
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import async_find_product from './async-find-product';
    import row_number from './../../publications/partials/row-number.vue';
    import VueAutonumeric from './../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        
        components : {
            async_find_product, VueAutonumeric
        },

        data() {
            return {
                loading : false,
                
                columns : [
                    'pricelist_name',
                    'price',
                    
                ],
                rows : [],
                numeric_options : {
                    digitGroupSeparator: '.',
                    decimalCharacter: ',',
                    decimalCharacterAlternative: '.',
                    currencySymbol: '$ ',
                    currencySymbolPlacement: 'p',
                    roundingMethod: 'U',
                    minimumValue: '0',
                    modifyValueOnWheel  : false,
                    showOnlyNumbersOnFocus : true,
                },
                options: {
                    uniqueKey : 'pricelist_id',
                    perPage: 50,
                    perPageValues: [10, 25, 50, 100],
                    pagination: { dropdown:true },
                    headings: {
                        number : '#',
                        pricelist_name : 'Lista de precio',
                        price : 'Importe',
                    },
                    templates: {
                        number : row_number,
                    },
                    columnsClasses: {
                        number : 'text-center col-md-1',
                        pricelist_name : 'text-left col-md-5',
                        price : 'col-md-6 text-left',
                    },
                    editableColumns:['price'],
                } 
            }
        },

        methods : {
            input(w){
                console.log(w);
                console.log('INPUT');
            },
            async price_update(row){
                this.loading = true;
                console.log(row);
                let payload = {
                    token : this.User.token,
                    pricelist_id : row.row.pricelist_id,
                    product_id : row.row.product_id,
                    new_val : row.newVal
                }

                let price_update = await this.$store.dispatch('updatePriceProductOnPriceList', payload);
                
                this.loading = false;

                console.log('PRICE UPDATE');
            }
        },

        computed : {
            ...mapGetters([
                'GetPriceListsOfAProduct'
            ])
        },

        watch : {
            GetPriceListsOfAProduct(n)
            {
                console.log('watc');
                this.rows = n
            }
        },
        
    }
</script>

<style lang="scss" scoped>

</style>