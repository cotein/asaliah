<template>
    <div class="row">
        <div class="text-center">
            <vue-dropzone :options="dropOptions" ref="uploadImage" id="mi-vuedropzone" 
                @vdropzone-success-multiple="uploadOk"
            >
            </vue-dropzone>
        </div>
    </div>
</template>

<script>
import vueDropzone from "vue2-dropzone";
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import {mapActions, mapState, mapGetters} from 'vuex';
import { required, maxLength } from 'vuelidate/lib/validators';
export default {
    components : {
        vueDropzone
    },

    data() {
        return {
            submitted : false,
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
        }
    },

    validations(){
        return {
            available_total : {
                required
            },
            available_quantity : {
                required
            },
            form: ['available_total', 'available_quantity']
        }
    },

    methods : {
        uploadOk(file, response){
            this.product = response;
            this.$toast.success('Variante guardada correctamente', 'Proceso Ok!', this.UploadVariationOK);
            this.$refs.uploadImage.removeAllFiles();
        },

        validate() {
            this.$v.form.$touch();
            this.submit();
            var isValid = !this.$v.form.$invalid
            this.$emit('on-validate', this.$data, isValid)
            return isValid
        },

        submit(){
            this.submitted = true;
        }
    },
    
    computed: {
        
    },
}
</script>

<style>

</style>
