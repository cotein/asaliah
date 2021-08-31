<template>
    <li 
        @click="click()" 
        @mouseleave="mouse_leave()" 
        :class="{'mouse_over':Hover, 'active':Active, 'related_product':RelatedProduct}">
            <a href="#">{{attribute.value_name}}</a>
        </li>
</template>
<script>
import {Event} from 'vue-tables-2';
import { collect } from 'collect.js';
import Multiselect from 'vue-multiselect';

export default {
    props : ['attribute', 'attributes'],
    components : {
        Multiselect
    },
    data() {
        return {
            active : false,
            hover : false,
            related_product : false,
            pressed : false
        }
    },

    methods : {
        mouse_over(){
            Event.$emit('selected_attribute', this.attribute)
        },

        mouse_leave(){
            Event.$emit('mouse_leave', false);
        },
       
        select(attribute){
            this.related_product = false;

            if (! (this.pressed)) {

                if ( ! (this.attribute.id == attribute.id && this.attribute.value_name == attribute.value_name)) {

                    attribute.search.forEach(element => {
                        
                        element.forEach(a => {
                            if ( this.attribute.id == a.id && this.attribute.value_name == a.value_name) {
                                
                                this.related_product = true;
                            }
                        })

                    });
                }
            }
            
            
        },

        click(){
            
            if (this.pressed == false && this.related_product == false) {
                
                Event.$emit('initial_status_button');

                Event.$emit('empty_attributes');

            }

            this.pressed = true;

            Event.$emit('i_am_ready', this.attribute);

            if (this.active) {
                
                Event.$emit('unselect');

            }else{

                Event.$emit('click_attribute', this.attribute);
            }

            this.active = ! this.active;
        },

        display(attribute){

            attribute.search.forEach(element => {
                element.forEach(a => {
                    if ( this.attribute.id == a.id && this.attribute.value_name == a.value_name) {
                        this.hover = true;
                    }
                })

            }); 
        }
    },

    computed : {
        Hover(){
            return this.hover;
        },

        Active(){
            return this.active;
        },

        RelatedProduct(){
            return this.related_product;
        }
    },

    mounted() {

        Event.$on('selected_attribute', (value) => {
            this.display(value);
        });

        Event.$on('click_attribute', (value) => {
            this.select(value);
        });

        Event.$on('mouse_leave', (value) => {
            this.hover = value;
        });

        Event.$on('unselect', (value) => {
            this.related_product = value;
        });

        Event.$on('initial_status_button', () => {
            this.pressed = false;
            this.active = false;
        });

    },

}
</script>
<style  scoped>
    li.mouse_over a {
        background-color: #3bdf36 !important; 
    }

    li.related_product a {
        color: black !important;
        background-color: #ffffff !important; 
        border: black inset !important;
        border-width: 1px !important;
        border-style: dashed !important;
    }
</style>