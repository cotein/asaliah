<template>
    <div class="text-center">
        {{PedidoDate}}
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import {es} from 'vuejs-datepicker/dist/locale';
export default {
    props : ['data'],
    components: {
        Datepicker
    },
    data() {
        return {
           date : null
        }
    },

    computed : {

        PedidoDate()
        {
            return this.date;
        }
       
    },

   
    mounted() {
        this.$moment.locale('es');
        let str = this.data.created_on_meli;
        //let date = this.$moment(str);
        let date = this.$moment(str);
        console.log(date);
        let dateComponent = date.utc().format('DD-MM-YYYY');
        //let date = this.data.created_on_meli.substring(0,10);
        this.date = this.data.created_on_meli;
        //this.date = this.$moment(this.data.created_on_meli, this.$moment.ISO_8601, true).format('DD-MM-YYYY') 
    },

}
</script>

