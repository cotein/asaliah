<template>
    <li :data-thumb="img" data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off"  data-title="Slide">
        <img :src="img"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
        <div class="tp-caption tp-caption1 lft stb"
            data-x="center"
            data-y="center"
            data-hoffset="0"
            data-voffset="0"
            data-speed="600"
            data-start="900"
            data-easing="Power4.easeOut"
            data-endeasing="Power4.easeIn">
            <div class="tp-caption1-wd-1 tt-base-color">Precios mayorístas</div>
            <div class="tp-caption1-wd-2 tt-white-color">Pagá por <br>Mercadopago</div>
            <div class="tp-caption1-wd-3 tt-white-color">Oberlo allows you to easily import dropshipped products directly into your ecommerce store</div>
            <div class="tp-caption1-wd-4"><a href="/tienda" class="btn btn-xl" data-text="IR A LA TIENDA">IR A LA TIENDA</a></div>
        </div>
    </li>
</template>

<script>
import Unsplash from 'unsplash-js';
export default {
    components : {
        Unsplash
    },
    data() {
        return {
            photo : null,
            AccessKey : '96ee9cc3a91a196b6b13f78c920d0bc9fea25cc7009c21a8cedcfc0bc1933caa',
            SecretKey : '05efd7fd9f43963d405d4566c0f49aaf3425c9d5be17558cb197d333a04f673b',
            img : "images/slides/08/slide-01.jpg"

        }
    },
    methods: {
        create_unsplash(){
            return new Unsplash({
                applicationId: "96ee9cc3a91a196b6b13f78c920d0bc9fea25cc7009c21a8cedcfc0bc1933caa",
                secret: "05efd7fd9f43963d405d4566c0f49aaf3425c9d5be17558cb197d333a04f673b"
            });
        },
        fetch_photo(){
            let unsplash = this.create_unsplash();
            unsplash.search.photos("mattres", 1)
            .then(json => {
                console.log('ppppppppppppppp')
                console.log(json);
                this.img = json.url
            }).catch((err) => {
                console.log('error unsplash');
                console.log(err);
            });


        }
    },
    mounted() {
        //this.fetch_photo();
    },
}
</script>

<style>

</style>
