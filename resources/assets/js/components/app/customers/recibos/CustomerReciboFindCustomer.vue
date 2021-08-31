<template>
    <div >
        <multiselect placeholder="Buscar Cliente - NOMBRE / DNI / CUIT / CUIL" 
            id="findCustomer"
            track-by="name" label="name"
            :loading="show_spinner"
            v-model="customer"
            :options="customers"
            :searchable="true"
            :internal-search="false" 
            :clear-on-select="true" 
            @search-change="asyncFind"
            @select="selectedCustomer"
            selectLabel="Seleccionar cliente"
            selectedLabel="Seleccionado"
            deselectLabel="Quitar"
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
            customer : null,
            customers : []
        }
    },

    methods : {

        async asyncFind (query) {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
            
            let customer = await axios.post('/api/customer/find_customer_by_name', 
                {
                    customer : query
                })

            this.customers = customer.data;
        },

        selectedCustomer(el)
        {
            this.$store.commit('CUSTOMER_RECIBO_SET_CUSTOMER', el);
        },

        mounted() {
            
        },
    },
}
</script>
