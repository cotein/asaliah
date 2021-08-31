<template>
    <div class="form-group">
        <label >{{name}}</label>
        <multiselect placeholder="Seleccionar Proveedor" 
            v-model="data.supplier" 
            track-by="name" label="name"
            @select="selectSupplier()"
            :options="GetSuppliers">
        </multiselect>
    </div>
</template>

<script>
import busVue from './../../../../extras/eventBus';
import { mapFields } from 'vuex-map-fields';
import {mapActions, mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
export default {
    props : ['name'],
    components: {
        Multiselect
    },
    data() {
        return {
            data : {
                supplier:null,
                token : null,
            }
        }
    },
    methods : {
        selectSupplier(supplier){
            this.data.supplier = supplier;

            busVue.$emit('clean_brand_multiselect');

            this.$store.commit('UPDATE_LOADING_BRANDS', true);

            setTimeout(() => {
                this.$store.commit('ADD_SUPPLIER', this.data.supplier);

                this.$store.dispatch('getSuppliersBrands', this.data);

                this.$store.commit('UPDATE_LOADING_BRANDS', false);
            }, 2000);

            
        },

        getSuppliers(){
            this.$store.dispatch('getSuppliers', this.data.token)
        }
    },
    computed : {
        ...mapGetters([
            'GetSuppliers', 'UserToken'
        ]),

    },
    mounted(){
        setTimeout(() => {
            this.data.token = this.UserToken,
            setTimeout(() => {
                this.getSuppliers();
            }, 100);
        }, 150);
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

