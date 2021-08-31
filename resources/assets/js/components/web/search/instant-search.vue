<template>
    <div>
        <div class="tt-col">
            <input
                ref="mi_input"
                type="text"
                class="tt-search-input"
                placeholder="Buscar productos..."
                @keyup="search_products()"
                v-model="search"
            />
            <button class="tt-btn-search" type="submit"></button>
        </div>
        <div class="tt-col">
            <button ref="close" class="tt-btn-close icon-g-80"></button>
        </div>
        <div class="tt-info-text">Qué estas buscando...</div>
        <div
            class="search-results"
            :style="(HasResults) ? 'display:block' : 'display:none' "
            ref="search_results"
        >
            <ul>
                <li v-for="(product, index) in Results" :key="index">
                    <result_search :product="product"></result_search>
                </li>
            </ul>
            <button @click="see_all_results" v-if="HasEnoughResults" type="button" class="tt-view-all">Ver más...</button>
        </div>
    </div>
</template>

<script>
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import { mapGetters } from "vuex";
import result_search from "./result-search";

export default {
    components: { result_search },
    data() {
        return {
            search : "",
            results_total : null,
           
        };
    },

    methods: {

        close_search(){

            this.$refs.close.click();

            this.search = "";
        },

        search_products() {
            this.$store
                .dispatch("search_products", this.search)
                .then(result => {
                
                    this.$store.commit("SET_RESULTS", result.data.data);

                    this.results_total = result.data.pagination.total;

                })
                .catch(err => {
                    this.search = "";
                });
        },

        see_all_results() {

            this.$store.commit("FORCE_INIT_PAGINATION");
            
            this.$store.commit("SET_FILTER_SEE_ALL", this.search);

            setTimeout(() => {
                this.$store
                .dispatch("filtered_data")
                .then(result => {
                    this.$store.commit("CLEAR_PUBLICATIONS");

                    this.$store.commit("SET_PUBLICATIONS_WEB_WITH_PAGINATION", result.data.data);

                    this.$store.commit("SET_PAGINATION", result.data.pagination);
    
                    this.close_search();

                    this.$store.commit("CLEAR_FILTER_SEE_ALL");

                    window.sessionStorage.clear();

                    window.sessionStorage.results = JSON.stringify(result.data.data);
                    
                    window.sessionStorage.pagination = JSON.stringify(result.data.pagination);

                    let path = window.location.pathname;

                    if (path != '/tienda') {
                        
                        window.location.href = '/tienda';

                    }
                    
                })
                .catch(err => {});
            }, 200);
        }
    },

    computed: {
        ...mapGetters(["Results", "HasResults"]),

        HasEnoughResults(){
            
            if (this.results_total > 6) {
                
                return true;
            }

            return false;
        }
    },

    mounted(){

    }
};
</script>