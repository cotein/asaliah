<template>
    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 141px;">
        <h4>Ventas</h4>
        <p>
            <small>AFIP - Facturación electrónica</small>
        </p>
        <button class="btn btn-primary btn-lg" type="button">Generar comprobante de Venta</button>
    </div>
</template>

<script>
    
    export default {
        props: ['data', 'index'],
        data() {
            return {
                token : null
            }
        },
        methods : {
            
        },
        computed : {
            
        },

        mounted() {
           this.token = this.$parent.$options.parent.$options.propsData.token
        },
       
    }
</script>
