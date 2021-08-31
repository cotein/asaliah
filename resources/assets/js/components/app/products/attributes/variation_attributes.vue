<template>
    <div class="row">
        <div class="col-md-4" v-for="(attr, index) in VariationAttributes" :key="index">
            <div v-if="attr.value_type == 'list'">
                <variation_attribute_multiselect :attr="attr" :name="attr.name" :options="attr.values" :index="index">

                </variation_attribute_multiselect>
            </div>
            <div v-else>
                <variation_attribute_input :attr="attr" :index="index">

                </variation_attribute_input>
            </div>
        </div>
       <!--  <component :is="field.component" :key="index" :name="field.name" v-for="(index, attr) in Attributes" v-model="field.value">
            <div>{{field.value}}</div>
        </component> -->
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import variation_attribute_input from './variation_attribute_input';
import variation_attribute_multiselect from './variation_attribute_multiselect';
export default {
    props : ['name'],
    components : {
        variation_attribute_input,
        variation_attribute_multiselect
    },
    data() {
        return {
            value : null,
            attributes : [],
        }
    },
    computed : {
        ...mapGetters(['VariationAttributes']),
    },
    mounted(){
    }
}
</script>

<style>
</style>
