<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            v-model="brand" 
            @select="selectBrand()"
            track-by="name" label="name"
            :loading="LoadingBrands"
            :options="GetBrands">
        </multiselect>
    </div>
</template>

<script>
import busVue from './../../../../extras/eventBus';
import { mapFields } from 'vuex-map-fields';
import {mapActions, mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect'
export default {
    props : ['name'],
    components: {
        Multiselect
    },
    data() {
        return {
            brand : null,
        }
    },
    methods : {
        selectBrand(brand){
            this.brand = brand;

            setTimeout(() => {
                this.$store.commit('ADD_PRODUCT_BRAND', this.brand);
            }, 1000);
        },
    },
    computed : {
        ...mapGetters([
            'GetBrands', 'LoadingBrands'
        ]),
    },
    mounted(){
        let $vm = this;
        busVue.$on('clean_brand_multiselect', ()=>{
            setTimeout(() => {
                $vm.brand = null
            }, 10 );
        })
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

