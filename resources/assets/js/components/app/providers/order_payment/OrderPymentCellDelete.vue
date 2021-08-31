<template>
    <div>
        <button 
            @click="createPDF"
            v-tooltip="'Imprimir orden de pago'"
            class="btn btn-default btn-icon sq-32"
            :class="{'btn btn-default spinner spinner-inverse spinner-sm' : print_spinner}" >
            
            <span class="icon icon-print"></span>
        </button>
        <button 
            @click="order_delete"
            v-tooltip="'Anular orden de pago'"
            class="btn btn-outline-danger btn-icon sq-32"
            :class="{'btn btn-danger spinner spinner-inverse spinner-sm' : spinner}" 
            :disabled="data.status_id == 7 || data.status_id == 18"
            >
            <span class="icon icon-trash"></span>
        </button>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../../mixins/auth';
import sleep from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import ProviderOrderPaymentPdf from './../../../../src/Pdf/Provider/ProviderOrderPaymentPdf';

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

        async order_delete()
        {
            console.log(this.data);
            this.spinner = true;
            this.sleep(750);
            let payload = {
                token : this.User.token,
                order_payment : this.data
            } 

            let order = await this.$store.dispatch('order_payment_delete', payload)
            .catch((err) => {
                console.log(err.response);
            }).finally(()=> this.spinner = false);

            if (order) {
                
                Event.$emit('payment_order_delete', order.data);

                this.success_message('Orden anulada correctamente', 'Órdenes de pago', 3000);
                
            }

        },

        createPDF(){
            return new Promise(resolve => {
                this.print_spinner = true;
                let opPdf = new ProviderOrderPaymentPdf;
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