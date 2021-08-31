<template>
    <div class="text-center" v-tooltip="{content : data.title}">
        <img :src="Image()" alt="Image" class="cart-list-thumbnail">
        <strong style="margin-top:10px"><small>{{data.id}}</small></strong>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            rowNumber(){
                return this.index;
            },
            Image(){
                return this.data.thumbnail
            }
        },
        computed : {
            
        },
    }
</script>
