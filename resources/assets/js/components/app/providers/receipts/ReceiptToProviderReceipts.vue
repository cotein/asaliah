<template>
  <div class="row">
        <div class="col-md-12">
            <div class="col-md-12" >
                <div class="card">
                    <div class="card-header bg-warning">
                        <strong>Recibos pendientes del proveedor</strong>
                    </div>
                    <div class="card-body" data-toggle="match-height" style="height: 218px;">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th class="col-md-1 text-center">#</th>
                                    <th class="col-md-4 text-center">Número</th>
                                    <th class="col-md-4 text-center">Saldo</th>
                                    <th class="col-md-4 text-center">Utilizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(receipt, ind) in ReceiptToProvidersPendingReceiptsGetters" :key="receipt.id">
                                    <td class="col-md-1">{{ind + 1}}.</td>
                                    <td class="col-md-4 text-center">
                                        {{receipt.number}}
                                    </td>
                                    <td 
                                        class="col-md-3 text-right"
                                        :class="{'text-danger' : receipt.balance_raw > 0}"
                                        >
                                        {{receipt.balance}}.- {{(receipt.balance_raw > 0) ? 'A favor del proveedor' : 'A favor de Piamond'}}
                                    </td>
                                    <td class="col-md-3 text-right">
                                         <input type="checkbox" 
                                            class="form-control" 
                                            @change="add_receipt"
                                            :value="{id : receipt.id, value : receipt.balance_raw}" 
                                            v-model="markedRows">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="text-right">
                                    <td colspan="4"><strong>Importe total:</strong></td>
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
import auth from './../../../../mixins/auth';
import sleep from './../../../../mixins/sleep-mixin';
export default {
    data(){
            return {
               markedRows : [],
            }
        },

        methods : {

            add_receipt()
            {
                this.$store.commit('SET_RECEIPT_TO_PROVIDER_CANCELATION_DOCUMENTS_RECEIPT', this.markedRows);
            }
        },

        computed : {

            ...mapGetters([
                'ReceiptToProvidersOrdersGetters',
                'ReceiptToProvidersPendingReceiptsGetters'
            ])
        },

        async mounted(){

            //sleep(250);
            

        }
}
</script>
