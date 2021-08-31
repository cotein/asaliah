<template>
    <div>
        <label  >Cliente</label>
        <div id="multiselect">
            <multiselect 
                placeholder="Buscar por Nombre - DNI - CUIT" 
                id="ajax"
                track-by="name" label="name"
                :loading="spinner"
                :options="CustomersListGetter"
                :searchable="true"
                :internal-search="false" 
                :clear-on-select="true" 
                :value="CustomerValue"
                @input="setCustomerValue"
                @search-change="searchCustomer"
                selectLabel="Seleccionar cliente"
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
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
    export default {

        components: { Multiselect },

        data(){
            return {
                spinner : false,
                search : "",
                date : null,
            }
        },

        computed : {

            ...mapGetters([
                'CustomersListGetter',
                'CustomerValue'
            ]),

            IsNumeric()
            {
                if (isNaN(this.search) || this.search == "") {
                    return true;
                }

                return false;
            }
        },

        methods : {
            
            async searchCustomer (query) {
            
                this.spinner = true;

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                
                let customer = await axios.post('/api/customer/search_customer', 
                    {
                        customer : query
                    }).catch((err) => {
                      console.log('wewewew ', err);  
                    }).finally(() => {
                        console.log(query);
                        this.spinner = false;
                    })

                this.$store.commit('SET_CUSTOMER_LIST', customer.data);
            },

            setCustomerValue(el)
            {
                this.$store.commit('NEW_ORDER_SET_CUSTOMER', el);
            },

        }
    }
</script>
<style scoped>
    div#multiselect {
        width: 40rem;
    }
</style>