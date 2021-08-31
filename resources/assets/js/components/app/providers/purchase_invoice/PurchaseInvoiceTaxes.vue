<template>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right" style="margin-bottom:15px">
                <!-- <button 
                    type="button" 
                    class="btn btn-primary" 
                    >Agregar Impuesto
                </button> -->
               <!--  <button
                    @click="open_add_tax_modal" 
                    type="button" 
                    class="btn btn-success" 
                    >Crear Impuesto
                </button> -->
            </div>
            <strong>Impuestos del comprobante</strong>
            <table class="table table-striped table-bordered" >
                <thead>
                    <tr>
                        <th class="col-md-1 text-center">#</th>
                        <th class="col-md-7 text-center">Impuesto</th>
                        <th class="col-md-3 text-center">Importe</th>
                        <th class="col-md-1 text-center">Borrar</th>
                    </tr>
                </thead>
                <tbody v-for="(row, index) in TaxesGetter" :key="index">
                    <PurchaseInvoiceTaxRow  v-if="row.status" :number="index" :tax="row"/>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../../mixins/auth';
import toast_mixin from './../../../../mixins/toast-mixin';
import PurchaseInvoiceTaxRow from './PurchaseInvoiceTaxRow';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    
    mixins : [auth, toast_mixin],
    
    components : {
        PurchaseInvoiceTaxRow, VueAutonumeric
    },

    data()
    {
        return {
            spinner : false,
            money_options : {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbol: '$ ',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
        }
    },

    computed : {
        ...mapGetters(
            [
                'PurchaseInvoicePercepIIBB',
                'PurchaseInvoicePercepIVA',
                'SelectedProviderGetter',
                'PurchaseInvoiceIsOk',
                'TaxesGetter'
            ]
        ),

        percep_iibb : {
            get()
            {
                return this.PurchaseInvoicePercepIIBB;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_PERCEP_IIBB', value)
            }
        },

        percep_iva : {
            get()
            {
                return this.PurchaseInvoicePercepIVA;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_PERCEP_IVA', value)
            }
        }
    },
}
</script>