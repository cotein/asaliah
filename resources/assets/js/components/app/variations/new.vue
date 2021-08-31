<template>
<div>
    <loading 
        :active.sync="saving" 
        color="#0469c7"
        :can-cancel="false" 
        :is-full-page="true">
    </loading>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="form-control-1">Buscar Producto</label>
                <multiselect 
                    v-model="product" 
                    placeholder="Seleccionar un producto" 
                    :hide-selected="true"
                    label="name" track-by="name" 
                    :options="ProductList" 
                    @select="selectedProduct"
                    :loading="LoadingProducts"
                    :show-labels="false">
                </multiselect>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-6"  v-if="product">
                <variation_by_product :variations="product.variation"></variation_by_product>
            </div>
            <div class="col-md-12">
                <tabs :options="{ useUrlFragment: false }">
                    <tab name="Cantidad">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group" :class="{'has-error':RequiredStock}">
                                    <label  for="form-control-1">Stock Disponible</label>
                                        <vue-autonumeric 
                                            class="form-control"
                                            :options=int_Options
                                            v-model="variation.available_total"
                                        ></vue-autonumeric>
                                    <p class="help-block" v-if="RequiredStock">El stock es requerido</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" :class="{'has-error':RequiredStock}">
                                    <label  for="form-control-1">Stock a publicar</label>
                                        <vue-autonumeric 
                                            class="form-control"
                                            :options=int_Options
                                            v-model="variation.available_quantity"
                                        ></vue-autonumeric>
                                    <p class="help-block" v-if="RequiredStock">El stock es requerido</p>
                                </div>
                            </div>
                        </div>
                    </tab>
                    <tab name="Atributos de la Variante">
                        <div class="row" style="margin-bottom:15px">
                            <allow_variation_attributes></allow_variation_attributes>
                        </div> 
                        <div class="row">
                            <variation_attributes></variation_attributes>
                        </div>
                    </tab>
                    <tab name="Fotos">
                        <div class="text-center">
                            <vue-dropzone :options="dropOptions" ref="uploadImage" id="mi-vuedropzone" 
                            @vdropzone-success-multiple="uploadOk"
                            >
                            </vue-dropzone>
                        </div>
                        <!-- <upload-image :token="$store.state.user.token"></upload-image> -->
                    </tab>
                </tabs>
            </div>
<!--         </slide-up-down> -->
    </div>
   
    <div class="row">
        <button class="btn btn-danger center-block" @click.prevent="upload()" >
            Agregar Variación
        </button>
    </div>
</div>
</template>

