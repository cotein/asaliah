import {mapActions, mapGetters} from 'vuex';
export default {

    methods : {

        async findSupplier (query) {
            let payload = {
                token : this.User.token,
                provider : query
            }

            await this.$store.dispatch('provider_find_by_name', payload);
        },

        ...mapActions([
            'updateSupplierData'
        ])
    },

    computed : {

        ...mapGetters([
            'GetProvidersGetters',
            'SupplierGetter'
        ])
    },
}