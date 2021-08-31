<template>
    <div class="form-group">
        <label class="col-sm-5 control-label" >Comprobantes de Venta</label>
        <div class="col-md-7">
            <multiselect placeholder="Elegir una opción" 
                track-by="name" label="name"
                :loading="show_spinner"
                v-model="value"
                :options="Vouchers">
            </multiselect>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../mixins/auth';
export default {
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            show_spinner : true,
            value : null
        }
    },

    methods : {
        getVouchers(){
            this.$store.dispatch('getVouchers', this.User.token).then((result) => {
                this.$store.commit('SET_VOUCHERS', result.data);
            }).catch((err) => {
                console.log(err);
            }).finally(()=>{
                this.show_spinner = false;
            })
        }
    },


    computed : {

        ...mapGetters([
            'Vouchers'
        ])
    },

    mounted() {
        this.getVouchers();
    }
}
</script>