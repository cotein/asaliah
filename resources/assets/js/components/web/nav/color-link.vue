<template>
    <li >
        <a @click.prevent="apply_color_filter"  href="#">{{color.value_name}}</a>
    </li>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
export default {
    props : ['color'],
    components : {
    },
    data(){
        return {
            selected : false
        }
    },
    
    methods : {
        apply_color_filter(){

            this.$store.commit('ADD_COLOR_FILTER', this.color);

            this.color.show = false;

            this.$store.commit('FORCE_INIT_PAGINATION');

            setTimeout(() => {
                
                this.$store.dispatch('filtered_data')
                .then((result) => {
                    
                    this.$store.commit('CLEAR_PUBLICATIONS');

                    this.$store.commit('SET_PUBLICATIONS_WEB_WITH_PAGINATION', result.data.data);

                    this.$store.commit('SET_PAGINATION', result.data.pagination)

                }).catch((err) => {
                    
                });

            }, 250);
            
        }
    },

    watch : {
        
    },
    
    computed : {
        ...mapGetters([
            'PublicationsWeb'
        ])
    },

    mounted() {
        
    },
}
</script>
<style>
    
</style>