<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            :value="products.product.buying_mode" 
            @input="updateBuyingModeValueAction" 
            track-by="name" label="name"
            :options="buying_mode.modes">
        </multiselect>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
import Multiselect from 'vue-multiselect'
export default {
    props : ['name'],
    components: {
        Multiselect
    },
    data() {
        return {
                       

        }
    },
    methods : {
         ...mapActions(['updateBuyingModeValueAction'])
    },
    computed : {
         ...mapState(['products', 'buying_mode'])
    },
    mounted(){
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

