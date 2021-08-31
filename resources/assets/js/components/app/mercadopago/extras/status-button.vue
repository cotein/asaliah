<template>
    <div>
        <span :class="'label label-'+Status">{{data.status}}</span>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            
        },

        computed : {

            Status(){
                switch (this.data.status) {
                    case 'Aprobado':
                        return 'success';
                        break;

                    case 'Pago pendiente':
                        return 'warning';

                    default:
                        return 'danger'
                        break;
                }
            }

        },

        mounted() {

        },
    }
</script>
<style slot-scope>
     .label-success {
        background-color: green;
    }
</style>
