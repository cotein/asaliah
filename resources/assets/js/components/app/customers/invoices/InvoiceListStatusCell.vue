<template>
    <div>
        <span  class="label" :class="Status" >{{data.status}}</span>
    </div>
</template>

<script>
    //import * as constants from './../../../src/const/Status';
    export default {
        props: ['data', 'index'],
        data() {
            return {
                
            }
        },

        methods : {
            
        },

        computed : {

            Status()
            {
                if (this.data.status == 'ELIMINADO') {
                    return "eliminado";
                }

                if (this.data.status == 'PENDIENTE') {
                    return "pendiente";
                }

                if (this.data.status == 'PRIMER CONTACTO') {
                    return "primer_contacto";
                }

                if (this.data.status == 'LISTADO') {
                    return "listado";
                }

                if (this.data.status == 'REMITIDO') {
                    return "remitido";
                }

                if (this.data.status == 'FACTURADO') {
                    return "facturado";
                }

                if (this.data.status == 'EN PRODUCCION') {
                    return "en_produccion";
                }

                if (this.data.status == 'EN STOCK') {
                    return "en_stock";
                }

                if (this.data.status == 'CROSS OVER') {
                    return "cross_over";
                }

                if (this.data.status == 'DESPACHADO') {
                    return "despachado";
                }

                if (this.data.status == 'ENTREGADO') {
                    return "entregado";
                }

                if (this.data.status == 'REPORTADO') {
                    return "reportado";
                }

                if (this.data.status == 'PAGADA') {
                    return "pagada";
                }

                if (this.data.status == 'CERRADO') {
                    return "cerrado";
                }
                
                if (this.data.status == 'A PAGAR') {
                    return "a_pagar";
                }

            }
        },

        mounted() {

        },
       
    }
</script>

<style scoped>
    .pendiente {
        background-color: #ff9c00;
    }
    .primer_contacto {
        background-color: #555e7a;
    }
    .listado {
        background-color: #92B735;
    }
    .remitido {
        background-color: #B576AD;
    }
    .facturado{
        background-color: #4C8A48;
    }
    .cerrado{
        background-color: #4C8A48;
    }
    .en_produccion{
        background-color: #7CCCE5;
    }
    .en_stock {
        background-color: #BA44E5;
    }
    .cross_over{
        background-color: #66A9C1;
    }
    .despachado{
        background-color: #F455CA;
    }
    .entregado{
        background-color: #5C7BF5;
    }
    .reportado{
        background-color: #ECBEE7;
    }
    .eliminado{
        background-color: #E91808;
    }
    .pagada{
        background-color:#4C8A48;
    }
    .a_pagar{
        background-color:#4C8A48;
    }
</style>