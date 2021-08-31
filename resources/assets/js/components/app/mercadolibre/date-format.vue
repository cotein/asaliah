<template>
    <div>
        <span>{{ DateFormat()}}</span>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            rowNumber(){
                return this.index;
            },
            DateFormat(){
                let d = this.$moment(this.data.start_time);
                return d.utc().format('DD-MM-YYYY');
            }
        },
        computed : {
            
        },
       
    }
</script>
