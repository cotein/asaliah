<template>
    <tbody>
        <tr >
            <td rowspan="3" class="text-center center--vertical">{{number + 1}}</td>
            <td colspan="3">
                <div class="col-md-12">
                    <PedidoAsyncFindProduct :index="number" />
                </div>
                <div class="col-md-6">
                    <small>LISTA DE PRECIO</small>
                    <PedidoPriceLists :index="number" />
                </div>
                <div class="col-md-6">
                    <small>IVA</small>
                    <multiselect placeholder="Iva" 
                        id="iva"
                        track-by="name" label="name"
                        v-model="selecIva"
                        :options="GetIvas"
                        :searchable="false"
                        :internal-search="false" 
                        :clear-on-select="false" 
                        @select="selectedIva"
                        >
                        
                    </multiselect>
                </div>
            </td>
            
            
        </tr>
        <tr>
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width:17%" class="text-center">
                            <small>P.Unitario</small>
                            <vue-autonumeric 
                                class="form-control text-right"
                                v-model="unit_price"
                                :options="money_options"
                                @input="set_unit_price"
                            ></vue-autonumeric>
                        </td>
                        <td style="width:15%" class="text-center">
                            <small>Cantidad</small>
                            <input  class="form-control" type="number" value="1" v-model="quantity">
                        </td>
                        <td style="width:30%" class="text-center">
                            <small>Iva Importe</small>
                            <p>{{Iva | currency}}</p>
                        </td>
                        <td style="width:16%" class="text-center">
                            <small>Descuento %</small>
                            <input  
                                class="form-control" 
                                type="number" value="0" v-model="discount"
                                @input="set_discount"
                                >
                        </td>
                        <td style="width:25%" class="text-center">
                            <small>Desc. Importe</small>
                            <p>{{DiscountImport | currency}}</p> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </tr>
        <tr>
            <td  class="text-center center--vertical col-md-6">
                <small><strong>TOTAL</strong></small>
               <vue-autonumeric 
                    class="form-control text-right vue__autonumeric__input"
                    v-model="total"
                    :options="money_options"
                    @input="set_total"
                ></vue-autonumeric>
            </td>
            
            <td colspan="2" class="text-center center--vertical col-md-6">
                <button 
                    @click="deleteProduct()"
                    :disabled="(! ProductsCount) ? true : false"
                    class="btn btn-outline-danger btn-icon sq-32">
                    <span class="icon icon-trash"></span>
                </button>
            </td>
        </tr>
    </tbody>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import auth from './../../../mixins/auth';
import Multiselect from 'vue-multiselect';
import PedidoPriceLists from './PedidoPriceLists';
import PedidoAsyncFindProduct from './PedidoAsyncFindProduct';
import async_find_product_multiselect from './../customers/async-find-product-multiselect';
import VueAutonumeric from './../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';

export default {
    name : 'PedidosRow',
    props : ['number'],
    components : {
        PedidoAsyncFindProduct, PedidoPriceLists, Multiselect, VueAutonumeric
    },
    data() {
        return {
            unit_price_pass : false,
            total_pass : false,
            discount_pass : false,
            selecIva : {
                code : 5,
                id : 6,
                name : "21%"
            },
            money_options : {
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
            int_options : {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                decimalPlaces : '0',
                roundingMethod: 'U',
                minimumValue: '1',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
            percentage_options : {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                decimalPlaces : '0',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
            
        }
    },
    mixins : [auth],    

    methods : {
       
        set_unit_price()
        {
            this.unit_price_pass = true;
            this.total_pass = false;
            this.discount_pass = false;
        },

        set_total()
        {
            this.unit_price_pass = false;
            this.total_pass = true;
            this.discount_pass = false;
        },

        set_discount()
        {
            this.discount_pass = true;
            this.unit_price_pass = false;
            this.total_pass = false;
        },
        
        deleteProduct(){
            this.$store.commit('DELETE_PEDIDO_CLIENTE', this.number);
        },

        selectedIva(e){
            this.$store.commit('SET_IVA_TO_PRODUCT', {
                index : this.number,
                iva : e
            });
        },
        
    },

    computed : {

        ...mapGetters(
            [
                'GetIvas',
                'ProductsCount',
                'GetProductsFromPedidos'
            ]
        ),

        unit_price :
        {
            get()
            {
                return this.$store.state.pedidos_clientes.pedido.products[this.number].unit_price;
            },

            set(value)
            {
                if (this.unit_price_pass) {
                    this.$store.commit('SET_UNIT_PRICE_PRODUCT', {index:this.number, unit_price : value});
                    this.$store.commit('UPDATE_PRICE_FROM_UNIT_PRICE', this.number);
                }
            }
        },

        total : 
        {
            get()
            {
                return this.$store.state.pedidos_clientes.pedido.products[this.number].total;
            },

            set(value)
            {
                if (this.total_pass) {
                    this.$store.commit('SET_TOTAL_PRODUCT', {index:this.number, total : value});
                    this.$store.commit('UPDATE_PRICE_FROM_TOTAL', this.number);
                }
            }
        },

        quantity :
        {
            get()
            {
                return this.$store.state.pedidos_clientes.pedido.products[this.number].quantity;
            },
            
            set(value)
            {
                this.$store.commit('SET_QUANTITY_TO_PRODUCT', {index:this.number, quantity : value});
            }
        },

        discount :
        {
            get()
            {
                
                return this.$store.state.pedidos_clientes.pedido.products[this.number].discount_percentage;
            },
            
            set(value)
            {
                this.$store.commit('SET_DISCOUNT_TO_PRODUCT', {index:this.number, discount_percentage : value});
                //this.$store.commit('UPDATE_PRICE_FROM_DISCOUNT_PERCENTAGE', this.number);
            }
        },

        DiscountImport()
        {
            return this.$store.state.pedidos_clientes.pedido.products[this.number].discount_import;
        },

        Iva()
        {
            return this.$store.state.pedidos_clientes.pedido.products[this.number].iva_import;
        },

        /* Total(){
            let product = collect(this.$store.state.pedidos_clientes.pedido.products[this.number]);
            
            let total =  this.$store.state.pedidos_clientes.pedido.products[this.number].neto_import + this.$store.state.pedidos_clientes.pedido.products[this.number].iva_import;

            return total.toFixed(2);
        }, */

        


    }
}
</script>
<style  scoped>
    .center--vertical {
        vertical-align: middle;
    }
    .vue__autonumeric__input {
        font-size: 18px;
    }
    .multiselect .multiselect__select .multiselect__tags .multiselect__input
    {
    font-size:5px;
    }
</style>