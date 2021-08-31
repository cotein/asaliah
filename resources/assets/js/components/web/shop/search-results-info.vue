<template>
    <h6 class="tt-title">
        RESULTADOS <span class="tt-title-total">{{PaginationTotal}}</span>
    </h6>
</template>

<script>
import {mapGetters} from 'vuex';
export default {

    data(){
        return {
          
            
        }
    },
    methods : {

    },

    computed : {
       ...mapGetters([
           'PaginationTotal'
       ])
    },

    mounted(){
       
    }
}
</script>

    