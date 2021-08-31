<template>
    <div>
        <button 
            @click="goTo" 
            v-tooltip="'Editar producto'"
            class="btn btn-default btn-icon sq-32" 
            type="button">
            <span class="icon icon-pencil"></span>
        </button>
    </div>
</template>
<script>
import edit_button_mixin from './../../../mixins/Products/EditProduct';
    export default {
        
        mixins : [edit_button_mixin],
       
    }
</script>