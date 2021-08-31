<template>
    <div class="modal-content ">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon icon-clear"></span></button>
        </div>
        <div class="modal-body">
            <div class="tt-modal-quickview desctope">
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-6">
                        <div class="tt-mobile-product-slider arrow-location-center">
                            <div v-if="show_loader">
                                <img  :src="Img" alt="loader">
                            </div>
                            <div  v-for="(pic, index) in QuickViewProduct.pictures" :key="index" class="slick-slide">
                                <img class="loaded" :src="pic.secure_url" alt="loader">
                            </div>  
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-6">
                        <div class="tt-product-single-info">
                            <div class="tt-add-info">
                                <ul>
                                   <!--  <li><span>SKU:</span> 001</li> -->
                                    <li><span>Disponibles:</span> {{QuickViewProduct.stock}}  en Stock</li>
                                </ul>
                            </div>  
                            <h2 class="tt-title">{{QuickViewProduct.title}}</h2>
                            <div class="tt-price">
                                <span class="new-price">{{QuickViewProduct.price}}</span>
                                <span class="old-price"></span>
                            </div>
                           <!--  <div class="tt-review">
                                <div class="tt-rating">
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star"></i>
                                    <i class="icon-star-half"></i>
                                    <i class="icon-star-empty"></i>
                                </div>
                                <a href="#">(1 Customer Review)</a>
                            </div> -->
                            <div class="tt-wrapper" v-if="QuickViewProduct.attributes">
                                <div class="tt-title-options">ATRIBUTOS</div>
                                <div class="tt-add-info">
                                    <ul>
                                        <li v-for="(attr, index) in QuickViewProduct.attributes" :key="index">
                                            <span>{{attr.value_name}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tt-swatches-container">
                                <div class="tt-wrapper">
                                    <div class="tt-title-options">TALLE</div>
                                    <form class="form-default">
                                        <div class="form-group">
                                            <multiselect 
                                                v-model="size" 
                                                label="size_value_name" track-by="size_value_name" 
                                                :options="Sizes" 
                                                @select="SelectedSizes"
                                                @remove="InitialStatus"
                                                selectLabel="Seleccionar"
                                                selectedLabel="Seleccionado"
                                                deselect-label="Remover Selección" 
                                                :searchable="false"
                                                >
                                            </multiselect>
                                        </div>
                                    </form>
                                </div>
                                <div class="tt-wrapper">
                                    <div class="tt-title-options">COLOR</div>
                                    <form class="form-default">
                                        <div class="form-group">
                                            <multiselect 
                                                v-model="color" 
                                                label="color_value_name" track-by="color_value_name" 
                                                :options="Colors" 
                                                @select="SelectedColor"
                                                @remove="InitialStatus"
                                                selectLabel="Seleccionar"
                                                selectedLabel="Seleccionado"
                                                deselect-label="Remover Selección" 
                                                :searchable="false"
                                                >
                                            </multiselect>
                                        </div>
                                    </form>
                                </div>
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
                                        <a href="#" class="btn btn-lg"><i class="icon-f-39"></i>AGREGAR AL CARRO</a>
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
import Multiselect from 'vue-multiselect';
export default {
    components : {
        Multiselect
    },
    data(){
        return {
            img : '/images/loader.svg',
            show_loader : true,
            size : null,
            color : null,
            colors : [],
            sizes : [],
        }
    },
    methods : {
        SelectedColor(el){
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
        }
       
    },
    computed : {
        ...mapGetters([
            'QuickViewProduct'
        ]),

        Img(){
            return this.img
        },

        Colors(){
            if (this.colors != []) {
                
                let colors = collect(this.colors).sortBy('color_value_name');

                return colors.all();        
            }
            return [];
        },

        Sizes(){
            if (this.sizes != []) {
                
                let sizes = collect(this.sizes).sortBy('size_value_name');

                return sizes.all();        
            }
            return [];
        }
    },

    watch : {
        QuickViewProduct(o,n){
            setTimeout(() => {
                this.show_loader = false;
                this.colors = o.colors
                this.sizes = o.sizes

            }, 1500);
        }
    },

    mounted() { 
        $("#ModalquickView").on("hidden.bs.modal",  () => {
           this.color = null;
           this.size = null;
        });

    },

   

}
</script>