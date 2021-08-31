<template>
    <div>
        <filter_type v-for="(filter_type, index) in FilterTypes" :key="index" :filter="filter_type">

        </filter_type>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import filter_type from './filter-type';
import HandlerAttributeCombinations from './../../../src/HandlerAttributeCombinations';
export default {
    components : {
        filter_type
    },

    watch: {
        
        PublicationsWeb(newValue){

            let hand_attr_combinations = new HandlerAttributeCombinations;

            let attribute_combinations = hand_attr_combinations.process_attribute_combinations(this.PublicationsWeb);

            let types = hand_attr_combinations.fetch_keys(attribute_combinations);
            console.log('////// tipo');
            console.log(types);
            let filters = hand_attr_combinations.filter_types(types, attribute_combinations)

            this.$store.commit('SET_FILTER_TYPES', filters);

            console.log('////// viene filters');
            console.log(filters);
            console.log('////// finaliza filters');

        }
    },
    
    computed : {

        ...mapGetters([
           'PublicationsWeb',
           'FilterTypes'
        ]),
        
    },
}
</script>

    