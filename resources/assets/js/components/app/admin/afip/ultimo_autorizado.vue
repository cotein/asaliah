<template>
    <form class="form form-horizontal">
        <div class="form-group">
            <div class="col-xs-4 col-sm-3 col-sm-offset-1">
                <div class="input-group">
                <span class="input-group-addon">Sucursal</span>
                <vue-autonumeric 
                    class="form-control"
                ></vue-autonumeric>
                </div>
            </div>
            <div class="col-xs-4 col-sm-3">
                <div class="input-group">
                <span class="input-group-addon">Número</span>
                    <vue-autonumeric 
                    class="form-control"
                ></vue-autonumeric>
                
                </div>
            </div>
            <div class="col-xs-4 col-sm-3">
                <div class="input-group">
                <span class="input-group-addon">Tipo Comprobante</span>
                <input class="form-control" type="text" value="0.69" aria-label="British Pound">
                </div>
            </div>
        </div>
        {{Vouchers}}
    </form>
</template>

<script>
    import {mapGetters} from 'vuex';
    import auth from './../../../../mixins/auth';
    import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        mixins : [auth],

        components : {
            VueAutonumeric
        },

        computed : {

            ...mapGetters([
                'Vouchers'
            ])
        },

        async mounted()
        {
            let vouchers = await this.$store.dispatch('getVouchers', this.User.token)
            .catch((err) => {
                console.log(err, 'aaaaaaaaaaaaaaaaaaaaaaaa');
            });

            if (vouchers) {
                this.$store.commit('SET_VOUCHERS', vouchers.data);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>