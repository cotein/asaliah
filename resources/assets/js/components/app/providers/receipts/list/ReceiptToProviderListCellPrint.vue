<template>
    <div>
        <button 
            @click="createPDF"
            v-tooltip="'Imprimir Recibo de pago'"
            class="btn btn-default btn-icon sq-32"
            :class="{'btn btn-default spinner spinner-inverse spinner-sm' : print_spinner}" >
            <span class="icon icon-print"></span>
        </button>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../../../mixins/auth';
import sleep from './../../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../../mixins/toast-mixin';
import ProviderReceiptPaymentPdf from './../../../../../src/Pdf/Provider/ProviderReceiptPaymentPdf';

export default {
    props : ['data'],
    mixins : [auth, sleep,toast_mixin],
    data(){
        return {
            spinner : false,
            print_spinner : false
        }
    },

    methods : {

        createPDF(){
            return new Promise(resolve => {
                this.print_spinner = true;
                let opPdf = new ProviderReceiptPaymentPdf;
                let dataPdf = {
                    company : this.GetCompany,
                    data : this.data
                } 
                console.log(dataPdf);
                opPdf.structure_scaffold(dataPdf);
                
                setTimeout(()=>{
                    this.print_spinner = false;
                    resolve('resolved');
                },1500);
                
                opPdf.print();
            });
        }
    },
    computed : {
            ...mapGetters([
                'GetCompany'
            ])
        },

        mounted() {

        },
}
</script>

<style>

</style>