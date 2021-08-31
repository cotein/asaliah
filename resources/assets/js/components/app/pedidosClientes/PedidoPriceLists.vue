<template>
    <div >
        <multiselect placeholder="Lista de precio" 
            id="pricelist"
            track-by="name" label="name"
            :options="GetProductsFromPedidos[index].price_list"
            @select="selectedPriceList"
            selectLabel="Seleccionar"
            selectedLabel="Seleccionado"
            deselectLabel="Quitar"
            v-model="price_list"
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
import auth from './../../../mixins/auth';
export default {
    props : ['index'],
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            price_list : null,
            show_spinner : false,
        }
    },

    methods : {

        selectedPriceList(el)
        {
            let payload = {
                index : this.index,
                pricelist_id : el.pricelist_id,
                pricelist_name : el.name,
                unit_price : el.price_raw, 
            }

            this.$store.commit('SET_PRICE_AND_PRICELIST', payload);

            //this.$store.commit('SET_SALE_PRICE', payload);
            
        }
    },

    computed : {
        ...mapGetters(
            [
                'GetProductsFromPedidos'
            ]
        )
    },

}
</script>
