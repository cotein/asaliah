<template>
    <div class="container-indent">
		<div class="container-fluid">
			<div class="row tt-layout-promo-box">
				<div class="row">
					<category_box_component  v-for="(category, index) in Categories" :key="index" :category="category"></category_box_component>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import {mapActions, mapState, mapGetters} from 'vuex';
import category_box_component from './category-box-component';
export default {
    components : {
        category_box_component,
    },

    data(){
        return {

        }
    },
    methods : {
        
       
    },

    computed : {
        ...mapGetters([
            'Categories'
        ]),
    },

    beforeCreate(){
        this.$store.dispatch('fetchCategories');

    },
  
}
</script>