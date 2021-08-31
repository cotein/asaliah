<template>

    <div>
        <loading 
            :active.sync="Loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
            <div v-if="HasPublicationsWeb">
                <div class="tt-product-listing row" >
                    <product v-for="(product, index) in PublicationsWeb" :key="index" :product="product"></product>
                </div>
                
                <div class="text-center" style="padding-top:50px">
                    <button :disabled="VerifyIfLoadMorePublication" @click="getPublications()" class="btn btn-border">{{TextButton}}</button>
                </div>
            </div>

            <div  v-if="HasPublicationsWeb == false && HasCategoryFilters && HasBrandFilters" style="margin-top:50px; margin-left:50px; animation-duration: 2s">
                <h2 class="tt-base-color">Ésta búsqueda no arrojó resultados</h2>
            </div>
    </div>
</template>

<script>
import collect from 'collect.js';
import Loading from 'vue-loading-overlay';
import {mapActions, mapState, mapGetters} from 'vuex';
import hand from './../../../src/HandlerAttributeCombinations';
export default {
    components : {
        Loading
    },
    data(){
        return {
            
        }
    },

    methods : {

        getPublications(){
        
            this.$store.dispatch('filtered_data')
            .then((result) => {
                this.$store.commit('SET_PUBLICATIONS_WEB_WITH_PAGINATION', result.data.data);
                //this.select_store_mode_publications(result.data.data);

                this.$store.commit('SET_PAGINATION', result.data.pagination)

            }).catch((err) => {
                
            });
           
        },

        changePage(page) {

            if (page == this.pagination.last_page) {

                this.load_more_button = false;

            }

            this.pagination.current_page = page;
        }
       
    },

    computed : {
        TextButton(){

            if (this.VerifyIfLoadMorePublication) {

                return 'NO HAY MÁS PRODUCTOS ASOCIADOS A LA BÚSQUEDA';

            }

            return 'VER MÁS PRODUCTOS';
        },

        ...mapGetters([
            'Loading',
            'Pagination',
            'PublicationsWeb',
            'HasBrandFilters',
            'HasCategoryFilters',
            'HasPublicationsWeb',
            'VerifyIfLoadMorePublication',
        ]),
    },

    beforeMount(){

        this.$store.commit("CLEAR_PUBLICATIONS");

        this.$store.commit("FORCE_INIT_PAGINATION");

        if (window.sessionStorage.results) {

            this.$store.commit('SET_PUBLICATIONS_WEB_WITH_PAGINATION', JSON.parse(window.sessionStorage.results));
            
            this.$store.commit('SET_PAGINATION', JSON.parse(window.sessionStorage.pagination))

        }else{
                
            //this.getPublications();
        }

    }
}
</script>