<template>
    <div class="row">
        <div class="col-md-4" v-for="(attr, index) in AllowVariationsAttributes" :key="index">
            <div v-if="(attr.value_type == 'list' || attr.value_type == 'boolean' || IsList(attr))">
                <allow_variation_multiselect :attr="attr" :name="attr.name" :options="attr.values" :index="index">

                </allow_variation_multiselect>
            </div>
            <div v-else>
                <allow_variation_input :attr="attr" :index="index">   

                </allow_variation_input>
            </div>
        </div>
        <!--  <component :is="field.component" :key="index" :name="field.name" v-for="(index, attr) in Attributes" v-model="field.value">
            <div>{{field.value}}</div>
        </component> -->
    </div>      
</template>

<script>
import {mapGetters} from 'vuex';
import allow_variation_input from './allow_variation_input';
import allow_variation_multiselect from './allow_variation_multiselect';
import collect from 'collect.js';

export default {
    props : ['name'],
    components : {
        allow_variation_input,
        allow_variation_multiselect
    },
    data() {
        return {
            value : null,
            attributes : [],
        }
    },
    computed : {
        ...mapGetters(['AllowVariationsAttributes']),
    },

    methods: {
        IsList(attr){
            let attribute = collect(attr);
            if (attribute.has('values')) {
                return true;
            }

            return false;
        }
    },

}
</script>

<style>
</style>
