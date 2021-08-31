<template>
        <div class="product">
            <div class="product-images">
                <div class="flexslider">
                    <div class="flex-viewport" style="position: relative;">
                        <ul class="slides">
                            <li class="clone" style="width: 482px; margin-right: 0px; float: left; display: block;">
                                <img v-if="product.pics[0].secure_url" :src="product.pics[0].secure_url" :alt="product.name">
                                <img v-else :src="product.pics[0]" :alt="product.name">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-details">
                <h1 class="product-name">{{product.name}}</h1>
                <div class="product-divider"></div>
                <div class="product-price">
                    <span class="product-price-current">Precio de Venta {{product.price}} + IVA {{product.iva.name}}</span>
                </div>
                <div class="product-description">
                    <p>{{product.description}}</p>
                </div>
                <div class="product-sku">
                    <strong>SKU:</strong> {{product.seller_custom_field}}
                </div>
            </div>
        </div>
</template>

<script>
import collect from 'collect.js';
export default {
    props : ['product'],
}
</script>

<style>

</style>
