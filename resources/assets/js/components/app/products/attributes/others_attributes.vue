<template>
    <div class="row">
        <div class="col-md-4" v-for="(attr, index) in OthersAttributes" :key="index">
            <div v-if="(attr.value_type == 'list' || attr.value_type == 'boolean' || attr.value_type == 'string' && Array.isArray(attr.values))">
                <others_attributes_multiselect :attr="attr" :name="attr.name" :options="attr.values" :index="index">

                </others_attributes_multiselect>
            </div>
            <div v-else>
                <others_attributes_input :attr="attr" :index="index">

                </others_attributes_input>
            </div>
        </div>
        <!--  <component :is="field.component" :key="index" :name="field.name" v-for="(index, attr) in Attributes" v-model="field.value">
            <div>{{field.value}}</div>
        </component> -->
    </div>      
</template>

<script>
import {mapGetters} from 'vuex';
import others_attributes_input from './others_attributes_input';
import others_attributes_multiselect from './others_attributes_multiselect';
export default {
    props : ['name'],
    components : {
        others_attributes_input,
        others_attributes_multiselect
    },
    data() {
        return {
            value : null,
            attributes : [],
        }
    },
    computed : {
        ...mapGetters(['OthersAttributes']),
    },
    mounted(){
    }
}
</script>

<style>
</style>
