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
                <voucher_type></voucher_type>
            </div>
        </div>
        <br>
        
        <component :is="component" :company="company"></component>
        <div id="www"></div>
    </div>
</template>

<script>
import DEBITO from './nota-debito';
import F from './factura';
import {Event} from 'vue-tables-2';
import auth from './../../../mixins/auth';
import company from './../../../mixins/company';
import Loading from 'vue-loading-overlay';
import voucher_type from './voucher-type';
import {mapGetters, mapActions} from 'vuex';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    mixins : [auth],
    components : {
        Loading, voucher_type,  F, DEBITO
    },

    data() {
        return {
            loading : false,
            component : 'F',
            company : null,
        }
    },

    methods: {
        
        setInitialStatus()
        {
            this.$store.commit('SET_INITIAL_PRODUCTS');
            this.$store.commit('SET_INITIAL_INVOICES');
        }

    },

    watch : {
        BillType(n){

            this.setInitialStatus();
            
            if (n == 'CREDITO' || n == 'DEBITO') {
                this.component = 'DEBITO'    
            }else{

                this.component = n;
            }
        }
    },

    computed : {
        ...mapGetters([
            'BillType',
        ])
    },

    mounted() {
        this.$store.dispatch('fetchIvas');
        
        this.$store.dispatch('get_company', this.User.token);
       
    },
   
}
</script>