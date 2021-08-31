
<template>
    <div>
        <button
            @click="updateData()"
            data-toggle="modal" 
            data-target="#warningModalAlert"  
            class="btn btn-outline-primary btn-icon sq-32" 
            type="button">
            <span class="icon icon-dollar"></span>
        </button>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loading from 'vue-loading-overlay';
    import auth from './../../../../mixins/auth';
    export default {
        props: ['data', 'index'],
        mixins : [auth],
        methods : {
            updateData(){
                setTimeout(() => {
                    this.$store.commit('BILLIABLE_ALERT', this.data);
                }, 100);
            },
        },
        computed : {
            ...mapGetters([
                'BillButtonShowSpinner',
            ]),

            Spinner(){
                if(this.data.show_spinner){
                    return true;
                }
                return false;
            }
        },
    }
</script>
<style slot-scope>
    .label-success {
        background-color: green;
    }
</style>
