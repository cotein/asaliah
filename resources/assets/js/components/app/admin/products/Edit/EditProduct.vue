<script>
    import Form_Product_base from './Product-form-base.vue';
    import sleep_mixin from './../../../../../mixins/sleep-mixin';
    import new_product_mixin from './../../../../../mixins/Products/NewProduct';
    import edit_product_mixin from './../../../../../mixins/Products/EditProduct';
    import dropzone_upload_image_mixin from './../../../../../mixins/Products/Dropzone-Upload-Image';
    export default {
        
        extends : Form_Product_base,

        mixins : [
            new_product_mixin, 
            edit_product_mixin,
            dropzone_upload_image_mixin,
            sleep_mixin
        ],

        props : ['product_id'],

        data(){
            return {
                pictures : []
            }
        },

        methods : {

            async delete_picture(id)
            {
                let payload = {
                    token : this.User.token,
                    picture_id : id
                }

                let img = await this.$store.dispatch('delete_picture', payload)
                    .catch(err => console.log(err));

                if (img) {
                    
                    this.pictures.forEach((pic, index) => {
                        if (pic.id == id) {
                            this.pictures.splice(index, 1);
                        }
                    })
                }   
            },

            async edit_product(type)
            {   
                this.loading = true;

                await this.sleep(1000);

                if(this.$refs.productsImage.getQueuedFiles() && this.$refs.productsImage.getQueuedFiles().length == 0)
                {
                    let product = await this.update_product();

                    if (product) {
                        this.loading = false;
                        this.message('Se actualizó correctamente');
                        this.set_initial_status();

                        return;
                    }
                        
                }
                //dropzone
                console.log('type');
                console.log(type);
                ///this.$refs.productsImage.setOption("method", 'PUT');
                this.$refs.productsImage.setOption("url", `/api/products/${type}`);
                let product = await this.upload();
                
                if (product) {
                    this.loading = false;
                    this.message('Se actualizó correctamente');
                    this.set_initial_status();
                    return;
                }
            }
        },

        async mounted(){

            let payload = {
                token : this.User.token,
                product_id : this.product_id
            }

            let product = await this.$store.dispatch('find_product_by_id', payload)
            .catch(e => {
                console.log(e);
            })

            if (product) {
                console.log('product');
                console.log(product);
                this.pictures = product.data.pictures;
                this.$store.commit('SET_CATEGORIES_TO_SELECTED_CATEGORIES_FROM_ROOT', product.data.selected_categories_from_root);
                this.$store.commit('EDIT_PRODUCT_SET_CHILD_CATEGORIES', product.data.categories_path);
                this.$store.commit('NEW_PRODUCT_SET_SUPPLIER_DATA', product.data.supplier);
                this.$store.commit('NEW_PRODUCT_SET_PRODUCT_CODE_ON_SUPPLIER', product.data.code_on_supplier);
                this.$store.commit('NEW_PRODUCT_SET_PRODUCT_NAME_ON_SUPPLIER', product.data.name_on_supplier);
                this.$store.commit('NEW_PRODUCT_SET_NAME', product.data.name);
                this.$store.commit('NEW_PRODUCT_SET_CODE', product.data.code);
                this.$store.commit('NEW_PRODUCT_SET_DESCRIPTION', product.data.description);
                this.$store.commit('EDIT_PRODUCT_SET_ID', product.data.id);

                product.data.price.forEach((element, index) => {

                    let price = {
                        index : index,
                        price_list_id : element.price_list_id,
                        price : element.price
                    };
                    
                    this.$store.commit('EDIT_PRODUCT_SET_PRICE', price);
                    
                });
            }

        }
    }
</script>