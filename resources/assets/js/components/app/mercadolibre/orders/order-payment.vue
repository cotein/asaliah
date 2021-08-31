<template>
    <div>
        <loading 
            :active.sync="Load" 
            color="#0469c7"
            :height="31"
            :width="31"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-middle media-left">
                        <span class="bg-gray sq-32 circle">
                        <span class="icon icon-credit-card-alt"></span>
                        </span>
                    </div>
                    <div class="media-middle media-body" v-if="HasPayments">
                        <h4 class="media-heading">
                            Pago
                        </h4>    
                        <h5 class="media-heading">
                            <span class="text-danger">Estado: {{Status(GetOrder.status)}} </span>
                        </h5>
                        <div v-for="(item, index) in GetPayments" :key="index">
                            <p><small>Modo: {{Type(item.payment_type)}} - {{item.payment_method_id}}</small></p>
                            <!-- <p><small>Email: {{GetBuyer.email}}</small></p> -->
                            <p><small>Monto transacción: {{item.transaction_amount | currency}}</small></p>
                            <p><small>Total pagado: {{item.total_paid_amount | currency}}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex';
    import Loading from 'vue-loading-overlay';
    export default {
        components : {
            Loading
        },
        data() {
            return {
                load : null,
                buyer : null
            }
        },
        methods : {
            Type(payment_type){
                if ( this.HasPayments) {
                    switch (payment_type) {
                        case 'credit_card':
                            return 'Tarjeta de crédito';
                            break;
                    
                        default:
                            break;
                    }
                }
                return 'Cargando...';
            },

            Status(status){
                if ( this.HasPayments) {
                    switch (status) {
                        case 'approved':
                            return 'Aprobado';
                            break;
                        case 'paid':
                            return 'Pagado';
                            break;
                        default:
                            break;
                    }
                }
                return 'Cargando...';
            },
        },
        computed : {
            ...mapGetters(['GetPayments', 'HasPayments',
                'HasOrder', 'GetOrder'
            ]),

            Load(){
                if ( ! (this.HasPayments) ) {
                    return true;
                }
                return false
            },

            

        },

    }
</script>
