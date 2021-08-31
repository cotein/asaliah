<template>
    <tr>
        <td class="text-center">
            {{number + 1}}
        </td>
        <td>
            {{tax.name}}
        </td>
        <td>
            <vue-autonumeric 
                class="form-control text-right"
                :options=money_options
                v-model="tax_import"
            ></vue-autonumeric>
        </td>
        <td class="text-center center--vertical">
            <button 
                class="btn btn-outline-danger btn-icon sq-32">
                <span class="icon icon-trash"></span>
            </button>
        </td>
    </tr>
</template>

<script>
    import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        props : ['number', 'tax'],
        components :
        {
            VueAutonumeric
        },
        data(){
            return {
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

            tax_import :{
                get(){
                    return this.$store.state.PurchaseInvoice.invoice.taxes[this.number].import
                },
                set(value){

                    let payload = {
                        index : this.number,
                        tax : this.tax,
                        import : value
                    }

                    this.$store.commit('PURCHASE_INVOICE_SET_TAX_IMPORT', payload);
                }
            }

        },

        mounted(){
            
        }

    }
</script>

<style lang="scss" scoped>

</style>