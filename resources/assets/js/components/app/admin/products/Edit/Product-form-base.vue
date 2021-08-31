<template>
    <ProductFormSlots>
        <template #categories>
            <div class="col-md-12 separate">
                <div class="col-md-6 separate">
                    <label class="control-label">Categorías</label>
                    <multiselect_parent_categories ></multiselect_parent_categories>
                </div>
                <div class="col-md-12 separate" v-if=" ChildCategories && ChildCategories.length > 0">
                    <div class="col-md-4" v-for="(child, index) in ChildCategories" :key="index">
                        <label>Subcategorías</label> 
                        <multiselect_child_categories :index="index"/>           
                    </div>                 
                </div>
            </div>
        </template>

        <template #name>
            <div class="col-md-12 separate" >
                <div class="col-md-6" > 
                    <div class="form-group-md">
                        <label class="control-label" >Nombre del Producto</label>
                        <input class="form-control" type="text" placeholder="Nombre" v-model="product_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="control-label" >Código</label>
                    <input class="form-control" type="text" placeholder="Código del producto" v-model="product_code">
                </div>
            </div>
        </template>

        <template #supplier>
            <div class="col-md-12 separate">
                <div class="col-md-6">
                    <label class="control-label" >Proveedor</label>
                    <multiselect_provider />
                </div>
            </div>
        </template>
        <template #supplier_product>
            <div class="col-md-12 separate">
                <div class="col-md-6" >
                    <div class="form-group-md">
                        <label class="control-label" >Nombre del producto en el proveedor</label>
                        <input class="form-control" type="text" 
                            v-model="name_on_supplier"
                        >
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="form-group-md">
                        <label class="control-label" >Código del producto en el proveedor</label>
                        <input class="form-control" type="text" 
                            v-model="code_on_supplier"
                        >
                    </div>
                </div>
            </div>
        </template>

        <template #attributes>
            <div class="col-md-12 separate" v-if="AttributesOfProductGetter.length">
                <h5 >Atributos del producto</h5>
                <attribute v-for="(attr, index) in AttributesOfProductGetter" :key="index" :attr="attr" :index="index"/>
            </div>
        </template>

        <template #price_list>
            <div class="col-md-12 separate">
                <h5 >Lista de Precios</h5>
                <price_list_table />
            </div>
        </template>

        <template #description>
            <div class="col-md-12 separate">
                <h5 >Descripción</h5>
                <ckeditor v-model="description" 
                ></ckeditor>
            </div>
        </template>

        <template #pictures>
            <div class="col-md-12 separate" v-if="pictures.length">
                <h5 >Imágenes del producto</h5>
                <ul class="file-list">
                    <li class="file" v-for="(pic, index) in pictures" :key="index">
                        <a class="file-link" :href="pic.url" :title="pic.name" :download="pic.name">
                            <div class="file-thumbnail" :style="{ 'background-image' : 'url(' + pic.url + ')' }"></div>
                            <div class="file-info">
                                <span class="file-name text-center">{{pic.name}}</span>
                            </div>
                        </a>
                        <button class="file-delete-btn delete" 
                            @click="delete_picture(pic.id)"
                            title="Eliminar" 
                            type="button">
                            <span class="icon icon-remove"></span>
                        </button>
                    </li>
                </ul>
            </div>
        </template>
        
        <template #upload-images>
            <div class="col-md-12 separate">
                <h5 >Imágenes</h5> <small>Se permite haste 5 imágenes por producto</small>
                <vue-dropzone 
                    ref="productsImage" 
                    id="images" 
                    :options="dropzoneOptions" 
                    :vdropzone-sending="sendingEvent"  
                    :vdropzone-success="SuccessMethod"
                    @vdropzone-success-multiple="SuccessMultipleFiles"
                >
                    
                </vue-dropzone>
            </div>
        </template>
        <template #submit-button>
            <div class="text-center">
                <button class="btn btn-primary" @click="edit_product('update')">Actualizar</button>
            </div>
            <BlockUI :message="msg" v-if="loading"></BlockUI>
        </template>
    </ProductFormSlots>
</template>

<script>
import vueDropzone from "vue2-dropzone";
import ProductFormSlots from './../Base/Product-Form-Slots';
export default {
    
    props : ['show_pictures'],

    components : {ProductFormSlots, vueDropzone}
}
</script>

<style scoped>
    input[type=text] {
        height: 41px;
    }
    .separate {
        margin-bottom: 2rem;
    }   
    textarea{
        resize: none;
    }
</style>