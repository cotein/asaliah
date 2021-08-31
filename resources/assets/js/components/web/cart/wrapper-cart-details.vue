<template>
    <div id="tt-pageContent" v-if="Products.length > 0">
        <cart_details :products="Products"></cart_details>
    </div>
    <div id="tt-pageContent" v-else>
        <empty_cart></empty_cart>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import empty_cart from './empty_cart';
import cart_details from './cart-details';
export default {
    components : {
        cart_details, empty_cart
    },
    data() {
        return {
            
        }
    },

    computed : {
        ...mapGetters(['Products'])
    }
}
</script>