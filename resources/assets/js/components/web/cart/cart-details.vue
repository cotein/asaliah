<template>
        <div class="container-indent">
            <div class="container">
                <h1 class="tt-title-subpages noborder">CARRO DE COMPRAS</h1>
                <div class="tt-shopcart-table-02">
                    <table>
                        <tbody>
                            <tr v-for="(product, index) in products" :key="index">
                                <td>
                                    <div class="tt-product-img">
                                        <img :src="product.item.pictures[0].secure_url" :alt="product.item.title" class="loaded" data-was-processed="true">
                                    </div>
                                </td>
                                <td>
                                    <h2 class="tt-title">
                                        <a href="#">{{product.item.title}}</a>
                                    </h2>
                                    <ul class="tt-list-description" >
                                        <li v-for="(attr, index) in product.attributes" :key="index">{{(attr.name) ? attr.name : attr.id }} : {{attr.value_name}}</li>
                                    </ul>
                                    <ul class="tt-list-parameters">
                                        <li>
                                            <div class="tt-price">
                                                {{product.item.price}}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detach-quantity-mobile"></div>
                                        </li>
                                        <li>
                                            <div class="tt-price subtotal">
                                                {{product.item.price}}
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="tt-price">
                                        {{product.item.price}}
                                    </div>
                                </td>
                                <td>
                                    <div class="detach-quantity-desctope">
                                        <div class="tt-input-counter style-01">
                                            <span @click="decrement(index)" class="minus-btn"></span>
                                            <input type="text" :value="product.quantity" size="5">
                                            <span @click="increment(index)" class="plus-btn"></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="tt-price subtotal">
                                        {{product.quantity * CurrencyToNumber(product.item.price) | currency}}
                                    </div>
                                </td>
                                <td>
                                    <a @click.prevent="delete_product(index)" href="#" class="tt-btn-close"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tt-shopcart-btn">
                        <div class="col-left">
                            <a class="btn-link" href="/tienda"><i class="icon-e-19"></i>CONTINUAR COMPRANDO</a>
                        </div>
                        <div class="col-right">
                            <a @click.prevent="clear_cart()" class="btn-link" href="#"><i class="icon-h-02"></i>LIMPIAR CARRO DE COMPRAS</a>
                            <!-- <a class="btn-link" href="#"><i class="icon-h-48"></i>UPDATE CART</a> -->
                        </div>
                    </div>
                </div>
                <!-- shipping component -->
                <cart_shipping :products="products"></cart_shipping>
            </div>
        </div>
</template>
<script>
const ZERO = 0;
import collect from 'collect.js';
import {mapGetters} from 'vuex';
import cart_shipping from './cart-shipping';
import currency from './../../../mixins/currency';
import payment_button from './../mercado-pago/payment-button';
export default {
    props : ['products', 'total_price'],
    mixins : [currency],
    components : {
        payment_button, cart_shipping
    },
    data() {
        return {
            
        }
    },

    computed : {

        /* TotalPrice(){
            
            let products = collect(this.products);
            
            return products.map(i => {

                return i.quantity * this.CurrencyToNumber(i.item.price);
                
            }).sum();
        } */
    },

    methods: {
        increment(index){
            this.products[index].quantity++;
        },

        decrement(index){
            if (this.products[index].quantity < 1) {
                this.products[index].quantity = 0;
            }
            this.products[index].quantity--
        },

        clear_cart(){
            this.$store.commit('CLEAR_CART');
        },

        delete_product(index){
            console.log(this.products[index]);
            this.$store.commit('DELETE_PRODUCT_CART', this.products[index]);
        }

        
    },
    
}
</script>
