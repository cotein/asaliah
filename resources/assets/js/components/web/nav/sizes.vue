<template>
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">TALLES</h3>
        <div class="tt-collapse-content">
            <ul class="tt-options-swatch options-middle">
                <size_link v-for="(size, index) in Sizes" :key="index" :size="size"></size_link>
            </ul>
        </div>
    </div>
</template>

<script>
import size_link from './size-link';
import {mapActions, mapState, mapGetters} from 'vuex';
import HandlerAttributeCombinations from './../../../src/HandlerAttributeCombinations';
import { collect } from 'collect.js';
export default {
    components : {size_link},
    data(){
        return {
            active_link : null,
        }
    },
    methods : {

    },

    computed : {
        ...mapGetters([
            'PublicationsWeb',
            'Sizes'
        ]),
    },

    watch: {
        
        PublicationsWeb(newValue){

            let hand_attr_combinations = new HandlerAttributeCombinations;

            let attribute_combinations = hand_attr_combinations.process_attribute_combinations(this.PublicationsWeb);

            let sizes = hand_attr_combinations.fetch_sizes(attribute_combinations);

            this.$store.commit('SET_SIZES', sizes);
            
        }
    },
   
}
</script>
<style scoped>
   
</style>
    