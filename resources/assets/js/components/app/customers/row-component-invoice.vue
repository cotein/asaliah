<template>
    <tbody>
        <tr>
            <td class="center--vertical text-center" rowspan="2">{{number + 1}}</td>
            <td>
                <async_find_invoice :index="number"></async_find_invoice>
            </td>
            <td class="text-right">
                {{ Total | currency}}
            </td>
            <td rowspan="2" class="text-center center--vertical">
                <button 
                    @click="deleteInvoice()"
                    class="btn btn-outline-danger btn-icon sq-32">
                    <span class="icon icon-trash"></span>
                </button>
            </td>
        </tr>
        <tr v-if="invoice.description">
            <td>
                <small>Motivo:</small>
                <input class="form-control" type="text" v-model="detail">
            </td>
            <td class="center--vertical">
                <vue-autonumeric 
                    class="form-control"
                    v-model="total"
                    :options=options
                ></vue-autonumeric>
            </td>
        </tr>
    </tbody>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import auth from './../../../mixins/auth';
import async_find_invoice from './async-find-invoice';
import VueAutonumeric from '../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';

export default {
    name : 'factura',

    props : ['number', 'invoice'],
    
    data() {
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

    components : {
        async_find_invoice, VueAutonumeric
    },

    mixins : [auth],

    methods : {
        deleteInvoice(){
            this.$store.commit('DELETE_INVOICE', this.number);
            this.$store.commit('DELETE_CBTE_ASOC', this.number);
        },
    },

    computed : {

        ...mapGetters([
            'BillType'
        ]),

        Total(){
            let items = collect(this.$store.state.sale_invoice.invoices[this.number].iva);
            
            let total =  items.sum('neto_import') + items.sum('iva_import');

            return total.toFixed(2);
        },

        detail :
        {
            get()
            {
                return this.$store.state.sale_invoice.invoices[this.number].description.detail;
            },
            
            set(value)
            {
                console.log('set detai en notas deb cred');
                this.$store.commit('SET_INVOICE_DETAIL', {index:this.number, detail:value});
            }
        },

        total : 
        {
            get()
            {
                return this.$store.state.sale_invoice.invoices[this.number].description.total;
            },
            
            set(value)
            {
                const data = {
                    total:value,
                    index:this.number,
                    type : this.BillType
                }
                console.log('SET_INVOICE_TOTAL en row component invoice');
                console.log(data);
                this.$store.commit('SET_INVOICE_TOTAL', data);
            }
        }
    }

}
</script>
<style  scoped>
    .center--vertical {
    vertical-align: middle;
    }
</style>