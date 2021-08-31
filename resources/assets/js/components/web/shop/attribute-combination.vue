<template>
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{Name}}</h3>
        <div class="tt-collapse-content" style="display: block;">
            <ul class="tt-options-swatch options-middle">
                <attribute  v-for="(item, index) in attributes" :key="index" :attribute="item" :attributes="attributes"></attribute>
            </ul>
        </div>
    </div>
</template>
<script>
import collect from 'collect.js';
import attribute from './attribute';
import Multiselect from 'vue-multiselect';
export default {
    props : ['attributes'],
    components : {
        Multiselect,
        attribute
    },
    data() {
        return {
            data : null
        }
    },

    methods : {
       
    },

    computed : {
        Name(){
           return this.attributes[0].name;
        }, 
    },
    mounted() {
        
    },

}
</script>