<template>
    <button @click="addVariation()" class="btn btn-primary">Agregar Variación</button>
</template>

<script>
import {mapActions} from 'vuex';

export default {
    data() {
        return {
            
        }
    },
    methods: {
        ...mapActions(['addVariation']),
        
    },
}
</script>

<style>

</style>
