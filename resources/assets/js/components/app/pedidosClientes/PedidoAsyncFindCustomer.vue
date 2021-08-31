<template>
    <div >
        <label for="">BUSCAR CLIENTE </label>
        <multiselect placeholder="Buscar Cliente - NOMBRE / DNI / CUIT / CUIL" 
            id="findCustomer"
            track-by="name" label="name"
            :loading="show_spinner_multiselect"
            v-model="customer"
            :options="customers"
            :searchable="true"
            :internal-search="false" 
            :clear-on-select="true" 
            @search-change="asyncFind"
            @select="selected_Customer"
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
import auth from './../../../mixins/auth';
import async_find_customer from './../../../mixins/asyc-find-customer';
export default {
    props : ['index'],
    components : {
        Multiselect
    },
    mixins : [auth, async_find_customer],
    data() {
        return {
            invoices : [],
        }
    },

    methods : {

        async selected_Customer(el)
        {
            console.log(el);
            let payload = {
                token : this.User.token,
                customer_id : el.id
            }
            let customer = await this.$store.dispatch('getCustomerById', payload);
            this.$store.commit('SET_CUSTOMER_ON_PEDIDO', customer.data);
            this.$store.commit('SET_CUSTOMER_ADDRESSES', []);
            if (customer.data.addresses) {
                this.$store.commit('SET_CUSTOMER_ADDRESSES', customer.data.addresses);
            }
        }
    },

    mounted() {
        Event.$on('clean_async_customers', () => {
            this.customers = [];
            this.customer = null;
        })
    },
}
</script>
