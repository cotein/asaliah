<template>
        <div>
            <div class="tt-product thumbprod-center">
                <div class="tt-image-box">
                    <a href="#" @click.prevent="set_quick_view()" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"	data-tooltip="Vista rápida" data-tposition="left"></a>
            <a href="#" class="tt-btn-wishlist" data-tooltip="Agregar a mi lista de deseos" data-tposition="left"></a>
            <a href="#" class="tt-btn-compare" data-tooltip="Comparar" data-tposition="left"></a>
                    <a :href="publication.permalink" target="_blank">
                        <span class="tt-img"><img :src="publication.pictures[0]"  alt=""></span>
                        <span class="tt-img-roll-over"><img :src="publication.pictures[1]"  alt=""></span>
                    </a>
                    <!--<div class="tt-countdown_box">
                        <div class="tt-countdown_inner">
                            <div class="tt-countdown"
                                data-date="2018-11-01"
                                data-year="Yrs"
                                data-month="Mths"
                                data-week="Wk"
                                data-day="Day"
                                data-hour="Hrs"
                                data-minute="Min"
                                data-second="Sec">
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="tt-description">
                    <div class="tt-row">
                        <ul class="tt-add-info">
                            <li style="color:red">Disponibles: {{ publication.available_quantity}}</li>
                        </ul>
                        <!-- <div class="tt-rating">
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star"></i>
                            <i class="icon-star-half"></i>
                            <i class="icon-star-empty"></i>
                        </div> -->
                    </div>
                    <h2 class="tt-title"><a :href="publication.permalink" target="_blank"> {{publication.title}}</a></h2>
                    <div class="tt-price">
                        {{ publication.price | currency}}
                    </div>
                    <div class="tt-product-inside-hover">
                        <div class="tt-row-btn">
                            <a href="#" class="tt-btn-addtocart thumbprod-button-bg" data-toggle="modal" data-target="#modalAddToCartProduct">ENVIAR AL CARRO</a>
                        </div>
                        <div class="tt-row-btn">
                            <a href="#" class="tt-btn-quickview" data-toggle="modal" data-target="#ModalquickView"></a>
                            <a href="#" class="tt-btn-wishlist"></a>
                            <a href="#" class="tt-btn-compare"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
<script>
import {mapActions} from 'vuex';
    export default {
        props : ['publication'],
        data() {
            return {
                
            }
        },
        methods : {
            set_quick_view(){
                this.$store.commit('SET_QUICK_VIEW', this.publication);
            }
        },
        mounted(){
        }
    }
</script>