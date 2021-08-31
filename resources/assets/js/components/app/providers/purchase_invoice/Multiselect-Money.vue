<template>
    <div class="form-group" :class="{'has-error': PurchaseInvoiceMoneyErrorGetter}">
        <div class="col-md-5" >
            <label class="control-label">MONEDA</label>
            <multiselect placeholder="Moneda" 
                track-by="name" label="name"
                :loading="money_spinner"
                :value="PurchaseInvoiceMoney"
                :options="GetMoneys"
                :clear-on-select="false" 
                @input="purchaseInvoiceSelectMoney"
                >
                <span slot="noOptions">
                        Lista Vacía
                </span>
                <span slot="noResult">
                        La búsqueda no arrojó resultados
                </span>
            </multiselect>
            <p v-if="PurchaseInvoiceMoneyErrorGetter">{{PurchaseInvoiceMoneyErrorGetter}}</p>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import {mapGetters, mapActions} from 'vuex';
import sleep_mixin from './../../../../mixins/sleep-mixin';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    props : {
        spinner : {
            default : false
        }
    },
    mixins : [sleep_mixin],
    components : {
        Multiselect, VueAutonumeric
    },
    data() {
        return {
            money_spinner : true,
        }
    },
    methods : {
         ...mapActions(['purchaseInvoiceSelectMoney'])
    }, 

    computed : {

        ...mapGetters([
            'GetMoneys',
            'PurchaseInvoiceMoney',
            'PurchaseInvoiceMoneyErrorGetter'
        ]),

    },

    mounted(){
        this.sleep(1000);
        this.money_spinner = false;
    }

  
}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>