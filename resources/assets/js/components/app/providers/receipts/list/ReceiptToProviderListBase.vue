<template>
    <div class="row">
        <div class="col-md-12">
            <loading 
                :active.sync="loading" 
                color="#0469c7"
                :can-cancel="false" 
                :is-full-page="true">
            </loading>
            <div class="col-md-7">
               <ProviderFindByName />
            </div>
            <ReceiptToproviderListTable />
            <div class="text-center">
                <paginate
                    :page-count="pageCount"
                    :click-handler="loadData"
                    :prev-text="'Ant.'"
                    :next-text="'Sig.'"
                    :container-class="'pagination'">
                </paginate>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Paginate from 'vuejs-paginate'
import Loading from 'vue-loading-overlay';
import auth from './../../../../../mixins/auth';
import 'vue-loading-overlay/dist/vue-loading.css';
import ProviderFindByName from './../../ProviderFindByName';
import ReceiptToproviderListTable from './ReceiptToProviderListTable';
import ReceiptToproviderListHeader from './ReceiptToProviderListHeader';
    export default {
        components : {
            Loading, ReceiptToproviderListHeader, ReceiptToproviderListTable, Paginate,
            ProviderFindByName
        },
        data(){
            return {
                loading : false,
                pageCount : 1,
            }
        },

        computed : {

            ...mapGetters([
                'SelectedProviderGetter'
            ])
        },
        
        watch : {

            SelectedProviderGetter(n)
            {
                this.loadData();
            }
        },

        methods : {

            loadData(page=1)
            {
                this.loading = true;
                let url = '/api/provider/receipt/list?page=' + page;

                if (this.SelectedProviderGetter) {
                    url = url + '&provider='+this.SelectedProviderGetter.id;
                }

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.get(url).then((response) => {
                    this.$store.commit('SET_RECEIPT_TO_PROVIDER_LIST', response.data.data);
                    this.pageCount = response.data.pagination.last_page;
                    //this.options.groupMeta = customers_data;
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
            }
            
        },

        async mounted(){
            
            this.loadData();
            await this.$store.dispatch('get_company', this.User.token);

        }
    }
</script>

<style lang="scss" scoped>

</style>