<template>
    <div style="text-align: center"> 
        <hooper style="width:80px; height:100px" :centerMode="true">
            <slide v-for="(item, index) in Pictures" :key="index" :index="index">
                 <img class="cart-list-thumbnail" :src="item" alt="Riki-Cia">
            </slide>
        </hooper>
    </div>
</template>

<script>
    import { Hooper, Slide } from 'hooper';
    import 'hooper/dist/hooper.css';
    export default {
        props: ['data', 'index'],
          components: {
            Hooper,
            Slide
        },
        methods : {
            
        },
        computed : {
            Pictures(){
                return this.data.pictures;
            }
        },
        mounted() {
        },
    }
</script>
