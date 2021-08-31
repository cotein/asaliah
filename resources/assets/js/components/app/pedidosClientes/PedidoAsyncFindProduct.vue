<template>
    <div class="center--vertical">
        <multiselect placeholder="Buscar producto" 
            id="ajax"
            track-by="name" 
            label="name"
            :custom-label="customLabel" :show-labels="false"
            :loading="show_spinner"
            v-model="selectedProduct"
            :option-height="104"
            :options="products"
            :searchable="true"
            :internal-search="true" 
            :clear-on-select="false" 
            @search-change="asyncFind"
            @select="selectProduct"
            >
            <template slot="singleLabel" slot-scope="props">
                <img class="option__image" :src="props.option.thumbnail" alt="Sin Imagen">
                <span class="option__desc">
                    <span class="option__title">{{ props.option.name }}</span>
                </span>
            </template>
            <template slot="option" slot-scope="props">
                <img class="option__image" :src="props.option.thumbnail" alt="Sin Imagen">
                <div class="option__desc">
                    <span class="option__title">{{ props.option.name }}</span>
                    <!-- <span class="option__small"> puto</span> -->
                </div>
            </template>
        </multiselect>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
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
        
        customLabel ({ name }) {
            return `${name}`;
        },

        selectProduct(el){

            this.$store.commit('SET_PRODUCT_PRICE_LIST', 
            {
                index : this.index, 
                product_id : el.id,
                product_name : el.name,
                price_list : el.price_list
            });
        },

        removeProduct(el)
        {
            this.$store.commit('DELETE_PEDIDO_CLIENTE', this.index);
        }        
    },

}
</script>
<style  scoped>
    .center--vertical {
        vertical-align: middle;
    }
</style>