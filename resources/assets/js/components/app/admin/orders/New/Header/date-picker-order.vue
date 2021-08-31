
<script>
import {mapGetters} from 'vuex';
import Base from './../../../../../Base/DatePicker/Date-Picker-Base.vue';
export default {
    extends : Base,

    computed : {

        ...mapGetters([
            'DateOrderGetter'
        ]),

        date : {

            get(){
                return this.DateOrderGetter
            },
            set(value){
                this.$store.commit('NEW_ORDER_SET_DATE', value);
            }
        },

        disabledDate(){}
    },

    mounted(){
        this.$store.commit('NEW_ORDER_SET_DATE', new Date);
    }
}
</script>

<style scoped>
label {
    display: block;
}
</style>