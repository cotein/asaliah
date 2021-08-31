<template>
    <div class="row-xs">
        <div class="col-md-12 s--3rem">
            <div class="col-md-4">
                <label>Categoría madre</label>
                <multiselect_parent_categories_new />
            </div>
            <div class="form-group col-md-2">
                <div class="checkbox" >
                    <label class="vertical--align">
                        <input type="checkbox" name="mode" v-model="isParentCategory"> Es categoría madre
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12 s--3rem" v-if="ChildCategories.length > 0">
            <div class="col-md-4" v-for="(child, index) in ChildCategories" :key="index">
                <label>Subcategorías</label>
                <multiselect_child_categories_new   :index="index"/>
            </div>
        </div>
        <div class="col-md-12 s--3rem">
            <div class="form-group col-md-6">
                <label>Nombre de la Categoría</label>
                <input v-model="name" class="form-control" type="text" placeholder="Nombre de nueva categoría">
            </div>
            <div class="col-md-3 text-center">
                <button 
                    @click="category_store" 
                    style="margin-top:3rem" 
                    class="btn btn-primary" 
                    :class="{'spinner spinner-inverse spinner-sm' : spinner}"
                    >Guardar</button>
            </div>
        </div>
        <attributes />
        
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import attributes from './attributes.vue';
    import sleep_mixin from './../../../../../mixins/sleep-mixin';
    import toast from './../../../../../mixins/toast-mixin';
    import multiselect_parent_categories_new from './multiselect-parent-categories-new';
    import multiselect_child_categories_new from './multiselect-child-categories-new';
    export default {
        components : {
            multiselect_parent_categories_new, multiselect_child_categories_new, attributes
        },

        mixins : [sleep_mixin, toast],

        data(){
            return {
                spinner : false
            }

        },

        methods : {

            async category_store()
            {
                this.spinner = true;

                this.sleep(500);

                let payload = {
                    token : this.User.token,
                    name : this.NewCategory.name,
                    parent_id : this.NewCategory.parent_id,
                    attributes : this.AttributesFromCategoryGetter
                }

                let category = await this.$store.dispatch('category_store', payload)
                .catch(err => {
                    
                    if (err.response.status == 422) {
                        
                        for (const e in err.response.data.errors){
                            this.error_message(err.response.data.errors[e][0], 'Categoría');
                        }
                       
                    }
                }).finally(()=> this.spinner = false);

                if (category) {
                    this.success_message('Categoría creada satisfactoriamente', 'Categorías' );
                    this.$store.commit('SET_CATEGORY_INITIAL_STATUS');
                }
            }
        },

        computed : {

            ...mapGetters([
                'NewCategory',
                'IsParentCategoryGetter',
                'AttributesFromCategoryGetter',
                'ChildCategories'
            ]),

            name : {
                get(){
                    return this.NewCategory.name;
                },
                set(value){
                    this.$store.commit('NEW_CATEGORY_SET_NAME', value);
                }
            },

            isParentCategory : {

                get(){
                    return this.IsParentCategoryGetter
                },

                set(value){
                    this.$store.commit('NEW_CATEGORY_SET_IS_PARENT_CATEGORY', value);
                    
                    if (this.IsParentCategoryGetter) {
                        
                        let payload = {
                            id : 0
                        }

                        this.$store.commit('NEW_CATEGORY_SET_PARENT_ID', payload);
                    }
                }
            }
        },
    }
</script>

<style scoped>
    input[type=text] {
        height: 41px;
    }
    .vertical--align{
        margin-top: 2rem;
    }
    .s--3rem{
        margin-bottom : 3rem;
    }
</style>