<template>
    <div class="center--vertical">
        <multiselect placeholder="Buscar producto" 
            id="ajax"
            track-by="name" label="name"
            :loading="show_spinner"
            v-model="selectedProduct"
            :options="products"
            :searchable="true"
            :internal-search="false" 
            :clear-on-select="false" 
            @search-change="asyncFind"
            @select="selectProduct"
            >
            <span slot="noOptions">
                    Lista Vacía
            </span>
            <span slot="noResult">
                    La búsqueda no arrojó resultados
            </span>
        </multiselect>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import auth from './../../../mixins/auth';
export default {
    props : ['index'],
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            show_spinner : false,
            products : [],
            selectedProduct : null
        }
    },

    methods : {
        asyncFind (query) {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

            axios.post('/api/products/find_by_name', {
                product_name : query
            }).then((result) => {
                this.products = result.data;
            }).catch((err) => {
                
            });
        },

        selectProduct(el){
            console.log('SET_PRODUCT_PRICE_LISTS');
            console.log(el);
            this.$store.commit('SET_PRODUCT_PRICE_LISTS', 
            {
                index : this.index, 
                product_id : el.id,
                product_name : el.name,
                price_list : el.price_list
            });


            this.$store.commit('SET_QUANTITY', 
            {
                index : this.index , 
                quantity : 1
            });

            this.$store.commit('SET_SALE_PRICE', 
            {
                index : this.index , 
                sale_price : el.sale_price
            });

            this.$store.commit('SET_PRODUCT_NAME', 
            {
                index : this.index , 
                product_name : el.name
            });

            /* this.$store.commit('SET_PRODUCT_PRICE_LIST', 
            {
                index : this.index , 
                price_list : el.price_list
            }); */

        }
    },

    mounted() {
        
        Event.$on('delete_selected_product', () => {
            this.selectedProduct = null;
        })
    },

}
</script>
<style  scoped>
    .center--vertical {
        vertical-align: middle;
    }
</style>