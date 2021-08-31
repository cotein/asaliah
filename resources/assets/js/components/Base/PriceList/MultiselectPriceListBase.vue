<template>
    <div id="price-list-multiselect">
        <label>Lista de Precio</label>
        <multiselect placeholder="Buscar producto" 
            id="ajax"
            :class="'multiselect_price_list_index_' + index"
            track-by="name" 
            label="name"
            selectLabel="Seleccionar"
            deselectLabel="Deseleccionar"
            :loading="show_spinner"
            :options="price_list"
            :value="PriceListValue"
            @input="updatePriceListValue"
            :searchable="true"
            :clear-on-select="false" 
            @select="selectedPriceList"
            >
        
        </multiselect>
    </div>
</template>

<script>

import Multiselect from 'vue-multiselect';

export default {
    
    props : ['index'],

    components : {Multiselect},

}

</script>

