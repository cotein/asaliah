<template>
    <div class="tt-row-custom-01">
        <div class="col-item">
            <div class="tt-input-counter style-01">
                <span @click="decrement" class="minus-btn"></span>
                <input type="text" v-model="quantity" size="5">
                <span @click="increment" class="plus-btn"></span>
            </div>
        </div>
        <div class="col-item">
            <button 
            @click="add_product_to_cart"
                class="btn btn-lg"
                :disabled="Disabled"
            >
                <i class="icon-f-39" ></i>AGREGAR AL CARRO
            </button>
        </div>
    </div>
</template>
<script>
import collect from 'collect.js';
import {mapMutations} from 'vuex';
import {Event} from 'vue-tables-2';
export default {
    props : ['product'],
    data() {
        return {
            disabled : true,
            attributes : [],
            quantity : 1
        }
    },

    computed : {
        Disabled(){
            return this.disabled
        }
    }, 

    methods: {
        add_product_to_cart(){
            let product = {
                item : this.product,
                attributes : this.attributes,
                quantity : this.quantity
            }

            this.$store.commit('ADD_PRODUCT_TO_CART', product)
        },

        increment(){
            this.quantity++;
        },

        decrement(){
            if (this.quantity < 0) {
                this.quantity = 0;
            }
            this.quantity--
        }
    },

    mounted() {
        
        Event.$on('i_am_ready', (attr) => {

            const attributes = collect(this.attributes);
            
            if ( ! (attributes.contains(attr.id))) {
                
                this.attributes.push(attr);

            }

            const product_attributes = collect(this.product.variations[0].attribute_combinations);

            if (attributes.count() == product_attributes.count()) {
                this.disabled = false;
            }else{
                 this.disabled = true;
            }

        });

        Event.$on('delete_attribute', attr => {

            const index = this.attributes.indexOf(attr);

            if (index > -1) {
                
                this.attributes.splice(index, 1);

            }

        });

        Event.$on('empty_attributes', () =>{
            this.attributes = [];
            this.disabled = false;
        })

    },
}
</script>