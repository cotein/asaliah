<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            :value="products.product.category" 
            @input="updateCategoryValueAction" 
            track-by="name" label="name"
            @select="getSubCategoriesFromMain"
            :options="categories.main_categories">
        </multiselect>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
import Multiselect from 'vue-multiselect';
export default {
    props : ['name', 'value'],
    components: {
        Multiselect
    },
    data() {
        return {
            has_children_categories : false
        }
    },
    methods : {
        ...mapActions(['updateCategoryValueAction', 'fetchChildrenCategories']),
        
        getSubCategoriesFromMain(el){
            this.cleanCategories()
            let obj = {
                token : this.user.token,
                category : el.id
            }
            this.fetchChildrenCategories(obj)
        },

        cleanCategories(){
            this.subcategories.sub_categories = []
        },
       

    },
    computed : {
         ...mapState(['products', 'categories', 'subcategories', 'user'])
    },
    mounted(){
       
      
    }, 
   
   
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

