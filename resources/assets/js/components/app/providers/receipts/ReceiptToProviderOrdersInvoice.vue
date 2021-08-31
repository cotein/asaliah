<template>
    <tr >
        <td class="col-md-1">{{index_invoice + 1}}.</td>
        <td class="col-md-3 text-left">
            {{invoice.name}}
        </td>
        <td class="col-md-2 text-center">
            {{invoice.number}}
        </td>
        <td class="col-md-3 text-right">
            {{invoice.total}}
            <p v-if="(invoice.paid < invoice.total) ? 'El comprobante quedará pendiente':'' "></p>
        </td>
        <td class="col-md-3 text-right">
            <vue-autonumeric 
                class="form-control"
                :options=options
                
                v-model="paid"
            ></vue-autonumeric>
        </td>
    </tr>
</template>

<script>
import { mapGetters } from 'vuex';
import VueAutonumeric from './../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        props : ['invoice', 'index_order', 'index_invoice'],
        components : {
            VueAutonumeric
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
                    minimumValue: '-99999999',
                    modifyValueOnWheel  : false,
                    showOnlyNumbersOnFocus : true,
                },
            }
        },

        computed : {

            ...mapGetters([
                'ReceiptToProvidersTotal',
                'ReceiptToProvidersOrdersGetters',
                'ReceiptToProvidersInvoiceCountGetters',
            ]),

            paid : {
                get()
                {
                    return this.ReceiptToProvidersOrdersGetters[this.index_order].data.items[this.index_invoice].paid;
                },
                set(value)
                {
                    let payload = {
                        index_order : this.index_order,
                        index_invoice : this.index_invoice,
                        paid : value
                    }
                    this.$store.commit('RECEIPT_TO_PROVIDERS_SET_IMPORT_INVOICE_TO_PAY', payload);
                }
            }
        },

        watch : {

            ReceiptToProvidersTotal(n)
            {
                //this.paid = n / this.ReceiptToProvidersInvoiceCountGetters
            }

        },
    }
</script>

<style lang="scss" scoped>

</style>