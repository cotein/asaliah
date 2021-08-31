<template>
    <div class="col-md-4">
        <a href="#" class="tt-promo-box tt-one-child">
            <!-- <img :src="Img"  :alt="category.name" class="loaded" data-was-processed="true"> -->
            <div class="tt-description">
                <div class="tt-description-wrapper">
                    <div class="tt-background"></div>
                    <div class="tt-title-small">{{category.name}}</div>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
import collect from 'collect.js';
export default {
    props : ['category'],
    data(){
        return {
            img : '/images/loader.svg',
        }
    },
    methods : {

        random_image(){

            return collect([

                '/images/promo/index06-promo-img-05.jpg',
                '/images/promo/index06-promo-img-06.jpg',
                '/images/promo/index06-promo-img-07.jpg',
                '/images/promo/index06-promo-img-08.jpg',
                '/images/promo/index06-promo-img-09.jpg',
                '/images/promo/index06-promo-img-10.jpg',
                '/images/promo/index06-promo-img-11.jpg',
                '/images/promo/index06-promo-img-12.jpg',

            ]).random();

        },

        update_images(){
            let min = 500;
        
            let max = 3000;

            let time = Math.random() * (max - min) + min;
            
            setTimeout(() => {

                this.img = this.random_image();
                
            }, time);
        }
       
    },

    computed: {
        Img(){
            return this.img;
        }
    },
    mounted(){
       
        this.update_images();
        
    }
}
</script>