<script>
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import collect from 'collect.js';
import SlideUpDown from 'vue-slide-up-down'
import modal from 'vue-semantic-modal';
import Multiselect from 'vue-multiselect';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import {mapGetters} from 'vuex';
import variation_attribute_input from './../../app/products/attributes/variation_attribute_input';
import VueAutonumeric from '../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
import attr_color from './../../app/products/attributes/attr-color__';
import attr_size from './../../app/products/attributes/attr-size';
import busVue from './../../../extras/eventBus';
import variation_by_product from './../info/variations-by-product';
import error_notification from './../../notifications/error-notification';
import allow_variation_attributes from './../products/attributes/allow_variation_attributes';
import variation_attributes from './../products/attributes/variation_attributes';
export default {
    props : ['token'],
    components: {
        modal,
        Multiselect,
        Loading,
        SlideUpDown,
        variation_attributes,
        attr_color,
        attr_size,
        vueDropzone,
        VueAutonumeric,
        variation_by_product,
        allow_variation_attributes
    },
    data() {
        return {
            show_attributes : false,
            product : null,
            variation : {
                product_id : null,
                price : null,
                attributes : [],
                picture_ids : [],
                sold_quantity : 0,
                available_total : null,
                available_quantity : 0,
                seller_custom_field : null,
                attribute_combinations : []
            },
            int_Options : {
                decimalPlaces : 0,
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
            dropOptions: {
                dictDefaultMessage: "Hacer click aquí para seleccionar una o varias imágenes",
                url: "/api/variations/store",
                thumbnailWidth: 150,
                autoProcessQueue: false,
                addRemoveLinks: true,
                dictRemoveFileConfirmation:  "¿Desea cancelar la subida de ésta imagen?",
                dictRemoveFile : 'Quitar imagen',
                dictCancelUpload : 'Cancelar subida',
                dictCancelUploadConfirmation : "¿Desea cancelar la subida de ésta imagen?",
                headers: {
                    Authorization: null
                },
                params : {
                    variation : null
                },
                parallelUploads : 5,
                uploadMultiple: true,
                maxFiles : 10
            },
            saving : false,
            initial : false,
            colors : [],
            sizes : [],
            exist_variation_color : null,
            exist_variation_size : null,
        }
    },
    methods: {
        uploadOk(file, response){
            this.product = response;
            this.saving = false; 
            this.$toast.success('Variante guardada correctamente', 'Proceso Ok!', this.UploadVariationOK);
            this.$refs.uploadImage.removeAllFiles();
        },
        upload() {
            this.saving = true;
            this.dropOptions.headers.Authorization = 'Bearer ' + this.token;

            this.variation.seller_custom_field = this.sellerCustomField();
            this.variation.product_id = this.product.product_id;
            this.variation.price = this.product.price;

            busVue.$emit('request_attribute_from_variation');

            setTimeout(() => {
                busVue.$emit('give_me_attribute_combinations');
            }, 100);

            setTimeout(() => {
                this.dropOptions.params.variation = JSON.stringify(this.variation)
                this.$refs.uploadImage.processQueue();  
            }, 1000);
        },

        sellerCustomField(){
            let count = collect(this.product.variation).count();

            return this.product.children_category.id + '-000' + count;
        },

        initialStatusVariation(){
            this.colors = [];
            this.sizes = [];
            this.variation.price = null;
            this.variation.attributes = [];
            this.variation.picture_ids = [];
            this.variation.sold_quantity = 0;
            this.variation.available_total = null;
            this.variation.available_quantity = 0;
            this.variation.seller_custom_field = null;
            this.variation.attribute_combinations = [];
        },
        getAttributes(){
            this.$store.dispatch('getAttributes');
        },

        getProducts(){
            this.$store.dispatch('fetchProducts', this.token);
        },

        selectedProduct(el){
            let data;
            let children_category;
            let $vm = this;
            $vm.saving = true;
            $vm.initialStatusVariation();
            let categories = collect(el.children_category);
            if (!categories.has('id')) {
                children_category = categories.pop();
                $vm.$store.commit('SET_CATEGORY', children_category.id);
                children_category = children_category.id;

               
            }
            if(categories.has('id')){
                $vm.$store.commit('SET_CATEGORY', categories.get('id'));
                children_category = categories.get('id');
            }

            data = {
                token : $vm.token,
                category : children_category
            }

            setTimeout(() => {
                $vm.$store.dispatch('fetchAttributes', data)
                .then(() => {
                    $vm.show_attributes = true;
                    $vm.colors = $vm.GetAttributeColor
                    $vm.sizes = $vm.GetAttributeSize
                    $vm.saving = false;
                }).catch((err) => {
                      
                });
            }, 500);
        }
    },
    computed: {
        ...mapGetters([
            'ProductList', 
            'LoadingAttributes', 
            'LoadingProducts',
            'GetVariationAttributes',
            'GetAttributeColor',
            'GetAttributeSize',
            'UploadVariationOK',
            'ExistVariationTrue'
        ]),

        RequiredStock(){
            return true;
        },

        VariationColors(){
            if (this.colors.length > 0)  {
                return collect(this.colors[0].values).sortBy('name', 'asc').all();
            }         
            
            return [];
        },

        VariationSizes(){
            if (this.sizes.length > 0)  {
                return this.sizes[0].values;
            }         
            
            return [];
        },

        ExistVariation(){
            return (this.exist_variation_color == null && this.exist_variation_size == null) ? false :  (this.exist_variation_color == this.exist_variation_size);
        }

    },
    watch: {
        ExistVariation(nuevo, antiguo){
            if (nuevo) {
                this.variation.attribute_combinations = [];
                this.$toast.error('Variante ya existente', 'Cambiar valores!', this.ExistVariationTrue);
            }
        }
    },  
    mounted() {
        let $vm = this;
        $vm.$store.commit('SET_TOKEN', $vm.token);

        setTimeout(() => {
            return $vm.getProducts();
        }, 1000);

        busVue.$on('selected_color', (color)=>{
            $vm.exist_variation_color = null;
            let attribute_combinations = collect($vm.variation.attribute_combinations);

            attribute_combinations.each((item, index)=>{
                if (item.id == 'color') {
                    $vm.$delete($vm.variation.attribute_combinations, index);
                }
            });

            $vm.$set($vm.variation.attribute_combinations, attribute_combinations.count(), color)

            collect($vm.product.variation).each((variation, index)=>{
                collect(variation.attribute_combinations).each((attr)=>{
                    if (attr.id == 'color' && attr.value_name == color.value_name) {
                        $vm.exist_variation_color = true;
                    }
                })
            });
        });

        busVue.$on('selected_size', (size)=>{
            $vm.exist_variation_size = null;
            let attribute_combinations = collect($vm.variation.attribute_combinations);

            attribute_combinations.each((item, index)=>{
                if (item.id == 'size') {
                    $vm.$delete($vm.variation.attribute_combinations, index);
                }
            });

            $vm.$set($vm.variation.attribute_combinations, attribute_combinations.count(), size)

            collect($vm.product.variation).each((variation, index)=>{
                collect(variation.attribute_combinations).each((attr)=>{
                    if (attr.id == 'size' && attr.value_name == size.value_name) {
                         $vm.exist_variation_size = true;
                    }
                })
            });
        });

        busVue.$on('send_attribute_from_variation_attribute_input', (attribute)=>{
            
            let attributes = collect($vm.variation.attributes);

            $vm.$set($vm.variation.attributes, attributes.count(), attribute)

        });

        busVue.$on('send_you_attribute_combinations', (attribute_combinations) => {
            $vm.variation.attribute_combinations.push(attribute_combinations)
        })

    },
}
</script>

<style>

</style>
