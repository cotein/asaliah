<template>
    <div class="form-group">
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
            console.log(el);
            $vm.attribute.id = $vm.attr.id;
            $vm.attribute.value_id = el.id;
            $vm.attribute.value_name = el.name
        }
    },
    mounted() {
        let $vm = this;
        
        busVue.$on('send_variation_attribute', ()=>{
            setTimeout(() => {
                $vm.$store.commit('ADD_OTHER_ATTRIBUTE', $vm.attribute);
                //console.log('Index Multiselect : '+ $vm.index + ' ' + Date.now());
               
            }, 10 * $vm.index + 1 );

        })
    },
}
</script>

<style>
</style>
