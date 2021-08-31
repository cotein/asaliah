<template>
    <div class="form-group">
        <div class="col-md-5" :class="{'has-error':PurchaseInvoiceTypeErrorGetter}" >
            <label class="control-label">COMPROBANTE</label>
            <multiselect placeholder="Comprobantes" 
                track-by="name" label="name"
                :options="Vouchers"
                :value="PurchaseInvoiceType"
                :loading="spinner"
                @input="purchaseInvoiceSelectInvoiceType"
                :clear-on-select="false" 
                >
                <span slot="noOptions">
                        Lista Vacía
                </span>
                <span slot="noResult">
                        La búsqueda no arrojó resultados
                </span>
            </multiselect>
            <p v-if="PurchaseInvoiceTypeErrorGetter">{{PurchaseInvoiceTypeErrorGetter[0]}}</p>
        </div>
        <div class="col-md-3" :class="{'has-error':PurchaseInvoiceSubsidiaryErrorGetter}">
            <label class="control-label">SUCURSAL</label>
            <vue-autonumeric 
                class="form-control"
                v-model="subsidiary"
                :options=options
            ></vue-autonumeric>
            <p v-if="PurchaseInvoiceSubsidiaryErrorGetter">{{PurchaseInvoiceSubsidiaryErrorGetter[0]}}</p>
        </div>
        <div class="col-md-4" :class="{'has-error':PurchaseInvoiceNumberErrorGetter}">
            <label class="control-label">NUMERO</label>
            <vue-autonumeric 
                class="form-control"
                v-model="number"
                :options=options
            ></vue-autonumeric>
            <p v-if="PurchaseInvoiceNumberErrorGetter">{{PurchaseInvoiceNumberErrorGetter[0]}}</p>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import Multiselect from 'vue-multiselect';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    props : {
        spinner : {
            default : false
        }
    },
    components : {
        Multiselect, VueAutonumeric
    },
    data() {
        return {
            voucher_spinner : true,
            money : null,
            options : {
                leadingZero : 'keep',
                digitGroupSeparator: '',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                decimalPlaces : '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
        }
    },
    methods : {
         ...mapActions(['purchaseInvoiceSelectInvoiceType'])
    }, 

    watch : {

        
    },

    computed : {

        ...mapGetters([
            'Vouchers',
            'PurchaseInvoiceType',
            'PurchaseInvoiceSubsidiary',
            'PurchaseInvoiceNumber',
            'PurchaseInvoiceTypeErrorGetter',
            'PurchaseInvoiceSubsidiaryErrorGetter',
            'PurchaseInvoiceNumberErrorGetter',
            'SelectedProviderGetter'
        ]),

        subsidiary : {
            get()
            {
                return this.PurchaseInvoiceSubsidiary;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_SUBSIDIARY', value);
            }
        },

        number : {
            get()
            {
                return this.PurchaseInvoiceNumber;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_NUMBER', value);
            }
        }

    },
}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>