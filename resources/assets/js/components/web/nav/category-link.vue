<template>
    <li >
        aaaaaaaaaaaaaaaa
    </li>
    <!-- <li :class="{'active' : active}" v-if="category.show">
        <a :class="{'disabled' : disabled}" @click.prevent="apply_category_filter" href="#">{{category.parent_name}}</a>
    </li> -->
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import {Checkbox} from 'vue-checkbox-radio';
export default {
    props : ['category'],
    components : {
        Checkbox
    },
    data(){
        return {
            selected : null,
            disabled : false,
            active : false,
            pagination : {
                current_page : 1
            },
            model : false
        }
    },
    methods : {
        apply_category_filter(){

            this.$store.commit('ADD_CATEGORY_FILTER', this.category);

            this.category.show = false;

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
        },

        changePage(page) {
            if (page == this.pagination.last_page) {
                this.disabled = true;
            }
            this.pagination.current_page = page;
        },

        getPublicationsByCategory(category){

            this.selected = category.slug;

            Event.$emit('selected_link', category.slug);

            this.changePage(this.pagination.current_page);

            this.$store.commit('SET_LOADING', true);

            return axios.get('/categorias/' + category.slug + '?page=' + this.pagination.current_page)
            .then((result) => {

                this.pagination = result.data.pagination
                
                this.$store.commit('SET_PUBLICATIONS_WEB_BY_CATEGORY', result.data.data);
                
                this.$store.commit('SET_LOADING', false);

            }).catch((err) => {

            });
        },
    },

    watch : {
        model(newValue, oldValue){
            if (newValue) {
                this.$store.commit('ADD_CATEGORY_FILTER', {'category_id' : this.category.code});

                this.$store.dispatch('filtered_data')           
                .then((result) => {
                    this.$store.commit('SET_PUBLICATIONS_WEB', result.data.data)
                }).catch((err) => {
                    
                });
            }

            if (! newValue) {
                
                this.$store.commit('DELETE_CATEGORY_FILTER', this.category.code)
                
                this.$store.dispatch('filtered_data')           
                .then((result) => {
                    this.$store.commit('SET_PUBLICATIONS_WEB', result.data.data)
                }).catch((err) => {
                    
                });
                
            }

        }
    },
    mounted(){
       
        Event.$on('selected_link', (category)=>{
            if (this.selected == category) {
                this.active = true;
            }else{
                this.active = false;
                this.disabled = false;
            }
        })        
    }
}
</script>
<style scoped>
    .disabled {
        pointer-events: none;
        text-decoration:line-through;
    }
</style>