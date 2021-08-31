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
                <CustomerListTable/>
            </div>
        </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Loading from 'vue-loading-overlay';
import auth from './../../../mixins/auth';
import CustomerListTable from './CustomerListTable'
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    components : {
        Loading, CustomerListTable
    },
    
    mixins : [auth],

    data() {
        return {
            loading : false,
        }
    },

    computed : {

        
    },

    async mounted()
    {
        
    }
}
</script>

<style scoped>
    .top-15 {
        margin-top: 15px;
    }
</style>