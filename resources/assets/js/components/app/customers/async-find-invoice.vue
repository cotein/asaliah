<template>
    <div >
        <multiselect placeholder="Buscar Comprobante de venta" 
            id="ajax"
            track-by="name_and_import" label="name_and_import"
            :loading="show_spinner"
            v-model="selectedInvoice"
            :options="invoices"
            :searchable="true"
            :internal-search="false" 
            :clear-on-select="true" 
            @search-change="asyncFind"
            @select="selectInvoice"
            @remove="removeInvoice"
            selectLabel="Seleccionar comprobante"
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
            invoices : [],
            selectedInvoice : null
        }
    },

    methods : {

        asyncFind (query) {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
            
            axios.post('/api/sale_invoice/by_customer', {
                customer : this.ExistCustomer,
                query : query
            }).then((result) => {
                this.invoices = result.data;
            }).catch((err) => {
                console.log(err);
            });
        },

        selectInvoice(el){
            let data = {
                index : this.index,
                id : el.id,
                cbte_tipo : el.cbte_tipo,
                pto_vta : el.pto_vta,
                nro : el.nro,
                cuit : el.cuit,
                cbte_fch : el.cbte_fch,
                name_and_import : el.name_and_import,
                name : el.name,
                total : el.total,
                total_raw : el.total_raw,
                neto : el.neto,
                iva : el.iva,
                items : el.items,
                percep_iibb : el.percep_iibb,
                percentage_percep_iibb : el.percentage_percep_iibb,
            }

            this.$store.commit('SET_INVOICE_DATA', data);
        },

        removeInvoice(el)
        {
            this.$store.commit('DELETE_INVOICE', this.index);
            this.$store.commit('DELETE_CBTE_ASOC', this.index);
        }


    },

    computed : {
        ...mapGetters([
            'ExistCustomer',
        ]),
    },

    mounted() {
    }
}
</script>
