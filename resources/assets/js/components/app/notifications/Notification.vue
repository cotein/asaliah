<template>
    <div class="list-group-item" 
        >
        <div class="notification">
            <div class="notification-media">
                <!-- <img class="circle" width="35" height="35" src="/images/default-user.png" alt="Harry Jones"> -->
                <avatar :username="notification.from.name"></avatar>
            </div>
            <div class="notification-content">
                <small class="notification-timestamp">{{notification.created_at.date | moment().fromNow()}}</small>
                <h5 class="notification-heading">{{notification.from.name}}</h5>
                <p class="notification-text">
                    <small class="truncate">{{notification.text.plain}}</small>
                </p>
            </div>
            <button class="btn btn-primary btn-xs pull-right" 
                    :class="{'btn btn-primary  btn-xs spinner spinner-inverse spinner-sm' : spinner}" 
                    type="button"
                    @click.prevent="open_pedido"
                    >Ver Pedido
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
        props : ['notification'],
        mixins : [sleep, auth],
        components: {
            Avatar
        },

        data(){
            return {
                spinner : false
            }
        },

        methods : {

            async get_pedido  () {

                let payload = {
                    token : this.User.token,
                    code : this.notification.order_id
                }

                let pedido = await this.$store.dispatch('pedido_show', payload)
                    .catch((err) => {
                        console.log('EEEEEEError');
                        console.log(err);
                    }).finally(()=>this.spinner=false);

                if(pedido)
                {
                    let order = [];
                    order.push(pedido.data);
                    this.$store.commit('SET_PEDIDOS', order);
                }
            },

            remove_notification_from_sessionStorage()
            {
                let $vm = this;
                let tmp = JSON.parse(sessionStorage.getItem("vuex"));
                let messages = collect(tmp.Messages.received_messages);

                let result = messages.map((message, index) => {
                    if (message.order_id == $vm.notification.order_id) {
                        messages.splice(index);
                    }else{
                        return message;
                    }
                });
                tmp.Messages.received_messages = JSON.parse(result.filter().toJson());
                sessionStorage.removeItem("vuex");  
                sessionStorage.setItem('vuex', JSON.stringify(tmp));
            },

            async open_pedido(){
                let $vm = this;
                $vm.sleep(1500);
                let index = $vm.GetPedidos.findIndex(order => {
                    return order.meli_id == $vm.notification.order_id
                });

                if (index > -1) {
                    Event.$emit('open-order-from-notification', $vm.notification.order_id);
                    $vm.sleep(100);
                    
                    $vm.$store.commit('DELETE_RECEIVE_MESSAGE', $vm.notification.order_id);
                    this.remove_notification_from_sessionStorage();
                }else{
                    
                    let pathName = window.location.pathname;

                    if (pathName == '/pedidos/clientes/listado') {
                        $vm.$store.commit('DELETE_RECEIVE_MESSAGE', $vm.notification.order_id);
                        $vm.get_pedido();
                        this.remove_notification_from_sessionStorage();
                    }else{
                        $vm.$store.commit('DELETE_RECEIVE_MESSAGE', $vm.notification.order_id);
                        sessionStorage.setItem('order_id', $vm.notification.order_id);
                        this.remove_notification_from_sessionStorage();
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