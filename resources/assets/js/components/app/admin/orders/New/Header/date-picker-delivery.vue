<script>
import {mapGetters} from 'vuex';
import Base from './../../../../../Base/DatePicker/Date-Picker-Base.vue';

export default {
    
    extends : Base,

    computed : {

        ...mapGetters([
            'DateOrderGetter',
            'DeliveryDateOrderGetter',
        ]),

        date : {

            get(){
                return this.DeliveryDateOrderGetter;
            },
            set(value){
                this.$store.commit('NEW_ORDER_SET_DELIVERY_DATE', value);
            }
        },

        disabledDate(date) {

        //return new Date(2021, 11, 11) 
        }
    },

    watch : {

        DateOrderGetter(n){

            console.log(n);
            /* let d = this.$moment(n);
            let dd = this.$moment(n)
            console.log(d.format('DD/MM/YYYY'), dd.add(10, 'days').format('DD/MM/YYYY'));

            let q = this.disabledDate(d);
            console.log(q); */
        }

    },

    methods : {

       /*  disabledDate(date){
            let first_century_day = this.$moment('01/01/1900');
            return date.diff(first_century_day, 'days');
        } */
    }


}
</script>