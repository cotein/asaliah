<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            :value="products.product.iva" 
            @input="updateIvaValueAction" 
            track-by="name" label="name"
            :options="ivas.ivas">
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
         ...mapActions(['updateIvaValueAction'])
    },
    computed : {
         ...mapState(['products', 'ivas'])
    },
    mounted(){
        this.$store.dispatch('fetchIvas');
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

