<template>
    <div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 141px;">
                    <h5>Sincronizar cuenta desde Mercado Libre</h5>
                    <button 
                        @click="syncro()" 
                        :class="{'spinner spinner-inverse spinner-sm' : loading}"
                        class="btn btn-primary btn-lg" 
                        type="button" 
                        :disabled="loading"
                        >
                        Sincronizar
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 141px;">
                    <h5>Estado</h5>
                    <fade-transition>
                        <h4>{{(Message)?Message:''}}</h4>
                    </fade-transition>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 141px;">
                    <h5>Pedidos recientes</h5>
                    <button 
                        @click="recents()" 
                        :class="{'spinner spinner-inverse spinner-sm' : recent_loading}"
                        class="btn btn-primary btn-lg" 
                        type="button" 
                        :disabled="recent_loading"
                        >
                        Actualizar
                    </button>
                </div>
            </div>
        </div>
        <div class="row" >
            <fade-transition>
                <div class="col-md-4" v-if="publication_number">
                    <div class="card" style="background-color:#C3E2FD">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-middle media-left">
                                    <span class="bg-danger-inverse circle sq-48">
                                        <span class="icon icon-gift"></span>
                                    </span>
                                </div>
                                <div class="media-middle media-body">
                                    <div class="col-md-6 text-center">
                                        <h6 class="media-heading">PUBLICACIONES</h6>
                                        <h3 class="media-heading">
                                            <span class="fw-l">
                                                <strong>
                                                    <animated-number
                                                        :value="publication_number"
                                                        :formatValue="formatNumber"
                                                        :duration="1000"
                                                    />
                                                </strong>
                                            </span>
                                        </h3>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <h6 class="media-heading">ACTUALIZADAS</h6>
                                        <h3 class="media-heading">
                                            <fade-transition>
                                                <span class="fw-l">
                                                    <strong>{{publication_updated}}</strong>
                                                </span>
                                            </fade-transition>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fade-transition>
            <fade-transition>
                <div class="col-md-4 col-md-offset-8" v-if="order_number">
                    <div class="card" style="background-color:#C3E2FD">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-middle media-left">
                                    <span class="bg-danger-inverse circle sq-48">
                                        <span class="icon icon-gift"></span>
                                    </span>
                                </div>
                                <div class="media-middle media-body">
                                    <div class="col-md-6 text-center">
                                        <h6 class="media-heading">PEDIDOS</h6>
                                        <h3 class="media-heading">
                                            <span class="fw-l">
                                                <strong>
                                                    <animated-number
                                                        :value="order_number"
                                                        :formatValue="formatNumber"
                                                        :duration="1000"
                                                    />
                                                </strong>
                                            </span>
                                        </h3>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <h6 class="media-heading">ACTUALIZADAS</h6>
                                        <h3 class="media-heading">
                                            <fade-transition>
                                                <span class="fw-l">
                                                    <strong>{{order_updated}}</strong>
                                                </span>
                                            </fade-transition>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fade-transition>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
import collect from 'collect.js';
import auth from './../../../mixins/auth';
import busVue from '../../../extras/eventBus';
import AnimatedNumber from "animated-number-vue";
import toast_mixin from './../../../mixins/toast-mixin';

export default {
    components : {AnimatedNumber},
    mixins : [auth, toast_mixin],
    data() {
        return {
            loading : false,
            recent_loading : false,
            message : false,
            publication_number : false,
            publication_updated : 0,
            order_number : false,
            order_updated : 0
        }
    },
    methods : {

        formatNumber(number)
        {
           return  new Intl.NumberFormat("de-DE").format(number)
        }, 

        get_item(item){
            return this.sleep(1000).then(() => item);
        },
        sleep(ms) {
           return new Promise(resolve => setTimeout(resolve, ms));
        },

        response(response) {

            if (response.status == 200) {
                this.info_message('Sincronización', 'Esta publicación ya ha sido sincronizada', 500);
            }

            if (response.status == 201) {
                this.success_message('Sincronización', 'Actualizada correctamente', 500);
            }

            if (response.status == 500) {
                this.error_message('Sincronización', 'Ha ocurrido un error', 500);
            }
        },

        async syncro()
        {
            this.loading = true;
            this.message = 'Comprobando publicaciones...';
            await this.$store.dispatch('publications_id', this.User.token);
            this.message = false;

            if (this.GetPublicationsIds) {
                let ids = collect(this.GetPublicationsIds);
                this.publication_number = ids.count();
                await this.sleep(500);
                this.message = 'Sincronizando ...';
                do {
                    let id = ids.pop();
                    let delay_id = await this.get_item(id);
                    let response = await this.$store.dispatch('save_product_by_id', {token:this.User.token, product_id:id});
                    console.log(response);
                    if (response) {
                        if (response.status == 201) {
                            this.publication_updated = this.publication_updated + 1;
                        }
                        this.response(response);
                    }
                } while (ids.count() > 0);

                this.loading = false;
                this.message = false;
                await this.sleep(500);
                this.message = 'Sincronización correcta';
            }
        },

        async recents()
        {
            this.recent_loading = true;
            this.message = 'Buscando órdenes...';
            let orders = await this.$store.dispatch('orders_by_seller_recent', this.User.token);
            this.sleep(1000);

            if (this.GetRecentsOrders) {
                
                let orders = collect(this.GetRecentsOrders);
                this.order_number = orders.count();
                this.message = 'Guardando ...';

                do {
                    let order = orders.pop();
                    let delay_order = await this.get_item(order);
                    let response = await this.$store.dispatch('save_order_from_meli',
                        {
                            token:this.User.token, 
                            order:delay_order
                        });
                    console.log(response);
                    if (response) {
                        if (response.status == 201) {
                            this.order_updated = this.order_updated + 1;
                        }
                        this.response(response);
                    }
                } while (orders.count() > 0);

            }
            this.recent_loading = false;
            this.message = false;
        },
    },

    computed : {
        ...mapGetters([
            'MessageOk',
            'InfoOk',
            'UserToken',
            'GetPublicationsIds',
            'PublicationsTotal',
            'ErrorNotification',
            'GetRecentsOrders'
        ]),

        Message()
        {
            return this.message
        },

        Class(){
            if (this.loading) {
                return 'spinner spinner-inverse spinner-sm';
            }
            return '';
        },

    },

    mounted() {

        //this.$store.dispatch('orders_by_seller_recent', payload);
        
    },
}
</script>

<style>

</style>
