<template>
    <div class="form-group">
        <label class="col-sm-3 control-label">Fecha</label>
        <datepicker 
            :language="es"
            :value="date"
            :format="customFormatter"
            :disabled-dates="DisabledDates"
            v-model="date"
            @selected="billDate"
        ></datepicker>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import {es} from 'vuejs-datepicker/dist/locale';
export default {
    components: {
        Datepicker
    },
    data() {
        return {
            es : es,
            date : new Date()
        }
    },

    computed : {

        DisabledDates(){
            return {
                to:  this.$moment(this.Today).subtract(6, 'days').toDate(),
                from: this.$moment(this.Today).add(5, 'days').toDate(),
            } 
        },

        Today(){
            return this.$moment(Date.now())
        },

       
    },

    methods: {
        customFormatter(date){
            return this.$moment(date).format("DD-MM-YYYY")
        },

        billDate(value){

            let date = this.$moment(value).format("YYYYMMDD");

            let vto =  this.$moment(value).add(30, 'days').format("YYYYMMDD");

            this.$store.commit('SET_BILL_DATE', {date, vto});
        }
    },
    mounted() {
        
        setTimeout(() => {
            this.billDate(this.date);
        }, 200);
    },

}
</script>

