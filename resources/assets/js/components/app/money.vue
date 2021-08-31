<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            :value="products.product.money" 
            @input="updateMoneyValueAction" 
            track-by="name" label="name"
            :options="GetMoneys">
        </multiselect>
    </div>
</template>

<script>
import {mapActions, mapState, mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
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
         ...mapActions(['updateMoneyValueAction'])
    },
    computed : {
         ...mapState(['products', 'money']),

         ...mapGetters([
             'GetMoneys'
         ])


    },
    async mounted(){
        let money = await this.$store.dispatch('fetchMoney');
        
        this.$store.commit('ADD_MONEYS', money.data);


    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

