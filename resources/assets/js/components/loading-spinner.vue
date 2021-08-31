<template>
    <vue-simple-spinner :size="size" :line-size="linesize" :font-size="fontsize" :message="message"></vue-simple-spinner>
</template>

<script>

import Spinner from 'vue-simple-spinner'
export default {
    props : ['linesize', 'fontsize', 'message', 'size'],
    components : {
        Spinner
    },
    data(){
        return {
        }
    }
}
</script>

<style>

</style>
