<template>
    <div class="form-group">
        <label class="col-sm-4 control-label">Fecha</label>
        <div class="col-sm-8">
            <datepicker 
                :language="es"
                :value="date"
                :format="customFormatter"
                :disabled-dates="DisabledDates"
                v-model="date"
                @selected="delivery_date"
                input-class="my-input"
            ></datepicker>
        </div>
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
            } 
        },

        Today(){
            return this.$moment(Date.now());
        },
    },

    methods: {
        
        customFormatter(date){
            return this.$moment(date).format("dddd D [de] MMMM [de] YYYY");
        },

        delivery_date(value){

            let date = this.$moment(value).format("YYYYMMDD");

            this.$store.commit('SET_DELIVERY_DATE', date);
        }
    },

    mounted() {
        this.$moment.locale('es');
        setTimeout(() => {
            this.delivery_date(this.date);
        }, 200);
    },

}
</script>

