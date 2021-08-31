<template>
    <div >
        <label for="">DOMICILIO DE ENTREGA</label>
        <multiselect placeholder="Direcciòn de entrega" 
            id="address"
            track-by="name" label="name"
            :options="(CustomerAddresses)?CustomerAddresses:[]"
            @select="selectedAddress"
            selectLabel="Seleccionar"
            selectedLabel="Seleccionado"
            deselectLabel="Quitar"
            v-model="address"
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
            address : null,
            show_spinner : false,
            invoices : [],
            customer : null,
            customers : []
        }
    },

    methods : {

        selectedAddress(el)
        {
            this.$store.commit('SET_DELIVERY_ADDRESS', el.name);
        }
    },

    computed : {
        ...mapGetters([
            'CustomerAddresses'
        ]),
    },

}
</script>
