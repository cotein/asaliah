<template>
    <div class="row">
        <div class="col-md-12 pull-right">
            <div class="card">
                <div class="card-header" >
                    <div class="col-md-7">
                        <p><strong>Detalle del comprobante</strong></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center col-md-1">#</th>
                                <th class="text-center col-md-2">Artículo</th>
                                <th class="text-center col-md-2">Prec. Unit.</th>
                                <th class="text-center col-md-1">Cantidad</th>
                                <th class="text-center col-md-1">Iva</th>
                                <th class="text-center col-md-1">Iva imp.</th>
                                <th class="text-center col-md-1">Descuento</th>
                                <th class="text-center col-md-1">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in data.items" :key="item.id">
                                <td class="text-center">{{index + 1}}</td>
                                <td class="text-left">{{item.article}}</td>
                                <td class="text-right">{{item.unit_price}}</td>
                                <td class="text-center">{{item.quantity}}</td>
                                <td class="text-center">{{item.iva}}</td>
                                <td class="text-right">{{item.iva_import}}</td>
                                <td class="text-right">{{item.discount}}</td>
                                <td class="text-right">{{item.total}}</td>
                            </tr>
                            <tr v-for="tax in data.taxes" :key="tax.tax">
                                <td class="text-right" colspan="8"><strong>{{tax.tax}} :</strong> {{tax.tax_import}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import auth from './../../../../../mixins/auth';
    export default {
        props: ['data'],
        components : {},
        mixins : [auth],
        data() {
            return {

            }
        },

        methods : {

            
        },

        computed : {

            HasTaxes()
            {
                let taxes = collect(this.data.taxes);

                if (taxes.count() > 0) {
                    return true;
                }
                return false;
            }
            
        },

        watch : {

           
        },

        mounted() {
            
        },
       
    }
</script>
<style>
    .my-input{
        background-color: white;
        border-style:solid !important;
        border-color:#5d5d5d !important;
        border-width:1px !important;
        text-align: center;
        width: 250px !important;
    }
    .my-success{
        background-color: #4C8A48;
    }
    .my-danger{
        background-color: #E91808;
    }
    .my-info {
        background-color: #555e7a;
    }
    .my-warning {
        background-color: #ff9c00;
    }
</style>