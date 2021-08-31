<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            v-model="attr_item_condition" 
            @input="updateAttrItemCondition" 
            track-by="name" label="name"
            :options="item_condition.conditions">
        </multiselect>
    </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields';
import {mapActions, mapState} from 'vuex';
import Multiselect from 'vue-multiselect'
export default {
    props : ['name'],
    components: {
        Multiselect
    },
    data() {
        return {
                       

        }
    },
    methods : {
         ...mapActions(['updateAttrItemCondition'])
    },
    computed : {
        ...mapState(['products', 'item_condition']),

        ...mapFields([
            'product.attr_item_condition',
        ]),
    },
    mounted(){
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

