<template>
    <div class="tt-item">
        <a href="#">
            <div class="tt-item-img">
                <img :src="Image" alt="Image" class="cart-list-thumbnail">
            </div>
            <div class="tt-item-descriptions">
                <h2 class="tt-title">{{Title}}</h2>
                <ul class="tt-add-info">
                    <li>Yellow, Material 2, Size 58,</li>
                    <li>Vendor: Addidas</li>
                </ul>
                <div class="tt-quantity">{{Quantity}} X</div> <div class="tt-price">{{Price}}</div>
            </div>
        </a>
        <div class="tt-item-close">
            <a @click.prevent="delete_product()" href="#" class="tt-btn-close"></a>
        </div>
    </div>
</template>
<script>
export default {
    props : ['product'],
    data() {
        return {
            
        }
    },

    methods: {
        delete_product(){
            this.$store.commit('DELETE_PRODUCT_CART', this.product);
        }
    },

    computed : {

        Image(){
            if (this.product) {
                return this.product.item.pictures[0].secure_url;
            }
            return;
        },

        Title(){
            if (this.product) {
                return this.product.item.title;
            }
            return;
        },

        Quantity(){
             if (this.product) {
                return this.product.quantity;
            }
            return;
        },

        Price(){
             if (this.product) {
                return this.product.item.price;
            }
            return;
        }
    },

    mounted() {
         
    },
    
}
</script>