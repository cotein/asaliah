<template>
  <div class="col-6 col-md-4 tt-col-item">
    <div class="tt-product thumbprod-center">
      <div class="tt-image-box">
        <a
          href="#"
          @click="quickView()"
          class="tt-btn-quickview"
          data-toggle="modal"
          data-target="#ModalquickView"
          data-tooltip="Vista rápida"
          data-tposition="left"
        ></a>
        <!-- <a href="#" class="tt-btn-wishlist" data-tooltip="Add to Wishlist" data-tposition="left"></a>
        <a href="#" class="tt-btn-compare" data-tooltip="Add to Compare" data-tposition="left"></a>-->
        <a :href="'/producto/' + product.slug + '/' + product.id">
          <span class="tt-img">
            <img :src="Img" alt />
          </span>
          <span class="tt-img-roll-over">
            <img :src="RollOverImg" alt class="loaded" data-was-processed="true" />
          </span>
        </a>
      </div>
      <div class="tt-description">
        <div class="tt-row" style="text-align:center important!">
          <p class="tt-rating">Colores</p>
          <span v-if="ColorsCount" class="tt-rating">
            <span v-for="(color, index) in product.colors" :key="index">{{color.color_value_name}} |</span>
          </span>
          <span v-else class="tt-rating">
            <span v-for="(color, index) in product.colors" :key="index">{{color.color_value_name}}</span>
          </span>
          <ul class="tt-add-info">
            <li>
              <a href="#">{{product.attributes[0].value_name}}</a>
            </li>
          </ul>
          <div class="tt-rating">
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star"></i>
            <i class="icon-star-half"></i>
            <i class="icon-star-empty"></i>
          </div>
        </div>
        <h2 class="tt-title">
          <a :href="'/producto/' + product.slug + '/' + product.id">{{product.title}}</a>
        </h2>
        <div class="tt-price">{{product.price}}</div>
        <div class="tt-product-inside-hover">
          <div class="tt-row-btn">
            <a
              href="#"
              class="tt-btn-addtocart thumbprod-button-bg"
              data-toggle="modal"
              data-target="#modalAddToCartProduct"
            >AGREGAR AL CARRO</a>
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
import collect from "collect.js";
import { Event } from "vue-tables-2";
import HandlerAttributeCombinations from "../../../src/HandlerAttributeCombinations";
export default {
  props: ["product"],
  data() {
    return {
      img: "/images/loader.svg",
      roll_over_img: null
    };
  },
  methods: {
    quickView() {
      this.$store.commit("SET_QUICK_VIEW_PRODUCT", this.product);
    },

    update_images() {
      let min = 500;

      let max = 3000;

      let time = Math.random() * (max - min) + min;

      setTimeout(() => {
        let pictures = collect(this.product.pictures);
        /*  pictures.each((p) => {
                    console.log(p.secure_url);
                }); */
        this.img = pictures.first().secure_url;

        this.roll_over_img = pictures.pop().secure_url;
      }, time);
    },

    give_me_color_name() {
      return collect(this.product.variations)
        .map(variation => {
          return collect(variation.attribute_combinations)
            .filter(attr => {
              //return collect(attr)
              if (attr.id == "COLOR") {
                return attr.id;
              }
            })
            .all();
        })
        .flatten(1)
        .sortBy("value_name")
        .all();
    }
  },
  computed: {
    Img() {
      return this.img;
    },

    RollOverImg() {
      return this.roll_over_img;
    },

    ColorsCount() {
      let colors = collect(this.product.colors);

      if (colors.count() > 1) {
        return true;
      }

      return false;
    }
  },

  mounted() {
    this.update_images();

    Event.$on("sort", () => {
      (this.img = "/images/loader.svg"), this.update_images();
    });


    /* setTimeout(() => {
            this.colors = this.give_me_color_name();
        }, 500); */
  }
};
</script>