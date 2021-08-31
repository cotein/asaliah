
<script>

    import toast_mixin from './../../../../../mixins/toast-mixin';
    import sleep_mixin from './../../../../../mixins/sleep-mixin';
    import new_product_mixin from './../../../../../mixins/Products/NewProduct';
    import dropzone_upload_image_mixin from './../../../../../mixins/Products/Dropzone-Upload-Image';
    import product_form_base from './Product-form-base.vue';
    export default {

        extends : product_form_base,

        mixins : [new_product_mixin, dropzone_upload_image_mixin, sleep_mixin, toast_mixin],

        methods :{
            
            async upload_product(type)
            {   
                this.loading = true;

                await this.sleep(1000);

                if(this.$refs.productsImage.getQueuedFiles().length == 0)
                {
                    let product = await this.store_product();

                    if (product) {
                        this.loading = false;
                        this.message('Se guardó correctamente');
                        this.set_initial_status();

                        return;
                    }
                        
                }
                //dropzone
                this.$refs.productsImage.setOption("url", `/api/products/${type}`);
                let product = await this.upload();
                
                if (product) {
                    this.loading = false;
                    this.message('Se guardó correctamente');
                    this.set_initial_status();
                    return;
                }
            }
        }
    }
</script>