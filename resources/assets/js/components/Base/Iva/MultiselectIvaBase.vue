<template>
    <div >
        <label  >Iva</label>
        <multiselect placeholder="" 
            :value="IvaValue" 
            @input="updateIvaValue" 
            @select="selectedIva"
            track-by="name" 
            label="name"
            :options="ivas">
        </multiselect>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect'
export default {

    components: {
        Multiselect
    },
}
</script>


