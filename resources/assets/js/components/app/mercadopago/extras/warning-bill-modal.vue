<template>
    <div>
        <loading 
            :active.sync="BillButtonShowSpinner" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div id="warningModalAlert" tabindex="-1" role="dialog" class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <span class="text-warning icon icon-exclamation-triangle icon-5x"></span>
                        <h4 class="text-warning">EMITIR COMPROBANTE DE VENTA</h4>
                        <h3>
                            ORDEN N°: {{Code}}
                        </h3>
                            
                        <div class="m-t-lg">
                            <button @click="invoice()" class="btn btn-warning" data-dismiss="modal" type="button">Continuar</button>
                            <button class="btn btn-default" data-dismiss="modal" type="button">Cancelar</button>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer">
                           
                    </div>
                </div>
            </div>
        </div>
        <button
            ref="diego"
            data-toggle="modal" 
            data-target="#infoModalColoredHeader"  
            class="btn btn-outline-primary btn-icon sq-32" 
            type="button">
            <span class="icon icon-dollar"></span>
        </button>     
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import iva_modal from './iva-modal';
import Loading from 'vue-loading-overlay';
import auth from './../../../../mixins/auth';
export default {
    mixins : [auth],
    components : {
        Loading, iva_modal
    },
    data() {
        return {
        }
    },
    methods : {
        invoice(){
            if (this.HasIva) {

                this.$refs.diego.click()
            }

            this.$store.commit('SET_BILL_BUTTON_SHOW_SPINNER', true);
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

            axios.post('/api/pedidos/bill', 
                {
                    'order' : this.BillData
                })
            .then((response) => {
                console.log(response);
            }, error => {
                console.log(error);
            }).finally(()=>{
                this.$store.commit('SET_BILL_BUTTON_SHOW_SPINNER', false);
            })
        }
    },

    computed : {

        HasIva(){
            if (this.BillData != null) {
                
                return collect(this.BillData.billable_product).map((i)=>{
                    return i.has_iva
                }).contains(false);
            }

            return false;
        },
        
        ...mapGetters([
            'Code',
            'BillData',
            'BillButtonShowSpinner',
        ])
    }
}
</script>