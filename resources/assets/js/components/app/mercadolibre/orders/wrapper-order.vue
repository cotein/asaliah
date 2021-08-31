<template>
    <div>
        <h1 class="title-bar-title">
            <span class="d-ib">#{{order_id}}</span>
        </h1>
        <div class="col-md-4">
            <buyer></buyer>
        </div>
        
        <div class="col-md-4">
            <order_payments></order_payments>
        </div>
        <div class="col-md-4">
            <voucher_sell_button></voucher_sell_button>
        </div>

        <div class="col-md-12">
            <order_items></order_items>
        </div>
    </div>
</template>

<script>
    import buyer from './order-buyer';
    import order_items from './order-items';
    import order_payments from './order-payment';
    import voucher_sell_button from './voucher-sell-button';
    export default {
        props : ['token'],
        components : {
            buyer, order_items, order_payments, voucher_sell_button
        },
        data() {
            return {
                order_id : null
            }
        },
        methods : {
            getOrder(){
                let $vm = this;

                let payload = {
                    token : $vm.token,
                    order_id : $vm.order_id,
                }
                setTimeout(() => {
                    
                    this.$store.dispatch('getOrder', payload).then((result) => {
                        
                    this.$store.commit('SET_ORDER', result.data.body);

                    }).catch((err) => {
                    
                    });

                }, 50); 
            }
        },
        computed : {
            
        },

        beforeMount() {
             this.order_id = sessionStorage.getItem('order_id');
        },
        mounted() {
           this.getOrder();
        },
       
    }
</script>
