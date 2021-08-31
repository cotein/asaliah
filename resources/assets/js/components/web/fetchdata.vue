<template>
    
</template>

<script>
export default {
    data(){
        return {

        }
    },
    methods : {
        getPublications(){
            this.$store.dispatch('getPublications')
        },
       
    },
    mounted(){
       
        this.getPublications();
        
    }
}
</script>