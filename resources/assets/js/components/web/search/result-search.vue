<template>
    <a :href="'/producto/' + product.slug + '/' + product.id">
        <div class="thumbnail"><img :src="Img" alt="www"></div>
        <div class="tt-description">
            <div class="tt-title">{{product.name}}</div>
            <div class="tt-price">
                <span class="new-price">{{product.price | currency}}</span>
                <!-- <span class="old-price">$24</span> -->
            </div>
        </div>
    </a>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
export default {
    props : ['product'],
    data() {
        return {
            img : '/images/loader.svg',
        }
    },

    methods : {
       
       update_img(){
            let min = 131;
        
            let max = 500;

            let time = Math.random() * (max - min) + min;
            
            setTimeout(() => {

                let pictures = collect(this.product.pictures);

                this.img = pictures.random().secure_url;

            }, time);
        },

        
    },

    computed : {

        Img(){
            return this.img;
        },

        Price(){

        }
       
    },

    mounted(){
        this.update_img();
    }
};
</script>