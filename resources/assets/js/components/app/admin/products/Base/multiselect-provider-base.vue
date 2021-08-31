<template>
    <multiselect 
        placeholder="Encontrar Proveedor" 
        id="ajax"
        track-by="name" label="name"
        :loading="loading"
        :options="GetProvidersGetters"
        :value="SupplierGetter"
        @input="updateSupplierData"
        :searchable="true"
        :internal-search="false" 
        :clear-on-select="true" 
        @search-change="findSupplier"
        selectLabel="Seleccionar"
        selectedLabel="Seleccionado"
        deselectLabel="Remover"
        >
        
        <span slot="noOptions">
                Lista Vacía
        </span>
        <span slot="noResult">
                La búsqueda no arrojó resultados
        </span>
    </multiselect>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import Multiselect from 'vue-multiselect';

export default {
    components : {
        Multiselect
    },
}
</script>
