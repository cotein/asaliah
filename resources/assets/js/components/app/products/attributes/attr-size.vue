<template>
    <div >
        <radio name="size" :value="size" v-model="s" @input="changeInput()">
            {{Size}}
        </radio>
    </div>
</template>

<script>
import collect from 'collect.js';
import busVue from './../../../../extras/eventBus';
import {Radio} from 'vue-checkbox-radio';
export default {
    props : ['size', 'variations'],
    components : {
        Radio
    },
    data() {
        return {
            s : null,
        }
    },
    methods: {
        changeInput(){
            let size = {
                id : 'size',
                value_id : this.s.id,
                value_name : this.s.name,
            }
            busVue.$emit('selected_size', size);
        }
    },
    computed:{
        Size(){
            return this.size.name;
        },

        /* Disabled(){
            let $vm = this;
            let result = false;

            collect($vm.variations).each((item, index)=>{
                collect(item.attribute_combinations).each((attr)=>{
                    if (attr.id == 'size' && attr.value_name == $vm.size.name) {
                         result = true;
                    }
                })
            });
            
            return result;
        } */
    },
}
</script>

<style scope>
 .shadow {
        opacity: 0.7;
    }
</style>
