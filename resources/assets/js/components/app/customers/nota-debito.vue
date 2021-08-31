<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <button 
                            type="button" 
                            class="btn btn-primary" 
                            @click="addInvoice()"
                            :disabled="!ExistCustomer"
                            >Agregar Comprobante</button>
                    </div>
                    
                    <strong>Detalle</strong>
                </div>
                <div class="card-body" data-toggle="match-height">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-8 text-center">Comprobante</th>
                                <th class="col-md-2 text-center">Total</th>
                                <th class="col-md-1 text-center">Borrar</th>
                            </tr>
                        </thead>
                        <row_component_invoice v-for="(row, index) in GetInvoices" :key="index" :number="index" :invoice="row"></row_component_invoice>
                        <!-- <tbody>
                            <row_component_invoice v-for="(row, index) in GetInvoices" :key="index" :number="index"></row_component_invoice>
                        </tbody> -->
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
                            <tr v-if="TotalInvoices > 0">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td> 
                                <td class="col-md-3 text-right"><h4>Total</h4></td>
                                <td class="col-md-3 text-right"><h4>{{ TotalInvoices | currency}}</h4></td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="col-md-12 text-center">
                <button 
                    class="btn btn-primary"
                    @click="billGenerate()"
                    :disabled="! HasAddress"
                    >Emitir comprobante
                </button>
            </div>
        </div>
    </div>
</template>

<script>

import sale_invoice from './../../../mixins/sale_invoice';
import row_component_invoice from './row-component-invoice';
import row_description from './row-description';

export default {
    name : 'debito',

    mixins : [sale_invoice],

    components : {
        row_component_invoice, row_description
    },
    
    methods : {

        addInvoice(){
            this.$store.commit('ADD_INVOICE');
        }
    },

}
</script>