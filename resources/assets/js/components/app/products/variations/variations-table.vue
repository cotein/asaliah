<template>
    <div class="row">
        <div class="col-md-12">
            <h4>Variaciones del Producto</h4>
            <div class="cart">
                <ul class="cart-list">
                    <fade-transition :duration="700" group>
                        <li class="cart-list-item" is="variations_row" :row="index" :variation="v" v-for="(v, index) in Variations" :key="index">
                        </li>
                    </fade-transition>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState, mapGetters} from 'vuex';
import variations_row from "./variations-row";
export default {
    components:{
        variations_row
    },
    computed: {
        ...mapState(['variations', 'products']),

        ...mapGetters(['GetVariations']),
        
        Variations(){
            return this.GetVariations
        }
    },
}
</script>

<style>

</style>
