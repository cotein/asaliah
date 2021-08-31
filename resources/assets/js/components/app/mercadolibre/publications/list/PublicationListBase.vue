<template>
    <div class="row">
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>

        <PublicationListTable />
        
        <div class="col-md-12 text-center">
            <paginate
                :page-count="pageCount"
                :click-handler="loadData"
                :prev-text="'Ant.'"
                :next-text="'Sig.'"
                :container-class="'pagination'">
            </paginate>
        </div>
    </div>
</template>

<script>
import Paginate from 'vuejs-paginate';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import PublicationListTable from './PublicationListTable';
export default {
    components : {
        PublicationListTable, Paginate, Loading
    },
    data() {
        return {
            pageCount : 1,
            loading : false,
        }
    },

    methods : {

        loadData(page=1)
            {
                this.loading = true;
                let url = '/api/publication_list/index?page=' + page;

                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
                    
                axios.get(url).then((response) => {
                    this.$store.commit('PUBLICATION_LIST_SET_PUBLICATIONS', response.data.data);
                    this.pageCount = response.data.pagination.last_page;
                }).catch((err) => {
                    
                }).finally(()=> this.loading = false);
            }
    },


    computed : {

        
        
    }, 

    watch : {

        
       
    },

    async mounted(){

        this.loadData();
       
        
    }
   

}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>