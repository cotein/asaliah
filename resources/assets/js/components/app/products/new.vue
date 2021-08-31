<template>
    <div>
        <loading 
            :active.sync="saving" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <form action="" class="form" >
            <div class="row">
                <div class="col-md-4">
                    <categories name="Categoría"></categories>
                </div>
                <div class="col-md-4" v-for="(cat, index) in $store.state.subcategories.sub_categories" :key="index">
                    <sub_categories :name="'Categoría nivel ' + (index+1)" :op="cat" :me="index"></sub_categories>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <suppliers_multiselect name="Proveedor"></suppliers_multiselect>
                </div>
                <div class="col-md-5">
                    <brand_multiselect name="Marca"></brand_multiselect>
                </div>
                <div class="col-md-2">
                    <priority_multiselect name="Prioridad"></priority_multiselect>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group" :class="{'has-error':RequiredName, 'has-error':MaxTitle}">
                        <label :class="{'help-block':RequiredName, 'has-error':MaxTitle}" for="form-control-1">Nombre</label>
                        <input class="form-control" type="text" v-model="product_name">
                        <small> 
                            <p>
                            Caracteres permitidos:
                            <span style="color: red;" v-text="(MaxTitleLength - ProductNameLength)"></span>
                            </p>
                        </small>
                        <p class="help-block" v-if="RequiredName">El título es requerido</p>
                        <p class="help-block" v-if="MaxTitle">El máximo de título permitido es de {{MaxTitleLength}} caracteres</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" :class="{'has-error':RequiredCode}">
                        <label for="form-control-1">Código de Producto</label>
                        <input class="form-control" type="text" v-model="code">
                        <small>En Mercado Libre será SKU</small>
                        <p class="help-block" v-if="RequiredCode">El código es requerido</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" >
                        <label for="form-control-1">Lista de Precios</label>
                        <multiselect placeholder="Lista de Precios" 
                            track-by="name" label="name"
                            v-model="products.product.price_list"
                            :options="GetEnablePriceList"
                            :searchable="true"
                            @select="setPricelist"
                            selectLabel="Lista de precio"
                            selectedLabel="Seleccionado"
                            deselectLabel="Remover"
                            >
                            
                            <span slot="noOptions">
                                    Lista Vacía
                            </span>
                            <span slot="noResult">
                                    La búsqueda no arrojó resultados
                            </span>
                        </multiselect>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group"  :class="{'has-error':RequiredPurchasePrice}">
                        <label  for="form-control-1">Precio Compra</label>
                        <vue-autonumeric 
                            class="form-control"
                            :options=options
                            v-model="original_price"
                        ></vue-autonumeric>
                        <p class="help-block" v-if="RequiredPurchasePrice">El código es requerido</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" :class="{'has-error':RequiredSalePrice}">
                        <label  for="form-control-1">Precio Venta</label>
                            <vue-autonumeric 
                                class="form-control"
                                :options=options
                                v-model="sale_price"
                            ></vue-autonumeric>
                        <p class="help-block" v-if="RequiredSalePrice">El código es requerido</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <iva name="Iva"></iva>
                </div>
                <div class="col-md-3">
                    <money name="Moneda"></money>
                </div>
                
            </div>    
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group" :class="{'has-error':RequiredStock}">
                        <label  for="form-control-1">Stock Disponible</label>
                            <vue-autonumeric 
                                class="form-control"
                                :options=int_Options
                                v-model="available_total"
                            ></vue-autonumeric>
                        <p class="help-block" v-if="RequiredStock">El stock es requerido</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group" :class="{'has-error':RequiredStock}">
                        <label  for="form-control-1">Cantidad a publicar</label>
                            <vue-autonumeric 
                                class="form-control"
                                :options=int_Options
                                v-model="available_quantity"
                            ></vue-autonumeric>
                        <p class="help-block" v-if="RequiredStock">El stock es requerido</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <item_condition name="Estado"></item_condition>
                </div>
                <div class="col-md-2">
                    <listing_types name="Tipo de Publicación"></listing_types>
                </div>
                
                <div class="col-md-3">
                    <buying_mode name="Modo de venta"></buying_mode>
                </div>
            </div>
            <div class="row">
            
            </div>
        
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label >Comentario</label>
                        <textarea v-model="description" class="form-control" rows="3"></textarea>
                        <small> 
                            <p>
                                Caracteres permitidos: 
                                <span style="color: red;" v-text="(MaxDescriptionLength - DescriptionLength)"></span>
                            </p>
                        </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Características</h3>
                <tabs :options="{ useUrlFragment: false }">
                    <tab name="Atributos del Producto">
                        <div class="row">
                            <allow_variation_attributes></allow_variation_attributes>
                        </div> 
                        <others_attributes></others_attributes>
                    </tab>
                    <tab name="Atributos de la Variante">
                        <variation_attributes ></variation_attributes>
                    </tab>
                    <tab name="Fotos">
                        <div class="text-center">
                            <vue-dropzone :options="dropOptions" 
                            ref="uploadImage" id="mi-vuedropzone"
                            @vdropzone-success-multiple="uploadOk">
                                
                            </vue-dropzone>
                            <button style="margin-top:15px" class="btn btn-primary" @click.prevent="upload()">Guardar producto</button>
                        </div>
                    </tab>
                </tabs>
            </div>
        </form>
    </div>
</template>

<script>

