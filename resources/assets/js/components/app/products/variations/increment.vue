<template>
    <div>
        <p class="text-center">Cantidad</p>
        <div class="input-group">
            <span class="input-group-btn">
                <button @click="baja()" type="button" class="quantity-left-minus btn" >
                    <span class="icon icon-minus-square"></span>
                </button>
            </span>
            <div type="text" id="quantity" name="quantity" class="form-control text-center" >
                {{count}}
            </div>
            <span class="input-group-btn">
                <button @click="sube()" type="button" class="quantity-right-plus btn">
                    <span class="icon icon-plus-square"></span>
                </button>
            </span>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState, mapMutations, mapGetters} from 'vuex';

export default {
    props : ['row_number'],
    data() {
        return {
            count : 0,
        }
    },
    methods: {
        ...mapActions(['updateQty']),

       sube(){
           this.count++
           this.updateQty({'index' : this.row_number, 'count' : this.count})
           //Vue.set(this.$store.state.products.product.variations, this.row_number, { available_quantity : this.count});
           //this.$store.state.products.product.variations[this.row_number].available_quantity = this.count;
       },
       baja(){
           if (!(this.count == 0)) {
               this.count--
           }
           
           //Vue.set(this.$store.state.products.product.variations, this.row_number, { available_quantity : this.count});
           //this.$store.state.products.product.variations[this.row_number].available_quantity = this.count;
           this.updateQty({'index' : this.row_number, 'count' : this.count})
       }
    },
    computed:{
        ...mapState(['variations']),
    },

    mounted(){
    }
}
</script>

<style>

</style>
