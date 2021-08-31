<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <button 
                            type="button" 
                            class="btn btn-primary" 
                            @click="addProduct()"
                            :disabled="!ExistCustomer"
                            >Agregar Producto</button>
                    </div>
                    <strong>Detalle</strong>
                </div>
                <div class="card-body" data-toggle="match-height">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-8 text-center">Producto</th>
                                <!-- <th class="col-md-1 text-center">Cantidad</th>
                                <th class="col-md-1 text-center">Iva</th>
                                <th class="col-md-1 text-center">Descuento %</th> -->
                                <th class="col-md-2 text-center">Total</th>
                                <th class="col-md-1 text-center">Borrar</th>
                            </tr>
                        </thead>
                        <row_component v-for="(row, index) in InvoiceProducts" :key="index" :number="index"></row_component>
                    </table>
                </div>
                
                <div class="card-body pull-right">
                    <table>
                        <tbody>
                            <tr v-if="Neto > 0">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>   
                                <td class="col-md-3 text-right"><h4>Subtotal</h4></td>
                                <td class="col-md-3 text-right" v-if="isGeneralRegime"><h4>{{ Neto | currency}}</h4></td>
                                <td class="col-md-3 text-right" v-else><h4>{{ Neto + IvaImport| currency}}</h4></td>
                            </tr>
                            <tr v-if="Iva21 > 0 && isGeneralRegime">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td class="col-md-3 text-right"><h4>Iva 21%</h4></td>
                                <td class="col-md-3 text-right"><h4>{{ Iva21 | currency}}</h4></td>
                            </tr>
                            <tr v-if="Iva105 > 0 && isGeneralRegime">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td class="col-md-3 text-right"><h4>Iva 10,50%</h4></td>
                                <td class="col-md-3 text-right"><h4>{{ Iva105 | currency}}</h4></td>
                            </tr>
                            <tr v-if="PercepIIBB > 0">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td class="col-md-3 text-right"><h4>Percep. IIBB</h4></td>
                                <td class="col-md-3 text-right"><h4>{{ PercepIIBB | currency}}</h4></td>
                            </tr>
                            <tr v-if="GrandTotal > 0">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td class="col-md-3 text-right"><h4>Total</h4></td>
                                <td class="col-md-3 text-right"><h4>{{ GrandTotal | currency}}</h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button 
                    class="btn btn-primary"
                    @click="billGenerate()"
                    :disabled="! HasAddress || spinner"
                    :class="{'spinner spinner-inverse spinner-sm' : spinner}"
                    >Emitir comprobante
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import row_component from './row-component';
import toast_mixin from './../../../mixins/toast-mixin';
import sale_invoice from './../../../mixins/sale_invoice';

export default {
    name : 'F',

    props : ['company'],

    components : {
        row_component
    },
    
    mixins : [sale_invoice],

    methods : {
        addProduct(){
            this.$store.commit('ADD_PRODUCT_TO_INVOICE');
        },
    },
       
}
</script>