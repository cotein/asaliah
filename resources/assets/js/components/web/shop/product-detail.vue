<template>
    <div class="container-indent">
		<loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
		<div class="container container-mobile-airSticky">
			<div class="row airSticky_stop-block">
				<div class="col-6 hidden-xs">
					<div class="product-images-static hidden-xs">
						<ul data-scrollzoom="false">
							<li v-for="(picture, index) in product.pictures" :key="index">
								<img class="zoom-product" :src="picture.secure_url" :alt="picture.size">
							</li>
							
							<!-- <li>
								<div class="tt-video-block">
									<a href="#" class="link-video"></a>
									<video class="movie" src="video/video.mp4" poster="video/video_img.jpg" data-was-processed="true"></video>
								</div>
							</li> -->
						</ul>
					</div>
				</div>
				<div class="col-6">
					<div class="airSticky airSticky_relative" style="width: 580px; position: relative; top: auto;">
						<div class="tt-product-single-info">
							<div class="tt-add-info">
								<ul>
									<!-- <li><span>SKU:</span> 001</li> -->
									<li><span>Disponibles:</span> {{product.stock}} en Stock</li>
								</ul>
							</div>
							<h1 class="tt-title">{{product.title}}</h1>
							<div class="tt-price">
								<span class="new-price">{{product.price}}</span>
								<span class="old-price"></span>
							</div>
							<div class="tt-review">
								<div class="tt-rating">
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star"></i>
									<i class="icon-star-half"></i>
									<i class="icon-star-empty"></i>
								</div>
								<a href="#">(1 Customer Review)</a>
							</div>
							<attribute_combination v-for="(attribute, index) in Attributes" :key="index"
								:attributes="attribute">
							</attribute_combination>
							<div class="tt-wrapper">
								<div class="tt-row-custom-01">
									<add_product_to_cart :product="product"></add_product_to_cart>
								</div>
							</div>
							<div class="tt-wrapper">
								<ul class="tt-list-btn">
									<li><a class="btn-link" href="#"><i class="icon-n-072"></i>AGREGAR A LISTA DE DESEOS</a></li>
									<li><a class="btn-link" href="#"><i class="icon-n-08"></i>COMPARAR</a></li>
								</ul>
							</div>
							<div class="tt-collapse-block">
								<div class="tt-item">
									<div class="tt-collapse-title">DESCRIPCIÓN</div>
									<div class="tt-collapse-content">
										{{product.description.plain_text}}
									</div>
								</div>
								<div class="tt-item">
									<div class="tt-collapse-title">INFORMACIÓN ADICIONAL</div>
									<div class="tt-collapse-content">
										<table class="tt-table-03">
											<tbody>
												<tr v-for="(attr, index) in product.attributes" :key="index">
													<td>{{transformer.transformer_attribute(attr.id)}}:</td>
													<td>{{attr.value_name}}</td>
												</tr>
											</tbody>
										</table>
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
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import Loading from 'vue-loading-overlay';
import Multiselect from 'vue-multiselect';
import add_product_to_cart from './add-product-to-cart';
import attribute_combination from './attribute-combination';
import AttributeNameTransformer from './../../../src/AttributeNameTransformer';
export default {
	props : ['product'],
	components : {
		Loading,
		Multiselect,
		attribute_combination,
		add_product_to_cart
	},
    data(){
        return {
			transformer : new AttributeNameTransformer(),
			loading : true,
			detail : null,
			size : null,
            color : null,
            colors : [],
            sizes : [],
        }
    },
    methods : {
       	/* SelectedColor(el){
            collect(this.sizes).every((size) => {
                if ( size.size_value_id == el.size_value_id ) {
                    size.$isDisabled = false
                }else{
                    size.$isDisabled = true
                }
            });
        },

        SelectedSizes(el){
            collect(this.colors).every((color) => {
                if ( color.color_value_id == el.color_value_id ) {
                    color.$isDisabled = false
                }else{
                    color.$isDisabled = true
                }
            });
		},
		
		InitialStatus(){
            collect(this.sizes).every((size) => {
                size.$isDisabled = false
            });

            collect(this.colors).every((color) => {
                color.$isDisabled = false
            });
        } */
       
	},
	
	computed : {
		
		Attributes(){
			
			let $vm = this;
			
			let variations = collect($vm.product.variations);

			let attributes = variations.map( (v , i) => {

				let variation_id = i ;

				return collect(v.attribute_combinations).flatMap( (a, j) => {
					
					let count = collect(v.attribute_combinations).count();

					let base = [];
					
					for (let index = 0; index < count; index++) {
						base.push({
							'id' : v.attribute_combinations[index].id,
							'value_name' : v.attribute_combinations[index].value_name,
							'variation_id' : variation_id
						});
					}

					a['base'] = base;
					a['search'] = [];
					return a;
				});
				
			}).toArray();
			
			console.log('########### Attributes ###########');
			console.log(attributes);
			//this.$store.commit('SET_ATTRIBUTES_WWW', attributes);
			let flat = collect(attributes).flatMap( a => {
				return a;
			}).toArray();

			console.log('########### Flat ###########');
			console.log(flat);
			
			collect(flat).map(attr => {
				collect(flat).map(a => {
					if (attr.id == a.id && attr.value_name == a.value_name) {
						attr.search.push(a.base);
					}
				})
			});
			console.log('########### Unique ###########');
			let unique = collect(flat).unique('value_name');
			/* let unique = collect(flat).unique(item => {
				return item;
			}); */

			console.log(unique);

			let group = collect(unique).groupBy('id').toArray();

			return collect(group).toArray();
		}

	},

    mounted(){

		let $vm = this;

		setTimeout(() => {
			
			$vm.loading = false;

		}, 1000);
        
    }
}
</script>