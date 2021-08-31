<template>
    <div class="form-group has-error">
        <label>{{name}}</label>
        <multiselect 
            v-model="value" 
            label="name" track-by="name" 
            :options="options" 
            @select="GiveItFormat"
            :show-labels="false">
        </multiselect>
        <small class="help-block" v-if="HasAllowVariation">Campo requerido</small>
    </div>
</template>

<script>
import busVue from './../../../../extras/eventBus';
import Multiselect from 'vue-multiselect';
import {mapActions, mapState} from 'vuex';
import collect from 'collect.js';
export default {
    props : ['options', 'name', 'index', 'attr'],
    components: {
        Multiselect
    },
    data() {
        return {
            value : null,
            attribute : {
                id : null,
                value_id : null,
                value_name : null
            }
        }
    },
    computed : {
        HasAllowVariation(){
            let tags = collect(this.attr.tags);

            if (tags.has('allow_variations')) {
                return true;
            }

            return false;
        }
    },
    
    methods: {
        GiveItFormat(el){
            let $vm = this;
            let attributes = collect($vm.attr);
            $vm.attribute.id = $vm.attr.id;
            $vm.attribute.value_id = el.id;
            $vm.attribute.value_name = el.name;
        }
    },
    mounted() {
        let $vm = this;
        
        busVue.$on('send_allow_variation_attribute', ()=>{
            setTimeout(() => {
                $vm.$store.commit('ADD_ALLOW_VARIATION_ATTRIBUTE', $vm.attribute);
            }, 100 * $vm.index + 1 );
        });

        busVue.$on('give_me_attribute_combinations', () => {
            setTimeout(() => {
               busVue.$emit('send_you_attribute_combinations', $vm.attribute) 
            }, 71  );
        });

    },
}
</script>

<style>
</style>
