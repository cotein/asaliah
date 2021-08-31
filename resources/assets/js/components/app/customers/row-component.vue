<template>
    <tbody>
        <tr>
            <td rowspan="2" class="text-center center--vertical">{{number + 1}}</td>
            <td>
                <div class="col-md-8">
                    <async_find_product_multiselect :index="number"></async_find_product_multiselect>
                </div>
                <div class="col-md-4">
                    <price_lists :index="number" />
                </div>
            </td>
            <td rowspan="2" class="text-center center--vertical">
                {{ Total | currency}}
            </td>
            
            <td rowspan="2" class="text-center center--vertical">
                <button 
                    @click="deleteProduct()"
                    :disabled="HasOneProduct"
                    class="btn btn-outline-danger btn-icon sq-32">
                    <span class="icon icon-trash"></span>
                </button>
            </td>
        </tr>
        <tr>
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width:17%" class="text-center">
                            <small>P.Uni.</small>
                            <p>{{sale_price | currency}}</p>
                        </td>
                        <td style="width:13%" class="text-center">
                            <small>Cant.</small>
                            <input  class="form-control" type="number" value="1" v-model="quantity">
                        </td>
                        <td style="width:12%" class="text-center">
                            <small>IVA</small>
                            <div>
                                <select  v-model="iva">
                                    <option v-for="iva in GetIvas" :key="iva.id" :value="iva.percentage">{{iva.name}}</option>
                                </select>
                            </div>
                        </td>
                        <td style="width:25%" class="text-center">
                            <small>Iva Imp.</small>
                            <p>{{iva_import | currency}}</p>
                        </td>
                        <td style="width:13%" class="text-center">
                            <small>Desc.%</small>
                            <input  class="form-control" type="number" value="0" v-model="discount">
                        </td>
                        <td style="width:20%" class="text-center">
                            <small>Desc. Imp.</small>
                            <p>{{discount_import | currency}}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </tr>
    </tbody>
</template>

<script>
import {mapGetters} from 'vuex';
import price_lists from './price_lists';
import auth from './../../../mixins/auth';
import async_find_product_multiselect from './async-find-product-multiselect';

export default {
    name : 'factura',
    props : ['number'],
    components : {
        async_find_product_multiselect, price_lists
    },
    mixins : [auth],

    methods : {
        deleteProduct(){
            this.$store.commit('DELETE_PRODUCT_TO_INVOICE', this.number);
        },

        selectedIva(e){
            this.$store.commit('SET_IVA_TO_INVOICE', {
                index : this.number,
                iva : e.target.value
            });
        }
        
    },

    computed : {

        ...mapGetters([
            'Vouchers',
            'GetIvas',
            'GetProductsFromInvoice',
            'HasOneProduct'
        ]),

        Total(){
            let row = this.$store.state.customers.sale.products[this.number];

            if (row.sale_price != '' && row.quantity != '' && row.iva != '') {
                
                if (row.discount > 0) {
                    return ((row.sale_price - (row.sale_price * row.discount / 100)) * row.quantity) + (((row.sale_price - (row.sale_price * row.discount / 100)) * row.quantity) * row.iva / 100);
                }

                return (row.sale_price * row.quantity) + ((row.sale_price * row.quantity) * row.iva / 100);
            }
            return 0;
        },

        quantity : {
            get(){
                return this.$store.state.customers.sale.products[this.number].quantity;
            },
            set(value){
                this.$store.commit('SET_QUANTITY', {
                    index : this.number,
                    quantity : value
                });
            }
        },

        sale_price : {
            get(){
                return this.$store.state.customers.sale.products[this.number].sale_price;
            },
            set(value){
                /* this.$store.commit('SET_DISCOUNT', {
                    index : this.number,
                    discount : value
                }); */
            }
        },

        discount : {
            get(){
                return this.$store.state.customers.sale.products[this.number].discount;
            },
            set(value){
                this.$store.commit('SET_DISCOUNT', {
                    index : this.number,
                    discount : value
                });
            }
        },

        discount_import : {
            get(){
                return this.$store.state.customers.sale.products[this.number].discount_import;
            },
            set(value){
                this.$store.commit('SET_DISCOUNT_IMPORT', {
                    index : this.number,
                    discount_import : value
                });
            }
        },

        iva : {
            get(){
                return this.$store.state.customers.sale.products[this.number].iva;
            },
            set(value){

                this.$store.commit('SET_IVA_TO_INVOICE', {
                    index : this.number,
                    iva : value
                });
            }
        },

        iva_import : {
            get(){
                return this.$store.state.customers.sale.products[this.number].iva_import;
            },
            set(value){

                this.$store.commit('SET_IVA_IMPORT', {
                    index : this.number,
                    iva_import : value
                });
            }
        },
    },

    watch : {
        Total(n,o){
            this.$store.commit('SET_IMPORTS', {
                index : this.number,
            });
        }
    }
}
</script>
<style  scoped>
    .center--vertical {
    vertical-align: middle;
    }
</style>