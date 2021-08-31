<template>
    <li >
        <a @click.prevent="apply_size_filter"  href="#">{{size.value_name}}</a>
    </li>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
export default {
    props : ['size'],
    
    data(){
        return {
            selected : null,
            disabled : false,
            active : true,
            pagination : {
                current_page : 1
            },
            model : null
        }
    },
    
    methods : {
        apply_size_filter(){

            this.$store.commit('ADD_SIZE_FILTER', this.size);

            this.size.show = false;

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
        
    },

    mounted() {
        
    },
}
</script>
<style>
    
</style>