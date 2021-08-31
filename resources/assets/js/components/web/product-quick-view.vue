<template>
        <div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
			</div>
			<div class="modal-body">
				<div class="tt-modal-quickview desctope">
					<div class="row">
						<div class="col-12 col-md-5 col-lg-6">
							<div style="text-align: center"> 
										<img  :src="QuickView.pictures" alt="Riki-Cia" height="500" width="300">
								<!-- <vue-picture-swipe :items="QuickView.pictures"></vue-picture-swipe> -->
							</div>
						</div>
						<div class="col-12 col-md-7 col-lg-6">
							<div class="tt-product-single-info">
								<div class="tt-add-info">
									<ul>
										<!-- <li><span>SKU:</span> www31</li> -->
										<li><span>Disponibles:</span></li>
									</ul>
								</div>
								<h2 class="tt-title">{{QuickView.title}}</h2>
								<div class="tt-price">
                                    <span class="new-price">{{ QuickView.price | currency}}</span>
									<span class="old-price"></span>
								</div>
								<div class="tt-wrapper">
									<div class="tt-add-info">
										<ul>
											<li><span>Marca:</span> {{QuickView.attributes[0].value_name}}</li>
											<li><span>Modelo:</span> {{QuickView.attributes[1].value_name}}</li>
											<li><span>Género:</span> {{QuickView.attributes[2].value_name}}</li>
										</ul>
									</div>
								</div>
								<!-- <div class="tt-wrapper">
									Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
								</div> -->
								<div class="tt-swatches-container">
									<div class="tt-wrapper">
										<div class="tt-title-options">TALLE</div>
										<ul class="tt-options-swatch options-large" v-for="(size, index) in Attributes" :key="index">
											<li :class="{active: data_size == size.size_value_name}"  ><a :class="{isDisabled : ((data_color==null) ? false : !(data_color == size.color_value_name))}" href="#" @click.prevent="data_size = size.size_value_name">{{size.size_value_name}}</a></li>
										</ul>
									</div>
									<div class="tt-wrapper">
										<div class="tt-title-options">COLOR</div>
										<ul class="tt-options-swatch options-large" v-for="(color, index) in Attributes" :key="index">
											<li :class="{active: data_color == color.color_value_name}"><a :class="{isDisabled : ((data_size==null) ? false : !(data_size == color.size_value_name))}" href="#" @click.prevent="data_color = color.color_value_name">{{color.color_value_name}}</a></li>
										</ul>
									</div>
									<!-- <div class="tt-wrapper">
										<div class="tt-title-options">TEXTURE:</div>
										<ul class="tt-options-swatch options-large">
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-01.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li class="active"><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-02.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-03.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-04.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
											<li><a class="options-color" href="#">
												<span class="swatch-img">
													<img src="images/loader.svg" data-src="images/custom/texture-img-05.jpg" alt="">
												</span>
												<span class="swatch-label color-black"></span>
											</a></li>
										</ul>
									</div> -->
								</div>
								<div class="tt-wrapper">
									<div class="tt-row-custom-01">
										<div class="col-item">
											<div class="tt-input-counter style-01">
												<span class="minus-btn"></span>
												<input type="text" value="1" size="5">
												<span class="plus-btn"></span>
											</div>
										</div>
										<div class="col-item">
											<a href="#" class="btn btn-lg"><i class="icon-f-39"></i>AGREGAR AL CARRITO</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
import busVue from './../../extras/eventBus'; 
import {mapActions, mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import collect from 'collect.js';
import VuePictureSwipe from 'vue-picture-swipe';
    export default {
        components: {
			Multiselect,
			VuePictureSwipe
        },
        data() {
            return {
				data_color : null,
				data_size : null,
            }
        },
        computed : {
			...mapGetters([
				'QuickView'
			]),

			Attributes(){
				if (this.QuickView != []) {
					let variations = collect(this.QuickView.variations);
					let attribute_combinations = variations.map((v)=>{
						return v.attribute_combinations;
					})
					let color = collect(attribute_combinations.items).map((attr)=>{
						return {
							color_value_name : attr[0].value_name,
							color_value_id : attr[0].value_id,
							size_value_name : attr[1].value_name,
							size_value_id : attr[1].value_id,
						}
					});
					
					return color.items;
				}
				return null;
			},

			/* Colors(){
				if (this.QuickView != []) {
					let variations = collect(this.QuickView.variations);
					let attribute_combinations = variations.map((v)=>{
						return v.attribute_combinations;
					})
					let color = collect(attribute_combinations.items).map((attr)=>{
						if (attr[0].id == 'COLOR') {
							return attr[0];
						}
					});
					
					return color.items;
				}
				return null;
			},

			Sizes(){
				if (this.QuickView != []) {
					let variations = collect(this.QuickView.variations);
					let attribute_combinations = variations.map((v)=>{
						return v.attribute_combinations;
					})
					let size = collect(attribute_combinations.items).map((attr)=>{
						if (attr[1].id == 'SIZE') {
							return attr[1];
						}
					});
					
					return size.items;
				}
				return null;
			} */
        },
        methods : {
           
        },
        mounted(){
            busVue.$on('closeModal', ()=>{
				this.data_color = null;
				this.data_size = null;
			});

        }
    }
</script>
<style scoped>
.isDisabled {
	color: currentColor;
	cursor: not-allowed;
	opacity: 0.5;
	text-decoration: none;
	pointer-events: none;
}
</style>
