<template>
    <div>
        <multiselect 
            :searchable="true" 
            v-model="state" 
            :loading="loading"
            :disabled="(data) ? ! data.status || data.type_id == 2 : false"
            placeholder="Buscar provincia" 
            label="name" track-by="name" 
            :options="Provinces" 
            :show-labels="false">
        </multiselect>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import sleep from './../../../../mixins/sleep-mixin';
import toast from './../../../../mixins/toast-mixin';
export default {
    props : ['data'],

    components : {
        Multiselect
    },
    mixins : [sleep, toast],
    
    data() {
        return {
            state : {id:null,name:null},
            loading : false
        }
    },

    computed : {
        ...mapGetters([
            'Provinces'
        ])
    },

    
   
}
</script>