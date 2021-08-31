import {mapGetters} from 'vuex';

import 'vue2-dropzone/dist/vue2Dropzone.min.css';
    export default {
        
        data(){
            return {
                base_url : '/api/product/',
                type_url : null,
                loading : false,
                msg : "Guardando producto",
                dropzoneOptions: {
                    dictDefaultMessage: "Seleccionar imágenes",
                    url: "/api/products/",
                    thumbnailWidth: 150,
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    maxFilesize: 2,
                    dictRemoveFileConfirmation:  "Cancelar imagen?",
                    dictRemoveFile : 'Quitar imagen',
                    dictCancelUpload : 'Cancelar subida',
                    dictCancelUploadConfirmation : "¿Desea cancelar la subida de ésta imagen?",
                    dictUploadCanceled : 'Cancelada',
                    dictFileTooBig : 'Se exede el tamaño permitido',
                    headers: {
                        Authorization: null
                    },
                    params : {
                        product : null,
                        categories_path : null,
                        selected_categories_from_root : null,
                    },
                    init : function() {
                        this.on("error", function(file, message) { 
                            this.removeFile(file); 
                        });
                    },
                    parallelUploads : 5,
                    maxFiles : 5,
                    dictMaxFilesExceeded : 'Sólo se permiten 5 imágenes por producto',
                    uploadMultiple: true,
                }
            }
        },

        methods : {
            
            success_multiple_files_message(){
                    this.$toast.success('Producto', 'Proceso realizado correctamente' , {
                    timeOut : 4000,
                    resetOnHover: true,
                    titleColor : 'black',
                    messageColor : 'black',
                    theme: 'dark',
                    icon: 'icon icon-check',
                    iconColor : 'black',
                    progressBarColor: 'rgb(0, 255, 184)',
                    pauseOnHover : false,
                });   
            },

            upload() {
                
                this.loading = true;
                this.dropzoneOptions.headers.Authorization = 'Bearer ' + this.User.token;
                this.dropzoneOptions.params.product = JSON.stringify(this.ProductGetter)
                this.dropzoneOptions.params.categories_path = JSON.stringify(this.ChildCategories)
                this.dropzoneOptions.params.selected_categories_from_root = JSON.stringify(this.SelectedCategoriesFromRootGetter)
                this.$refs.productsImage.processQueue();   
            },

            sendingEvent (file, xhr, formData) {
                console.log(file); // -> {}
                //formData.append('productid', this.$store.state.products.product);
                console.log('sendingEvent'); // -> {}
                console.log(formData); // -> {}
            },

            SuccessMethod(file, response){
                return response; 
            },

            SuccessMultipleFiles(file, response){
                this.$refs.productsImage.removeAllFiles();
                this.loading = false;
                this.success_multiple_files_message();
                this.$store.commit('SET_CATEGORY_INITIAL_STATUS');
                this.$store.commit('NEW_PRODUCT_SET_INITIAL_STATUS');
            }
        },

        computed : {

            ...mapGetters([
                'ProductGetter',
                'ChildCategories',
                'SelectedCategoriesFromRootGetter'
            ])
        }
    }