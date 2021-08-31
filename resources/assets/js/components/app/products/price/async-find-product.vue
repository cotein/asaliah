<template>
    <div >
        <multiselect placeholder="Buscar Artículo" 
            id="ajax"
            track-by="name" label="name"
            :loading="show_spinner"
            v-model="product"
            :options="ListProducts"
            :searchable="true"
            :internal-search="false" 
            :clear-on-select="true" 
            @search-change="asyncFind"
            @select="getPriceListsOfAProduct"
            selectLabel="Seleccionar artículo"
            selectedLabel="Seleccionado"
            deselectLabel="Remover"
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
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
export default {
    props : ['index'],
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            show_spinner : false,
            invoices : [],
            product : null
        }
    },

    methods : {

        asyncFind (query) {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
            
            axios.post('/api/products/find_by_name', {
                product_name : query
            }).then((result) => {
                console.log('SET_LIST_PRODUCTS');
                this.$store.commit('SET_LIST_PRODUCTS', result.data);          
            }).catch((err) => {
                console.log(err);
            });
        },

        async getPriceListsOfAProduct(el)
        {
            let payload = {
                token : this.User.token,
                product_id : el.id
            }

            this.$store.dispatch('getPriceListsOfAProduct', payload);
        }



    },

    computed : {
        ...mapGetters([
            'ListProducts'
        ]),
    },

    mounted() {
    }
}
</script>
