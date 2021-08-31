<template>
    <InvoiceListTable />
</template>

<script>
    import {mapGetters} from 'vuex';
    import InvoiceListTable from './InvoiceListTable';
    import auth from './../../../../mixins/auth';
    export default {
        
        components : {
            InvoiceListTable
        },

        mixins : [auth],

        mounted() {
            this.$store.dispatch('get_company', this.User.token);
            
        }

    }
</script>

<style lang="scss" scoped>

</style>