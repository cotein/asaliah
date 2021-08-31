<template>
    <multiselect placeholder="Categorías" 
            :ref="'www_' +index"
            track-by="name" label="name"
            :options="Categories"
            :value="CategoryValue"
            @input="updateCategoryValue"
            selectLabel=""
            @select="selectedCategory"
            @remove="removeCategory"
            selectedLabel=""
            :disabled="IsParentCategoryGetter"
            deselectGroupLabel=""
            :appendToBody = "{optionsZindex: 999, hideScrollLevel: 5}"
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
import Multiselect from 'vue-multiselect';

export default {

    components : {Multiselect},
    
}
</script>
