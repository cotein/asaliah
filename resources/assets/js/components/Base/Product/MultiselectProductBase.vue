<template>
    <div id="product-multiselect">
        <label>Producto</label>
        <multiselect placeholder="Buscar producto" 
            id="ajax"
            :class="'multiselect_product'"
            track-by="name" 
            label="name"
            selectLabel="Seleccionar"
            deselectLabel="Deseleccionar"
            :loading="show_spinner"
            :options="products"
            :value="ProductValue"
            @input="updateProductValue"
            :searchable="true"
            :internal-search="true" 
            :clear-on-select="false" 
            @search-change="asyncFind"
            @select="selectedProduct"
            >
            <!-- <template slot="singleLabel" slot-scope="props">
                <img class="option__image" :src="props.option.thumbnail" alt="Sin Imagen">
                <span class="option__desc">
                    <span class="option__title">{{ props.option.name }}</span>
                </span>
            </template>
            <template slot="option" slot-scope="props">
                <img class="option__image" :src="props.option.thumbnail" alt="Sin Imagen">
                <div class="option__desc">
                    <span class="option__title">{{ props.option.name }}</span>
                </div>
            </template> -->
        
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

