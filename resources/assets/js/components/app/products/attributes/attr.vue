<template>
    <multiselect 
        v-model="value" 
        :option-height="100"
        placeholder="Color" 
        label="name" track-by="name" 
        :options="colour.colours" 
        :show-labels="false">
        <template slot="option" slot-scope="props">
            <span :style="{ 'background-color': '#'+props.option.rgb }" class="bg-primary circle sq-40">
            </span>
                <p style="margin-right:31px; color:ccc">{{ props.option.name }} </p>
        </template>
    </multiselect>
</template>

<script>
import Multiselect from 'vue-multiselect';
import {mapActions, mapState} from 'vuex';

export default {
    components: {
        Multiselect
    },
    data() {
        return {
            value : null
        }
    },
    computed : {
         ...mapState(['colour'])
    },
}
</script>

<style>
</style>
