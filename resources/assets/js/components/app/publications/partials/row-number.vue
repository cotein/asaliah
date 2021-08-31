<template>
    <div>
        <p>{{rowNumber()}}</p>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            rowNumber(){
                return this.index;
            }
        },
        mounted() {
        },
    }
</script>
