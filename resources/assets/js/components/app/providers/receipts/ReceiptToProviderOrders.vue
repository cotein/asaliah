<template>
  <div class="row">
        <div class="col-md-12">
            <div v-for="(orden, index) in ReceiptToProvidersOrdersGetters" :key="orden.id">
                <div class="card">
                    <div class="card-header bg-default">
                        <strong>ORDEN DE PAGO: {{orden.data.number}}</strong>
                        <strong class="pull-right">Total de la Orden: {{orden.data.total}}</strong>
                    </div>
                    <div class="card-body" data-toggle="match-height" >
                        <table class="table table-borderless table-middle">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Comprobante</th>
                                    <th class="text-center">Número</th>
                                    <th class="text-center">Importe del Comprobante</th>
                                    <th class="text-center">A Pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <ReceiptToProvidersOrdersInvoice 
                                v-for="(invoice, ind) in orden.data.items" :key="invoice.id"
                                :invoice="invoice" :index_order="index" :index_invoice="ind" />
                            </tbody>
                            <tfoot>
                                <tr class="text-right">
                                    <td colspan="4"><strong>Importe total a pagar: {{orden.data.total}}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import ReceiptToProvidersOrdersInvoice from './ReceiptToProviderOrdersInvoice'
export default {
    components : {
        ReceiptToProvidersOrdersInvoice
    },

    data(){
        return {
            options : {
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

    methods : {

        /* update(index_order, index_invoice, $event)
        {
            let payload = {
                index_order : index_order,
                index_invoice : index_invoice,
                paid : $event.target.value
            }
            this.$store.commit('RECEIPT_TO_PROVIDERS_SET_IMPORT_INVOICE_TO_PAY', payload);
        },

        getValue(index_order, index_invoice)
        {
            this.$store.state.ReceiptToProviders.invoices_to_pay.forEach((element, index) => {
                if (element.index_order == index_order && element.index_invoice == index_invoice) {
                    return this.$store.state.ReceiptToProviders.invoices_to_pay[index].paid;
                }
            });
        } */

    },

    computed : {

        ...mapGetters([
            'ReceiptToProvidersOrdersGetters',
            'ReceiptToProvidersTotal',
            'ReceiptToProvidersCancelationDocumentsCountGetters'
        ]),

    },

    mounted(){

    }
}
</script>