import iva from './../iva';
import money from './../money';
import vueDropzone from "vue2-dropzone";
import categories from './../categories';
import Loading from 'vue-loading-overlay';
import Multiselect from 'vue-multiselect';
import buying_mode from './../buying-mode';
import { mapFields } from 'vuex-map-fields';
import listing_types from './../listing_types';
import busVue from './../../../extras/eventBus';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import sub_categories from './../sub_categories';
import item_condition from './../item_condition';
import {mapActions, mapState, mapGetters} from 'vuex';
import others_attributes from './attributes/others_attributes';
import brand_multiselect from './attributes/brand_multiselect';
import { required, maxLength } from 'vuelidate/lib/validators'
import variation_attributes from './attributes/variation_attributes';
import priority_multiselect from './attributes/priority_multiselect';
import suppliers_multiselect from './attributes/suppliers_multiselect';
import allow_variation_attributes from './attributes/allow_variation_attributes';
import VueAutonumeric from '../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';

export default {
    props : ['token'],
    components: {
        VueAutonumeric, iva, money, buying_mode, categories, listing_types, 
        sub_categories, item_condition, Multiselect, variation_attributes,
        others_attributes, vueDropzone, suppliers_multiselect, brand_multiselect,
        priority_multiselect, allow_variation_attributes, Loading
    },
    
    data() {
        return {
            product_name : '',
            code : '',
            sale_price : '',
            original_price : '',
            stock : '',
            available_quantity : '',
            available_total : '',
            saving : false,
            color : null,
            options : {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbol: '$ ',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
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
                url: "/api/products/store",
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
                    product : null
                },
                parallelUploads : 5,
                uploadMultiple: true,
            }
        }
    },

    watch : {

        available_quantity(n) {
                this.$store.commit('SET_AVAILABLE_QUANTITY', n);
        },

        available_total(n) {
                this.$store.commit('SET_AVAILABLE_TOTAL', n);
        },

        product_name(n)
        {
            this.$store.commit('SET_NEW_PRODUCT_NAME', n);
        },

        code(n)
        {
            this.$store.commit('SET_NEW_PRODUCT_CODE', n);
        },

        stock(n)
        {
            this.$store.commit('SET_NEW_PRODUCT_STOCK', n);
        },

        original_price(n)
        {
            this.$store.commit('SET_NEW_PRODUCT_ORIGINAL_PRICE', n);
        },

        sale_price(n)
        {
            this.$store.commit('SET_NEW_PRODUCT_SALE_PRICE', n);
        },
    },

    validations() {
        return {
            product_name : {
                required,
                maxLength: maxLength(this.MaxTitleLength),
            },
            code : {
                required
            },
            original_price : {
                required
            },
            sale_price : {
                required
            },
            available_quantity : {
                required
            },
            description : {
                required,
                maxLength: maxLength(this.MaxDescriptionLength),
            }
        }
    },
    methods : {
        upload() {
            this.$store.commit('CLEAN_OTHER_ATTRIBURES');
            this.saving = true;
            this.dropOptions.headers.Authorization = 'Bearer ' + this.token;
            this.$store.commit('UPDATE_SUBMITTED', true);
            busVue.$emit('send_variation_attribute');
            setTimeout(() => {
                busVue.$emit('send_allow_variation_attribute');
            }, 100);
            setTimeout(() => {
                this.dropOptions.params.product = JSON.stringify(this.$store.state.products.product)
                this.$refs.uploadImage.processQueue();   
            }, 750);
        },

        uploadOk(){
            this.saving = false; 
            this.$toast.success('Producto guardado correctamente', 'Proceso Ok!', this.UploadVariationOK);
            this.$refs.uploadImage.removeAllFiles();
        },
        ...mapActions([
            'updateIvaValueAction',
            'fetchColours',
            'setPricelist'    
        ]),

         fetchMainCategories(_token){
            this.$store.dispatch('fetchMainCategories', _token);
        },
        
        fetchCategories(){
            this.$store.dispatch('fetchCategories');
        },

        updateAuthUserData(token){
            this.$store.dispatch('updateAuthUser', token);
        },

        SelectedColor(el){
            console.log(el);
            setTimeout(() => {
                this.$store.commit('VMODEL_COLOR', el);
            }, 150);
        },

        SelectedSize(el){
            console.log(el);
            setTimeout(() => {
                this.$store.commit('VMODEL_SIZE', el);
            }, 150);
        }
    },
    computed : {

        size : {
            get(){
                return this.ProductSize;
            },
            set(value){
                this.$store.commit('SET_NEW_PRODUCT_SIZE', value);
            }
        },

        description : {
            get(){
                return this.ProductDescription;
            },
            set(value){
                this.$store.commit('SET_NEW_PRODUCT_DESCRIPTION', value);
            }
        },

       

        RequiredName(){
            return (this.Submitted && !this.$v.name.required)
        },
        MaxTitle(){
            return (this.Submitted && !this.$v.name.maxLength)
        },
        RequiredCode(){
            return (this.Submitted && !this.$v.code.required)
        },
        RequiredPurchasePrice(){
            return (this.Submitted && !this.$v.original_price.required)
        },
        RequiredSalePrice(){
            return (this.Submitted && !this.$v.sale_price.required)
        },
        RequiredStock(){
            return (this.Submitted && !this.$v.available_quantity.required)
        },
       
        
        ...mapState(['products', 'ivas', 'money', 'categories', 'user', 'colour']),

        ...mapGetters(['OptionsColor', 'OptionsSize', 'Submitted', 'MaxTitleLength', 'MaxDescriptionLength',
            'ProductNameLength', 'DescriptionLength', 'UploadVariationOK',
            'ProductAvailableTotal',
            'ProductAvailableQuantity',
            'GetEnablePriceList'
        ]),
    },

    mounted(){
        this.updateAuthUserData(this.token);
        this.$store.dispatch('enablePriceLists', this.token);
    },
    
    beforeCreate(){
        setTimeout(() => {
            this.fetchMainCategories(this.user.token);
        }, 300);

        setTimeout(()=>{
            this.fetchColours(this.user.token);
        }, 300)
    }
}
</script>

