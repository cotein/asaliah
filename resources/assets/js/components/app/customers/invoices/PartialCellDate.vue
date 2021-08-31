<template>
    <div>
        <p>{{invoiceDate()}}</p>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            invoiceDate(){
                let d = this.$moment(this.data.date);
                return d.format('DD-MM-YYYY');
            }
        },
       
    }
</script>