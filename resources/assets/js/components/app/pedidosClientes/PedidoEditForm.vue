<template>
  <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="row">
            <div class="col-md-6">
                <h2>Pedido #</h2>
                <small>77777777777</small>
            </div>
            <div class="col-md-6">
                <small>Cliente</small>
                <h2>wwwww wwww wwww</h2>
            </div>
            <div class="col-md-6" style="margin-top:15px">
                <PedidoDate />
            </div>
            <div class="col-md-12" style="margin-top:15px">
                <PedidoTable />
            </div>
        </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';
import PedidoTable from './PedidoTable';
import Loading from 'vue-loading-overlay';
import auth from './../../../mixins/auth';
import 'vue-loading-overlay/dist/vue-loading.css';
import toast_mixin from './../../../mixins/toast-mixin';
import PedidoDate from './../pedidosClientes/PedidoDate';
export default {
    props : ['code'],
    components : {
        Loading, PedidoTable, PedidoDate
    },
    
    mixins : [auth],

    data() {
        return {
            loading : false,
            tnp : null
        }
    },

    methods : {

        
    },

    async mounted(){
        this.loading = true;
        let payload = {
            token : this.User.token,
            code : this.code
        }
        let pedido = await this.$store.dispatch('pedido_show', payload);

        if (pedido) {
            this.tmp = pedido.data;
            console.log(pedido.data);
            this.$store.commit('SET_ITEMS_TO_PEDIDO', pedido.data.items);
        }

        this.loading = false;
    }

    
}
</script>

<style scoped>
    .top-15 {
        margin-top: 15px;
    }
</style>