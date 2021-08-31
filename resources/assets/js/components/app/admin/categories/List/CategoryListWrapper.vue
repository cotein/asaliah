<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
        <CategoryTable />
    </div>
</template>

<script>
import Loading from 'vue-loading-overlay';
import auth from '../../../../../mixins/auth';
import 'vue-loading-overlay/dist/vue-loading.css';
import CategoryTable from './CategoryTable';

    export default {
        
        mixins : [auth],

        components : {
            Loading, CategoryTable
        },

        data(){
            return {
                loading : false
            }
        },

        async mounted()
        {
            this.loading = true;

            let categories_list = await this.$store.dispatch('categories_list', this.User.token)
                .finally(()=> this.loading = false);
            console.log(categories_list);
            if (categories_list) {
                this.$store.commit('SET_CATEGORY_LIST', categories_list.data);
            }
            
                
        }

    }
</script>

<style lang="scss" scoped>

</style>