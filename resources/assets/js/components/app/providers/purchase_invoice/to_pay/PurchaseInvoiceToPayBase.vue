<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <div class="pull-right">
                        <button 
                            @click="add_article"
                            type="button" 
                            class="btn btn-primary" 
                            >Agregar Artículo</button>
                    </div> -->
                    <strong>PROVEEDOR: </strong>
                </div>
                <div class="card-body" data-toggle="match-height">
                    <table class="table table-striped table-bordered" style="margin-bottom:31px">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-3 text-center">Comprobante</th>
                                <th class="col-md-3 text-center">Número</th>
                                <th class="col-md-2 text-center">Fecha</th>
                                <th class="col-md-2 text-center">Importe</th>
                                <th class="col-md-1 text-center">Borrar</th>
                            </tr>
                        </thead>
                        <fade-transition group tag="tbody" >
                            <tr v-for="(row, index) in PurchaserInvoicesToPayGetter" :key="row.id">
                                <td class="text-center">{{index + 1}}</td>
                                <td class="text-left">{{row.data.voucher}}</td>
                                <td class="text-center">{{row.data.long_number}}</td>
                                <td class="text-center">{{row.data.date}}</td>
                                <td class="text-center">{{row.data.total}}</td>
                                <td class="text-center">-----</td>
                            </tr>
                        </fade-transition>
                    </table>
                    <div class="text-right">
                        aaaaaaa
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button 
                    class="btn btn-primary"
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
                    >Guardar comprobante de compras
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../../../mixins/auth';
import sleep_mixin from './../../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../../mixins/toast-mixin';
export default {
    
    mixins : [auth, toast_mixin, sleep_mixin],
    
    components : {
    },

    data()
    {
        return {
            spinner : false
        }
    },

    computed : {
        ...mapGetters(
            [
               'PurchaserInvoicesToPayGetter',
            ]
        )
    },

    mounted()
    {
        console.log(this.PurchaserInvoicesToPayGetter);
    }
}
</script>