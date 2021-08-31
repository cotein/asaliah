<template>
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">MARCAS</h3>
        <div class="tt-collapse-content">
            <ul class="tt-list-row" >
                <brand_link v-for="(brand, index) in Brands" :key="index" :brand="brand"></brand_link>
            </ul>
        </div>
    </div>
</template>

<script>
import brand_link from './brand-link';
import {mapActions, mapState, mapGetters} from 'vuex';
export default {
    components : {brand_link},
    data(){
        return {
            active_link : null,
            
        }
    },
    methods : {

    },

    computed : {
        ...mapGetters([
            'Brands',
        ]),
    },

    mounted(){
        let $vm = this;
        
        $vm.$store.dispatch('getBrands')
        .then(response => {
            $vm.$store.commit('SET_BRANDS', response.data);
        })
    }
}
</script>
<style scoped>
   
</style>
    