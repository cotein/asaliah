import Datepicker from 'vuejs-datepicker';
import {es} from 'vuejs-datepicker/dist/locale';

export default {
    components : {
        Datepicker
    },
    data(){
        return {
            es:es
        }
    },

    methods : {

        customFormatter(date){
            return this.$moment(date).format("DD/MM/YYYY");
        },

    }
}