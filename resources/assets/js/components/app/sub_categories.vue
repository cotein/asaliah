<template>
    <div class="form-group">
        <label  >{{name}}</label>
        <multiselect placeholder="Elegir una opción" 
            :value="sub_category" 
            @input="updateSubCategoryValueAction" 
            track-by="name" label="name"
            :loading="show_spinner"
            @select="getSubCategoriesFromSub"
            :options="op">
        </multiselect>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
import Multiselect from 'vue-multiselect'
export default {
    props : ['name', 'me', 'op'],
    components: {
        Multiselect
    },
    
    data() {
        return {
            show_spinner : false,
            sub_category : null
        }
    },
    methods : {
        ...mapActions(['updateSubCategoryValueAction', 'fetchChildrenCategories']),

        updateChildrenCategoriesArray(){
            let num = this.subcategories.sub_categories.length;
        
            this.subcategories.sub_categories.splice(this.me + 1, num - (this.me+1));
        },

        getSubCategoriesFromSub(el){
            this.updateChildrenCategoriesArray()
            let obj = {
                token : this.user.token,
                category : el.id
            }
            this.sub_category = el;
            
            this.fetchChildrenCategories(obj)

            setTimeout(() => {
                this.$store.commit('ADD_SUBCATEGORY', this.sub_category);    
            }, 150);
            
        },

        getAttributesFromCategory(el){
            let obj = {
                token : this.user.token,
                category : el.id
            }
            this.sub_category = el;

            this.fetchAttributes(obj)
        }
        
    },
    computed : {
         ...mapState(['products', 'subcategories', 'categopries', 'user', 'attributes'])
    },
    mounted(){

    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

