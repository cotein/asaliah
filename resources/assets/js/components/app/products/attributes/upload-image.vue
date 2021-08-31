<template>
    <div class="text-center">
        <vue-dropzone :options="dropOptions" :vdropzone-sending="sendingEvent"  ref="uploadImage" id="mi-vuedropzone">
            
        </vue-dropzone>
        <button style="margin-top:15px" class="btn btn-primary" @click.prevent="upload()">Subir Imágenes</button>
    </div>
</template>

<script>
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import busVue from './../../../../extras/eventBus';
export default {
    props : ['token'],
    components: {
        vueDropzone
    },
    data() {
        return {
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
    methods : {
        upload() {
            this.dropOptions.headers.Authorization = 'Bearer ' + this.token;
            this.$store.commit('UPDATE_SUBMITTED', true);
            busVue.$emit('send_variation_attribute');
            setTimeout(() => {
                this.dropOptions.params.product = JSON.stringify(this.$store.state.products.product)
                this.$refs.uploadImage.processQueue();   
            }, 3000);
        },
        sendingEvent (file, xhr, formData) {
            console.log(file); // -> {}
            //formData.append('productid', this.$store.state.products.product);
            console.log(formData); // -> {}
        },
    },
    computed : {
        Token(){
            return this.$store.state.user.token;
        },

        Product(){
            return this.$store.state.products.product;
        }
    },
    mounted() {
    },
}
</script>

