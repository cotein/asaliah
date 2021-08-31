<template>
    <button 
        class="btn btn-primary" 
        type="submit"
        :disabled="IsDisabled"
        :class="{'spinner spinner-inverse spinner-sm' : spinner}"
        @click.prevent="searchOnAfip"
    >Buscar en AFIP</button>
</template>
<script>
export default {
    data(){
        return {
            spinner : false
        }
    }
}
</script>