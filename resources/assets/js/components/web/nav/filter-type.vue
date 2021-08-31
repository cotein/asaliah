<template>
    <div @click.prevent="open_close()" class="tt-collapse" :class="{'open' : status}" >
        <h3 class="tt-collapse-title">{{filter[0].name}}</h3>
        <div class="tt-collapse-content" :style="(status) ? 'display:block' : 'display:none' ">
            <ul class="tt-options-swatch options-middle">
                <filter_link v-for="(type) in filter" :key="type.value_id" 
                :filter="type"></filter_link>
            </ul>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import filter_link from './filter-link';
import AttributeNameTransformer from './../../../src/AttributeNameTransformer';
export default {
    props : ['filter'],
    components : {
        filter_link
    },
    data(){
        return {
            status : true,
        }
    },
    methods : {
        open_close(){
            this.status = ! this.status;
        },

        TransformerName(name){

            let transformer_name = new AttributeNameTransformer;

            return transformer_name.transformer_attribute(name)
        }
    },

    watch : {
        status(n,o){
            console.log('nuevo ' + n);
            console.log('viejo ' + o);
        }
    },

    computed : {
        
    },

    mounted(){
       
    }
}
</script>

    