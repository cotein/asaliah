<template>
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">COLORES</h3>
        <div class="tt-collapse-content">
            <ul class="tt-options-swatch options-middle">
                <color_link v-for="(color, index) in Colors" :key="index" :color="color"></color_link>
            </ul>
        </div>
    </div>
</template>

<script>
import color_link from './color-link';
import {mapActions, mapState, mapGetters} from 'vuex';
import HandlerAttributeCombinations from './../../../src/HandlerAttributeCombinations';
import { collect } from 'collect.js';
export default {
    components : {color_link},
    data(){
        return {
            active_link : null,
            colors : []
        }
    },
    methods : {

    },

    computed : {
        ...mapGetters([
            'Colors',
            'PublicationsWeb',
        ]),

    },

    watch: {
        
        PublicationsWeb(newValue){
            
            let hand_attr_combinations = new HandlerAttributeCombinations;

            let attribute_combinations = hand_attr_combinations.process_attribute_combinations(this.PublicationsWeb);

            let colors = hand_attr_combinations.fetch_colors(attribute_combinations);

            this.$store.commit('SET_COLORS', colors);
        }
    },

    mounted(){
        
        
    }
}
</script>
<style scoped>
   
</style>
    