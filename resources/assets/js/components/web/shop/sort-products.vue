<template>
    <div class="tt-sort">   
        Ordenar de:
        <select name="sortBy" id="sortBy" @change="sortBy(sortType)" v-model="sortType">
            <option disabled selected="selected"> -- Seleccionar una opción -- </option>
            <option v-for="(item, index) in sortOptions" :value="item.value" :key="index">{{item.text}}</option>
        </select>
    </div>
</template>

<script>
import {Event} from 'vue-tables-2';
export default {
    data(){ 
        return {
            sortType: null,
            sortOptions: [
                { text: 'Menor a Mayor Precio', value: 1 },
                { text: 'Mayor a Menor Precio', value: 2 },
            ]
        }
    },
    methods : {
        sortBy(value){
            this.$store.dispatch('lowestAtHighestPrice', value);
            Event.$emit('sort');
        }
    },
   
}
</script>