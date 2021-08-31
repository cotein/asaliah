<template>
  <div>
      <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="row">
            <div class="col-md-12">
                <PedidoListTable :paginati="www" />
            </div>
        </div>
  </div>
</template>

<script>
import ReciboBasePdf from './../../../src/Pdf/Recibo/ReciboBasePdf';
import {mapGetters} from 'vuex';
import Loading from 'vue-loading-overlay';
import auth from './../../../mixins/auth';
import PedidoListTable from './PedidoListTable';
import 'vue-loading-overlay/dist/vue-loading.css';
import toast_mixin from './../../../mixins/toast-mixin';
export default {
    components : {
        Loading, PedidoListTable
    },
    
    mixins : [auth, toast_mixin],

    data() {
        return {
            loading : false,
            www : {}
        }
    },

    async mounted()
    {
        this.$store.dispatch('get_company', this.User.token);
        /* let p = await this.$store.dispatch('publications_id', this.User.token);
        console.log(p); */

        let provinces = await this.$store.dispatch('getProvinces', this.User.token);

        if (provinces) {
            this.$store.commit('SET_PROVINCES', provinces.data);
        }

    }
}
</script>

<style scoped>
    .top-15 {
        margin-top: 15px;
    }
</style>