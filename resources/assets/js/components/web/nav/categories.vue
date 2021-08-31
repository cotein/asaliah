<template>
    <div class="">
        <h3 class="tt-collapse-title">CATEGORÍAS</h3>
        <div class="tt-collapse-content">
            <category_recursive  :categories="categories"/>
        </div>
    </div>
</template>

<script>
import category_link from './category-link';
import collect from 'collect.js'
import category_recursive from './category_recursive.vue'
import {mapActions, mapState, mapGetters} from 'vuex';
export default {
    components : {category_link, category_recursive},
    data(){
        return {
            active_link : null,
            categories : []
        }
    },
    methods : {

        hijos(hijos, cat)
        {
            collect(hijos).map(el => {
                    if (el.id == cat.parent_id) {
                        el.hijo.push({
                            'id' : cat.id,
                            'name' : cat.name,
                            'hijo' : [],
                        });
                    }else{
                        this.hijos(el.hijo, cat);
                    }
                })
        },

        category_handle(categories)
        {
            let arr = [];

            collect(categories).map(category => {

                if (category.parent_id == 0) {
                    
                    arr.push({
                        'id' : category.id,
                        'name' : category.name,
                        'hijo' : [],
                    })
                }
                this.hijos(arr, category);
            });
            
            return arr;
        }
        
    },

    watch : {

        Categories(n){

            let categories = collect(n).sortBy('parent_id');
            console.log('/////////////////////////////');
            this.categories = this.category_handle(categories);
            console.log(this.categories);
            console.log('/////////////////////////////');

        }
    },


    computed : {
        ...mapGetters([
            'Categories',
        ]),
    },

    mounted(){
       
        this.$store.dispatch('fetchCategories');

        
    }
}
</script>
<style scoped>
    button {
        background: none!important;
        border: none;
        padding: 0!important;
        /*optional*/
        font-family: arial, sans-serif;
        /*input has OS specific font-family*/
        color: #069;
        text-decoration: underline;
        cursor: pointer;
    }
</style>
    