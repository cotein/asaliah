<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
        <ActivateUserList />
    </div>
</template>

<script>
import Loading from 'vue-loading-overlay';
import auth from './../../../../mixins/auth'
import 'vue-loading-overlay/dist/vue-loading.css';
import ActivateUserList from './ActivateUserList';

    export default {
        mixins : [auth],
        components : {
            Loading, ActivateUserList
        },
        data(){
            return {
                loading : false
            }
        },
        async mounted()
        {
            this.loading = true;

            await this.$store.dispatch('getUserList', this.User.token)
                .finally(()=> this.loading = false);
            
            await this.$store.dispatch('getRolesList', this.User.token);
                
        }

    }
</script>

<style lang="scss" scoped>

</style>