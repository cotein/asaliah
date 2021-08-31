<template>
    <div>
        <span>{{ Price() | currency}}</span>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            rowNumber(){
                return this.index;
            },
            Price(){
                return this.data.price
            }
        },
        computed : {
            
        },
       
    }
</script>
