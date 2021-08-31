<template>
    <div class="list-group-item" 
        >
        <div class="notification">
            <div class="notification-media">
                <!-- <img class="circle" width="35" height="35" src="/images/default-user.png" alt="Harry Jones"> -->
                <avatar :username="notification_order.customer"></avatar>
            </div>
            <div class="notification-content">
                <small class="notification-timestamp">{{Date.now() | moment().fromNow()}}</small>
                <h5 class="notification-heading">{{notification_order.customer_nick_name}}</h5>
                <p class="notification-text">
                    <small class="truncate">Orden # {{notification_order.meli_id}}</small>
                </p>
            </div>
            <button class="btn btn-primary btn-xs pull-right" 
                    type="button"
                    @click="open_pedido"
                    >Buscar Pedido
            </button>
        </div>
    </div>
</template>

<script>
    import collect from 'collect.js';
    import Avatar from 'vue-avatar';
    import {mapGetters} from 'vuex';
    import {Event} from 'vue-tables-2';
    import auth from './../../../mixins/auth';
    import sleep from './../../../mixins/sleep-mixin';
    export default {
        props : ['notification_order'],
        mixins : [sleep, auth],
        components: {
            Avatar
        },

        data(){
            return {

            }
        },

        methods : {

            async get_pedido  () {

                let payload = {
                    token : this.User.token,
                    code : this.notification_order.meli_id
                }

                let pedido = await this.$store.dispatch('pedido_show', payload)
                    .catch((err) => {
                        console.log('EEEEEEError');
                        console.log(err);
                    }).finally(()=>this.spinner=false);

                if(pedido)
                {
                    console.log('pedido');
                    console.log(pedido);
                    let order = [];
                    order.push(pedido.data);
                    this.$store.commit('SET_PEDIDOS', order);
                }
            },

            remove_notification_order_from_sessionStorage()
            {
                let $vm = this;
                let tmp = JSON.parse(sessionStorage.getItem("vuex"));
                let orders = collect(tmp.OrdersMeli.new_order_notification);

                let result = orders.map((order, index) => {
                    if (order.meli_id == $vm.notification_order.meli_id) {
                        orders.splice(index);
                    }else{
                        return order;
                    }
                });
                tmp.OrdersMeli.new_order_notification = JSON.parse(result.filter().toJson());
                sessionStorage.removeItem("vuex");  
                sessionStorage.setItem('vuex', JSON.stringify(tmp));
            },

            async open_pedido(){
                let $vm = this;
                $vm.sleep(1500);
                let index = $vm.GetPedidos.findIndex(order => {
                    return order.meli_id == $vm.notification_order.notification_order
                });

                if (index > -1) {
                    Event.$emit('open-order-from-notification_order', $vm.notification_order.notification_order);
                    $vm.sleep(100);
                    
                    $vm.$store.commit('DELETE_NEW_ORDER_NOTIFICATION', $vm.notification_order.notification_order);
                    this.remove_notification_order_from_sessionStorage();
                }else{
                    
                    let pathName = window.location.pathname;

                    if (pathName == '/pedidos/clientes/listado') {
                        $vm.$store.commit('DELETE_NEW_ORDER_NOTIFICATION', $vm.notification_order.notification_order);
                        $vm.get_pedido();
                        this.remove_notification_order_from_sessionStorage();
                    }else{
                        $vm.$store.commit('DELETE_NEW_ORDER_NOTIFICATION', $vm.notification_order.notification_order);
                        sessionStorage.setItem('notification_order', $vm.notification_order.notification_order);
                        this.remove_notification_order_from_sessionStorage();
                        window.location.href = '/pedidos/clientes/listado';
                    }

                }
                
            }
            
        },

        beforeMount(){
            this.$moment.locale('es');
        },

        computed : {

            ...mapGetters(
                [
                    'GetPedidos'
                ]
            ),
        }
    }
</script>

<style lang="scss" scoped>

</style>