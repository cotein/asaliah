<template>
    <button 
        v-tooltip="tooltip"
        @click="delete_item" 
        type="button"
        class="btn btn-outline-danger btn-icon sq-24"
        :disabled="IsDisabled"
        :class="{'btn btn-danger spinner spinner-inverse spinner-sm' : spinner}"
        >
        <span class="icon icon-trash"></span>
    </button>
</template>
<script>

export default {

    props : {
        tooltip : {
            default() { return 'Eliminar'; },
            type : String
        },
        index : {
            type : Number
        }
    },

    data() {
        return {
            spinner : false
        }
    }
}
</script>
<style scoped>
    /* .icon{
        font-size:3rem
    }
    .size{
        height: 5rem;
        width : 5rem;
    } */
</style>
