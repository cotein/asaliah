<template>
    <ul class="tt-list-row" >
        <li style="padding-left:1rem" v-for="(category, index) in categories" :key="index">
            <div class='tt-collapse' >
                <h3 class="tt-collapse-title"  v-if="category.hijo.length" @click="open">{{category.name}}</h3>
                <div class="tt-collapse-content" style="margin-bottom:1rem" >
                        
                    <template  v-if="category.hijo.length">
                        <category_recursive :categories="category.hijo" :component_index="index"/>
                    </template>
                    <ul class="tt-list-row"  
                    :style="{'display':(OpenList)?'list-item':'none'}">
                        <template v-if="category.hijo.length == 0">
                                <li>
                                    {{category.name }} {{OpenList}}
                                </li>
                        </template>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
import ul_recursive from './ul_recursive.vue';
    export default {
        props : ['categories'],
        name : 'category_recursive',
        
        data(){
            return {
                open_list : true
            }
        },

        computed : {

            OpenList()
            {
                return this.open_list;
            }
            
        },

        methods : {
            open(){
                this.open_list = ! this.open_list;
            }
        }


    }
</script>

<style scoped>
    .mi-tt-list-row{
        padding : 0px;
    }
</style>