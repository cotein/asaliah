    import {mapGetters} from 'vuex';
    import toast_mixin from './../../mixins/toast-mixin';
    import attribute from  './../../components/app/admin/products/new/attribute';
    import price_list_table from  './../../components/app/admin/products/new/price-list-table.vue';
    import multiselect_parent_categories from  './../../components/app/admin/products/new/multiselect-parent-categories.vue';
    import multiselect_child_categories from  './../../components/app/admin/products/new/multiselect-child-categories.vue';
    import multiselect_provider from  './../../components/app/admin/products/new/multiselect-provider.vue';
    export default {
        
        components : {
            multiselect_parent_categories, multiselect_child_categories, multiselect_provider, price_list_table,
                attribute
        },

        mixins : [toast_mixin],
        
        data(){
            return{
                parent_id : '',
                msg : 'Guardando producto...',
                loading : false
            }
        },

        computed : {
            
            product_name : {
                get(){
                    return this.ProductGetter.name
                },
                set(value){
                    this.$store.commit('NEW_PRODUCT_SET_NAME', value);
                }
            },

            product_code : {
                get(){
                    return this.ProductGetter.code
                },
                set(value){
                    this.$store.commit('NEW_PRODUCT_SET_CODE', value);
                }
            },

            code_on_supplier : {
                get(){
                    return this.ProductGetter.code_on_supplier
                },
                set(value){
                    this.$store.commit('NEW_PRODUCT_SET_PRODUCT_CODE_ON_SUPPLIER', value);
                }
            },

            name_on_supplier : {
                get(){
                    return this.ProductGetter.name_on_supplier
                },
                set(value){
                    this.$store.commit('NEW_PRODUCT_SET_PRODUCT_NAME_ON_SUPPLIER', value);
                }
            },

            description : {
                get(){
                    return this.ProductGetter.description;
                },
                set(value){
                    this.$store.commit('NEW_PRODUCT_SET_DESCRIPTION', value);
                }
            },

            ...mapGetters([
                'Categories',
                'AttributesOfProductGetter',
                'ProductGetter',
                'ChildCategories',
                'SelectedCategoriesFromRootGetter'
            ]),
            
        },

        methods : {
            
            message(message)
            {
                this.success_message('Producto', message);
            },

            set_initial_status()
            {
                this.$store.commit('SET_CATEGORY_INITIAL_STATUS');
                this.$store.commit('NEW_PRODUCT_SET_INITIAL_STATUS');
            },
            
            async store_product()
            {
                let payload = {
                    token : this.User.token,
                    product : this.ProductGetter,
                    categories_path : this.ChildCategories,
                    selected_categories_from_root : this.SelectedCategoriesFromRootGetter
                }
                
                let product = await this.$store.dispatch('store_product', payload)
                    .catch(err => {
                        console.log(err);
                    })

                if (product) {
                    return product;
                }
            },

        },
       
    }