<template>
    <div >
        <radio name="color" :value="color" v-model="c" @input="changeInput()" :checked="checked">
            <!-- <div class="btn btn-icon sq-20" :style="{'margin-left':'5px', 'margin-right':'5px', 'padding-left':'5px', 'padding-right':'5px', 'background':RGB}"></div>  -->
            <span class="icon icon-tag icon-3x" :style="{'color':RGB}"></span>
            {{Color}}
        </radio>
    </div>
</template>

<script>
import collect from 'collect.js';
import busVue from './../../../../extras/eventBus';
import {Radio} from 'vue-checkbox-radio';
export default {
    props : ['color', 'variations'],
    components : {
        Radio
    },
    data() {
        return {
            c : null,
            checked : false
        }
    },
    methods : {
        changeInput(){
            let color = {
                id : 'color',
                value_id : this.c.id,
                value_name : this.c.name,
            }
            busVue.$emit('selected_color', color);
        }
    },
    computed:{
        Color(){
            return this.color.name;
        },
        RGB(){
            return '#' + this.color.metadata.rgb
        },
       /*  Disabled(){
            let $vm = this;
            let result = false;

            collect($vm.variations).each((item, index)=>{
                collect(item.attribute_combinations).each((attr)=>{
                    if (attr.id == 'color' && attr.value_name == $vm.color.name) {
                         result = true;
                    }
                })
            });

            return result;
        }, */
        mounted() {
            
        },
    },
}
</script>

<style scope>
    .shadow {
        opacity: 0.7;
    }
</style>
