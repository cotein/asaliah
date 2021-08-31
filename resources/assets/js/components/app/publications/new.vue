<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <form action="" class="form" >
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form-control-1">Producto</label>
                            <multiselect 
                                v-model="value" 
                                placeholder="Producto a publicar" 
                                :hide-selected="true"
                                label="name" track-by="name" 
                                :options="$store.state.products.list_products" 
                                @select="selectedProduct"
                                :show-labels="false">
                            </multiselect>
                        </div>
                    </div>
                    <div v-if="ProductToPublish.variation">
                        <product_info :product="ProductToPublish"></product_info>
                    </div>
                </form>
            </div>
            
            <!-- <button class="btn btn-danger" @click.prevent="publish()" >
                Publicar Producto
            </button> -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="divider">
                    <div class="divider-content">Variaciones</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div v-if="ProductToPublish.variation">
                    <variation_list :variations="ProductToPublish"></variation_list>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SlideUpDown from 'vue-slide-up-down'
import Multiselect from 'vue-multiselect';
import collect from 'collect.js';
import {mapGetters} from 'vuex';
import product_info from './../products/display/mini-info';
import variation_list from './../variations/variation_list';
/* import busVue from './../../../extras/eventBus';
import row_number from './partials/row-number';
import pictures_product from './partials/pictures-product';
import product_offert from './partials/product-offert';
import publish_on_meli from './partials/publish-on-meli';
import publish_on_here from './partials/publish-on-here'; */
export default {
    props : ['token'],
    components: {
        Multiselect, SlideUpDown, product_info, variation_list
    },
    data() {
        return {
            value : null,
            show_table : false,
        }
    },
    methods : {
        getProducts(){
            this.$store.dispatch('fetchProducts', this.token);
        },

        selectedProduct(product){
            let $vm = this;
            let rows = collect($vm.rows);
            
            this.show_table = true; 

            this.$store.commit('DELETE_PRODUCT');
            //Vue.set($vm.rows, rows.count(), product);
            setTimeout(() => {
                this.$store.commit('SET_PRODUCT', product);    
            }, 150);
            
        },

        /* publish(){
            let $vm = this;

            setTimeout(() => {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + $vm.token;
                axios.post('/api/publication/publish', {'product' : ProductToPublish})
                .then((result) => {
                    console.info(result)
                }).catch((err) => {
                    console.error(err);
                });
            }, 2000);
        }, */
    },
    computed : {
        ...mapGetters([
            'ProductToPublish'
        ])
    },
    mounted(){
        this.getProducts();

        setTimeout(() => {
            this.$store.commit('ADD_AUTH_USER', this.token);
        }, 150);
    }
}
</script>

