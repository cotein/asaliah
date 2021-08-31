<template>
    <div class="form form-inline" :class="{'has-error' : PurchaseInvoiceProviderErrorGetter}">
            <label class="control-label">PROVEEDOR: NOMBRE / CUIT</label>
            <multiselect 
                placeholder="Buscar Comprobante de venta" 
                id="ajax"
                track-by="name" label="name"
                :loading="spinner"
                :value="SelectedProviderGetter"
                @input="setSelectedProvider"
                :options="GetProvidersGetters"
                :searchable="true"
                :internal-search="false" 
                :clear-on-select="true" 
                @search-change="asyncFind"
                selectLabel="Seleccionar"
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
       <!--  <div class="col-md-2" style="padding-top:21px">
            <button 
                class="btn btn-primary" 
                type="submit"
                >Buscar Proveedor</button>
        </div> -->
        
        <p class="text-danger" v-if="PurchaseInvoiceProviderErrorGetter">{{PurchaseInvoiceProviderErrorGetter[0]}}</p>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import auth from './../../../mixins/auth';
export default {
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            spinner : false
        }
    },

    methods : {

        ...mapActions([
            'setSelectedProvider'
        ]),

        async asyncFind (query) {
            let payload = {
                token : this.User.token,
                provider : query
            }

            await this.$store.dispatch('provider_find_by_name', payload);
        },
    },

    computed : {

        ...mapGetters([
            'SelectedProviderGetter',
            'GetProvidersGetters',
            'PurchaseInvoiceProviderErrorGetter',
            'GetIvas',
            'Vouchers'
        ])
    },

    watch : {

        SelectedProviderGetter(n)
        {
            this.$store.commit('PURCHASE_INVOICE_SET_INVOICE_TYPE', false);
            
            this.GetIvas.forEach(element => {
                
                element.$isDisabled = false;

                if (element.inscription_id == null) {
                    element.$isDisabled = false;
                } else if (element.inscription_id != n.inscription_id){
                    element.$isDisabled = true;
                } else  {
                    element.$isDisabled = false;
                }
            });

            this.Vouchers.forEach(element => {
                
                element.$isDisabled = false;

                if ( ! (element.inscription_id == n.inscription_id)) {
                    element.$isDisabled = true;
                }
            });
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
