<template>
    <transition name="fade">
        <div class="tt-collapse open" v-if="HasCategoryFilters || HasBrandFilters || HasOthersFilters">
            <div class="tt-collapse open">
                <h3 class="tt-collapse-title">FILTROS APLICADOS</h3>
                <div class="tt-collapse-content" style="display: block;">
                    <caption style="color: red" v-if="HasCategoryFilters">Categorías</caption>
                    <ul class="tt-filter-list">
                        <transition-group name="fade" >
                            <category_filter v-for="(category) in CategoryFilters" :key="category.id" :filter="category"></category_filter>
                        </transition-group>
                    </ul>
                    <caption style="color: red" v-if="HasBrandFilters">Marcas</caption>
                    <ul class="tt-filter-list">
                        <transition-group name="fade">
                            <brand_filter v-for="(brand) in BrandFilters" :key="brand.id" :filter="brand"></brand_filter>
                        </transition-group>
                    </ul>
                    <caption style="color: red" v-if="HasOthersFilters">Otros</caption>
                    <ul class="tt-filter-list">
                        <transition-group name="fade">
                            <filter_filter v-for="(filter) in OthersFilters" :key="filter.value_id" :filter="filter"></filter_filter>
                        </transition-group>
                    </ul>
                    <a href="#" @click.prevent="clear_filters" class="btn-link-02" v-tooltip.top-left="msg" >Quitar todos los filtros</a>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>

import {mapGetters} from 'vuex';
import brand_filter from './brand-filter';
import filter_filter from './filter-filter';
import category_filter from './category-filter';
export default {
    props : ['filter'],
    components : {
        category_filter,
        brand_filter,
        filter_filter
    },
    data(){
        return {
            msg : 'Remover todos los filtros',
            active : true
        }
    },
    methods : {

        clear_filters(){
            this.$store.commit('CLEAR_FILTERS');
        }
    },

    computed : {
        ...mapGetters([
            'BrandFilters',
            'CategoryFilters',
            'HasBrandFilters',
            'HasOthersFilters',
            'OthersFilters',
            'HasCategoryFilters',
        ]),

    },

    mounted(){
       
    }
}
</script>
<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .4s
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
        opacity: 0
    }
</style>

    