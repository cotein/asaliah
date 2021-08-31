<template>
    <tr>
        <td class="col-md-1 text-center">{{number + 1}}</td>
        <td class="col-md-4">
            <multiselect placeholder="Buscar comprobante" 
                id="invoice_search"
                track-by="name" label="name"
                :loading="show_spinner"
                v-model="invoice"
                :options="invoices"
                :searchable="true"
                :internal-search="false" 
                :clear-on-select="true" 
                @search-change="asyncFind"
                @select="selectedInvoice"
                @remove="removedInvoice"
                selectLabel="Comprobante"
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
        </td>
        <td class="col-md- text-center">
            {{ (invoice) ? $time(invoice.date, "YYYYMMDD").format("DD-MM-YYYY") : ''}}
        </td>
        <td class="col-md-2 text-right">
            {{(invoice) ? invoice.total : ''}}
        </td>
        <td class="col-md-2 text-right">
            {{(invoice) ? 0 : ''}}
        </td>
        <td class="col-md-1 text-center">
            <button 
                @click="removedInvoice"
                v-tooltip="'Quitar comprobante'"
                class="btn btn-outline-danger btn-icon sq-32"
                :disabled="! CanRemoveInvoice"
                >
                <span class="icon icon-trash"></span>
            </button>
        </td>
    </tr>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Multiselect from 'vue-multiselect';
    export default {
        props : ['number'],
        components : {Multiselect},
        data(){
            return{
                show_spinner : false,
                spinner : false,
                invoices : [],
                invoice : null
            }
        },

        methods : {

            async asyncFind (query)
            {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
            
                let invoice = await axios.post('/api/sale_invoice/by_customer_with_debt', {
                    customer : this.GetCustomerFromCustomerRecibo,
                    query : query
                })

                this.invoices = invoice.data;
            },
            
            async selectedInvoice(el)
            {
                if (this.invoice != null) {
                    let payload = {
                        token : this.User.token,
                        invoice_id : this.invoice.id 
                    }  
                    
                    await this.$store.dispatch('isSearching', payload);
                }

                let data = {
                    id : el.id,
                    total_raw : el.total_raw,
                    cbte_tipo : el.cbte_tipo,
                    index : this.number
                }
                this.$store.commit('CUSTOMER_RECIBO_ADD_DATA_TO_INVOICE', data);
                
                let payload = {
                    token : this.User.token,
                    invoice_id : el.id 
                }    

                await this.$store.dispatch('isSearching', payload);
            },

            async removedInvoice(el)
            {
                console.log('remover factura');
                let payload = {
                    token : this.User.token,
                    invoice_id : el.id 
                }    

                await this.$store.dispatch('isSearching', payload);

                this.$store.commit('CUSTOMER_RECIBO_REMOVE_INVOICE', this.number);
            }
        },

        computed : {
            ...mapGetters(
                [
                    'GetCustomerFromCustomerRecibo',
                    'CanRemoveInvoice',
                ]
            ),

            
        }
        
    }
</script>

<style lang="scss" scoped>

</style>