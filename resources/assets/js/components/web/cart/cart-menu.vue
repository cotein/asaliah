<template>
    <div class="tt-desctop-parent-cart tt-parent-box">
        <div class="tt-cart tt-dropdown-obj" data-tooltip="Cart" data-tposition="bottom">
            <button class="tt-dropdown-toggle">
                <i class="icon-f-39"></i>
                <span class="tt-badge-cart">{{TotalQuantity}}</span>
            </button>
            <div class="tt-dropdown-menu">
                <div class="tt-mobile-add">
                    <h6 class="tt-title">SHOPPING CART</h6>
                    <button class="tt-close">Close</button>
                </div>
                <div class="tt-dropdown-inner">
                    <div class="tt-cart-layout">
                        <!-- layout emty cart -->
                        <!-- <a href="empty-cart.html" class="tt-cart-empty">
                            <i class="icon-f-39"></i>
                            <p>No Products in the Cart</p>
                        </a> -->
                        <div class="tt-cart-content" v-if="Products.length > 0">
                            <div class="tt-cart-list">
                                <cart_product v-for="(item, index) in Products.slice(0,2)" :key="index" :product="item"></cart_product>
                                
                            </div>
                            <div class="tt-cart-total-row">
                                <div class="tt-cart-total-title">SUBTOTAL:</div>
                                <div class="tt-cart-total-price">{{ Total | currency}}</div>
                            </div>
                            <div class="tt-cart-btn">
                                <!-- <div class="tt-item">
                                    <a href="#" class="btn">FINALIZAR COMPRA</a>
                                </div> -->
                                <div class="tt-item">
                                    <a href="/carro_de_compras" class="btn-link-02 tt-hidden-mobile">Ver Carrito de compras</a>
                                    <!-- <a href="shopping_cart_02.html" class="btn btn-border tt-hidden-desctope">VIEW CART</a> -->
                                </div>
                            </div>
                        </div>
                        <div v-else class="tt-cart-empty">
                            <div class="text-center">CARRO DE COMPRAS VACIO</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
const ZERO = 0;
import {mapGetters} from 'vuex';
import { collect } from 'collect.js';
import cart_product from './cart-product';
import currency from './../../../mixins/currency';
export default {
    components : {
        cart_product
    },
    mixins : [currency],
    data() {
        return {
            
        }
    },

    computed : {

        ...mapGetters(['TotalQuantity', 'Products']),

        Total(){
            if (this.Products.length > 0) {
                
                let products = collect(this.Products);

                return products.map(i => {

                    return i.quantity * this.CurrencyToNumber(i.item.price);

                }).sum()
            }

            return ZERO;
        }

    }
}
</script>