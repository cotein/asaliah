<template>
<div >
    <label >{{title}}</label>
    <date-picker 
        v-model="date"  
        format="DD-MM-YYYY"
        :disabled-date="disabledDate"
    >
    </date-picker>
</div>
</template>
<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {

    props: {
        title: {
            default: 'Fecha',
            type: String
        },
    },

    components: { DatePicker},    
}
</script>
