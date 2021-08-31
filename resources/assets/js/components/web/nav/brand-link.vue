<template>
    <li v-if="brand.show" >
        <a @click.prevent="apply_brand_filter"  href="#">{{brand.name}}</a>
    </li>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import {Event} from 'vue-tables-2';
import {Checkbox} from 'vue-checkbox-radio';
export default {
    props : ['brand', 'products'],
    components : {
        Checkbox
    },
    data(){
        return {
            selected : null,
            disabled : false,
            active : true,
            pagination : {
                current_page : 1
            },
            model : null
        }
    },
    
    methods : {
        apply_brand_filter(){

            this.$store.commit('ADD_BRAND_FILTER', this.brand);

            this.brand.show = false;

            this.$store.commit('FORCE_INIT_PAGINATION');

            setTimeout(() => {
                
                this.$store.dispatch('filtered_data')
                .then((result) => {
                    
                    this.$store.commit('CLEAR_PUBLICATIONS');

                    this.$store.commit('SET_PUBLICATIONS_WEB_WITH_PAGINATION', result.data.data);

                    this.$store.commit('SET_PAGINATION', result.data.pagination)

                }).catch((err) => {
                    
                });

            }, 250);
            
        }
    },

    watch : {
        PublicationsWeb(newValue, oldValue){

            let products = collect(this.PublicationsWeb);

            products.filter((product) =>  {

                if ( product.brand_id == this.brand.id) {
                    return product;
                }else{
                    this.disabled = true
                }

            }).each((p)=>{

                if ( p.brand_id == this.brand.id) {
                    this.active = false;
                    this.disabled = false;
                }
                
            });
        }
    },
    
    computed : {
        Active(){
            if (!this.active && !this.disabled) {
                return true;
            }
        },

        ...mapGetters([
            'PublicationsWeb',
        ])
    },

    mounted() {
        
    },
}
</script>
<style>
    .mi-color {
        font-weight: bold;
        text-decoration:line-through;
    }
</style>