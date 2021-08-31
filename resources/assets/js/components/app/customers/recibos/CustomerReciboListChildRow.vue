<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Comprobantes de ventas que intervienen en el Recibo</strong>
            </div>
            <div class="card-body">
                <table class="table table-condensed ">
                    <thead>
                        <tr>
                        <th class="text-center">Número</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(si,index) in data.invoices" :key="index" >
                            <td class="text-center">{{si.name}}</td>
                            <td class="text-left">{{si.number}}</td>
                            <td class="text-center">{{si.total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <strong>Comprobantes de cancelación</strong>
            </div>
            <div class="card-body">
                <table class="table table-condensed my-size">
                    <thead>
                        <tr>
                        <th class="text-center col-md-3">Tipo</th>
                        <th class="text-center col-md-3">Banco</th>
                        <th class="text-center col-md-2">Número</th>
                        <th class="text-centercol-md-2">Importe</th>
                        <th class="text-center col-md-2">Propietario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(doc,index) in data.cancelations_documents" :key="index" >
                            <td class="text-center">{{doc.type}}</td>
                            <td class="text-left">{{doc.bank}}</td>
                            <td class="text-center">{{doc.number}}</td>
                            <td class="text-center">{{doc.import}}</td>
                            <td class="text-center">{{doc.owner}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['data']
    }
</script>

<style lang="scss" scoped>
    table.my-size tr td { font-size: 12px; }
</style>