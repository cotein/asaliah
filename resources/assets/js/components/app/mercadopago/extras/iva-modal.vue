<template>
    <div id="infoModalColoredHeader" 
            tabindex="-1" role="dialog" class="modal fade" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Hay productos que no presentan IVA</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="5%" >#</th>
                                    <th width="40%">Producto</th>
                                    <th width="35%">IVA</th>
                                    <th width="20%">Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <iva_tr_table 
                                    v-for="(product, index) in BilliableProducts" 
                                    :key="index"
                                    :index="index"
                                    :product="product">
                                    
                                </iva_tr_table>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" type="button">Continue</button>
                        <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import iva_tr_table from './iva-tr-table';
export default {
    components : {
        iva_tr_table
    },
    data() {
        return {
            
        }
    },
    methods : {
        
    },

    computed : {
        ...mapGetters([
            'PaymentList',
            'BilliableProducts'
        ]),
    },
    mounted() {
        $('#infoModalColoredHeader').on("hidden.bs.modal", ()=>{
            Event.$emit('modal_close');
        });
    },
}
</script>
<style  scoped>
</style>