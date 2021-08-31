<template>
    <div class="row">
        <div class="card" v-if="data.has_receipt">
            <div class="card-header btn-warning">
                <strong>Detalle de Recibos</strong>
            </div>
            <!-- <div class="card-body">
                <div v-for="receipt in data.receipt" :key="receipt.id">
                    {{ receipt.receipt_number }}
                    <div v-for="(dc, index) in receipt.documents_cancelation" :key="index">
                        {{ dc.type }} - {{ dc.number }} - {{ dc.import }} 
                    </div>
                </div>
            </div> -->
            <div class="card-body">
                <table class="table table-condensed ">
                    <thead>
                        <tr>
                            <th class="text-center col-md-1">#</th>
                            <th class="text-center col-md-4">Tipo</th>
                            <th class="text-center col-md-4 text-center">Número</th>
                            <th class="text-center col-md-3">Importe</th>
                        </tr>
                    </thead>
                    <tbody v-for="receipt in data.receipt" :key="receipt.id">
                        <tr v-for="(dc, index) in receipt.documents_cancelation" :key="index" >
                            <td class="text-center">{{index + 1}}</td>
                            <td class="text-left">{{dc.type}}</td>
                            <td class="text-right">{{dc.number}}</td>
                            <td class="text-right">{{dc.import | currency}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                <strong>Total pagado: {{data.total}}</strong>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-md-12 text-center">
                <p>Comprobante pendiente de pago</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
    }
</script>

<style lang="scss" scoped>

</style>