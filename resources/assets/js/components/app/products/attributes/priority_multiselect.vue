<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir prioridad" 
            v-model="priority" 
            @select="selectPriority()"
            :options="priorities">
        </multiselect>
    </div>
</template>

<script>
import busVue from './../../../../extras/eventBus';
import { mapFields } from 'vuex-map-fields';
import {mapActions, mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect'
export default {
    props : ['name'],
    components: {
        Multiselect
    },
    data() {
        return {
            priority : 10,
            priorities : [1,2,3,4,5,6,7,8,9,10]
        }
    },
    methods : {
        selectPriority(priority){
            this.priority = priority;

            setTimeout(() => {
                this.$store.commit('ADD_PRIORITY', this.priority);
            }, 500);
        },
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

