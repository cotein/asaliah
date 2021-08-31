<template>
    <div class="row">
        <div class="col-md-12 pull-right">
            <div class="card">
                <div class="card-header" >
                    <div class="col-md-7">
                        <p><strong>Órdenes de que intervienen en el pago</strong></p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-condensed" v-for="(order, index) in data.orders" :key="order.id">
                        <thead>
                            <tr class="bg-default">
                                <th class="col-md-4 text-center">{{index+1}} - Nº {{order.number}}</th>
                                <th class="col-md-2 text-center">Comprobante</th>
                                <th class="col-md-2 text-center">Número</th>
                                <th class="col-md-2 text-center">Fecha</th>
                                <th class="col-md-2 text-center">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(invoice) in order.invoices" :key="invoice.id">
                                <td  class="col-md-4"></td>
                                <td class="col-md-2 text-left">{{invoice.voucher}}</td>
                                <td class="col-md-2 text-center">{{invoice.number}}</td>
                                <td class="col-md-2 text-center">{{invoice.date}}</td>
                                <td class="col-md-2 text-right">{{invoice.total}}</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="col-md-2 text-right">
                                    <strong>
                                       Total: {{order.total}}
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div  class="card-footer" v-if="HasTaxes">
                    <p><strong>Detalle de Percepciones</strong></p>
                    <ul v-for="tax in data.taxes" :key="tax.tax">
                        <li>{{tax.tax}} : {{tax.tax_import}}</li>
                    </ul>
                </div> -->
            </div>
            <div class="card" v-if="data.receipt_with_debt != null">
                <div class="card-header" >
                    <div class="col-md-7">
                        <p><strong>Recibos con deuda que intervienen en el pago</strong></p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-condensed" >
                        <thead>
                            <tr class="bg-warning">
                                <th class="col-md-3 text-center">#</th>
                                <th class="col-md-3 text-center">Número</th>
                                <th class="col-md-3 text-center">Fecha</th>
                                <th class="col-md-3 text-center">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(rwd, index) in data.receipt_with_debt" :key="rwd.id">
                                <td class="col-md-3 text-left">{{index + 1}}</td>
                                <td class="col-md-3 text-center">{{rwd.number}}</td>
                                <td class="col-md-3 text-center">{{rwd.date}}</td>
                                <td class="col-md-3 text-right">{{rwd.total}}</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="col-md-2 text-right">
                                    <strong>
                                       Total: {{data.receipt_with_debt_total | currency}}
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div  class="card-footer" v-if="HasTaxes">
                    <p><strong>Detalle de Percepciones</strong></p>
                    <ul v-for="tax in data.taxes" :key="tax.tax">
                        <li>{{tax.tax}} : {{tax.tax_import}}</li>
                    </ul>
                </div> -->
            </div>
            <div class="card" v-if="data.cancelation_documents.length > 0">
                <div class="card-header" >
                    <div class="col-md-7">
                        <p><strong>Documentos que cancelan la deuda</strong></p>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-condensed" >
                        <thead>
                            <tr class="bg-success">
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-2 text-center">Tipo</th>
                                <th class="col-md-3 text-center">Banco</th>
                                <th class="col-md-2 text-center">Número</th>
                                <th class="col-md-2 text-center">Fecha de cobro</th>
                                <th class="col-md-2 text-center">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(cd, index) in data.cancelation_documents" :key="cd.id">
                                <td class="col-md-1 text-left">{{index + 1}}</td>
                                <td class="col-md-2 text-center">{{cd.type}}</td>
                                <td class="col-md-3 text-center">{{cd.bank}}</td>
                                <td class="col-md-2 text-center">{{cd.number}}</td>
                                <td class="col-md-2 text-center">{{cd.expirate_date}}</td>
                                <td class="col-md-2 text-right">{{cd.import}}</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="col-md-2 text-right">
                                    <strong class="text-danger">
                                       Total: {{data.cancelation_documents_total | currency}}
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div  class="card-footer">
                    <p><strong>Detalle de Percepciones</strong></p>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
    }
</script>