<template>
    <div class="tt-collapse open">
        <h3 class="tt-collapse-title">{{title}}</h3>
        <div class="tt-collapse-content">
            <ul class="tt-list-row" v-for="element in array_data" :key="element.id">
                <li style="margin-top:5px; margin-bottom:5px;">
                    <a @click.prevent="fetchProductsByCategory(element.slug)" :href="url +'/'+ element.slug">{{element.name}}</a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {mapActions} from 'vuex';

export default {
    props : ['title', 'url', 'array_data'],
    data() {
        return {
            
        }
    },
    mounted(){

    },
    methods: {
        ...mapActions(['fetchProductsByCategory']),
    }
}
</script>

<style>

</style>
