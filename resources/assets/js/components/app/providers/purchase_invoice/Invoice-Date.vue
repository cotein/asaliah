<template>
    <div class="col-md-3" :class="{'has-error':PurchaseInvoiceDateErrorGetter}">
        <label class="control-label">FECHA DEL COMPROBANTE</label>
        <datepicker
            ref="invoice_date"
            :language="es"
            v-model="invoice_date"
            input-class="my-input"
            :format="customFormatter"
        ></datepicker> 
        <p v-if="PurchaseInvoiceDateErrorGetter">{{PurchaseInvoiceDateErrorGetter[0]}}</p>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex';
import sleep from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import datepicker_mixin from './../../../../mixins/datepicker-mixin';
import { isMoment } from 'moment';
export default {
    props : {
        spinner : {
            default : false,
        }
    },
    mixins : [datepicker_mixin, toast_mixin, sleep],

    data() {
        return {
            invoice_date : null,
        }
    },

    watch : {

        invoice_date(n)
        {
            let imputation_date = this.$time(this.GetPurchaseInvoiceImputationDate);
            
            if( imputation_date.isBefore(n) )
            {
                this.question_message('Fecha comprobante, mayor a fecha de imputación', 'Iva Compras');
                this.$store.commit('PURCHASE_INVOICE_DATE_IS_OK', false);
            }else{

                this.$store.commit('PURCHASE_INVOICE_DATE_IS_OK', true);
            }
            

            this.$store.commit('PURCHASE_INVOICE_SET_DATE', n);

        }
    },

    methods : {

        ...mapActions([
            'setPurchaseInvoiceDate'
        ]),

    },

    computed : {

        ...mapGetters([
            'GetPurchaseInvoiceDate',
            'PurchaseInvoiceDateErrorGetter',
            'GetPurchaseInvoiceImputationDate'
        ])
    },
}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>