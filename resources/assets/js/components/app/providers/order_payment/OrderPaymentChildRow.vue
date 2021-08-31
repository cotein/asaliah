<template>
    <div class="row">
        <div class="col-md-12 pull-right">
            <div class="card">
                <div class="card-header" >
                    <div class="col-md-7">
                        <p><strong>Comprobantes a pagar</strong></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-left col-md-1">#</th>
                                <th class="text-center col-md-2">Comprobante</th>
                                <th class="text-center col-md-1">Número</th>
                                <th class="text-center col-md-1">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in data.items" :key="item.id">
                                <td>{{index + 1}}</td>
                                <td class="text-center">{{item.name}}</td>
                                <td class="text-center">{{item.number}}</td>
                                <td class="text-right">{{item.total}}</td>
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
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {

            }
        },
    }
</script>