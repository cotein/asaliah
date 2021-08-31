<template>
    <tr>
        <td class="text-center">{{index + 1}}</td>
        <td class="text-center">
            <input v-model="attr" class="form-control" type="text" >
        </td>
        <td class="text-center">
            <button class="btn btn-outline-danger btn-icon sq-32"
                @click="delete_attr(index)">
                <span class="icon icon-trash"></span>
            </button>
        </td>
    </tr>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    props : ['index'],

    computed : {

        attr : {
            get(){
                return this.$store.state.categories.new_category.attributes[this.index].name;
            },

            set(value){
                
                let payload = {
                    index : this.index,
                    name : value
                }

                this.$store.commit('SET_NAME_TO_ATTRIBUTE', payload);
            }
        },

    },

    methods : {
        
        delete_attr(){
            this.$store.commit('DELETE_ATTRIBUTE_FROM_CATEGORY', this.index);
        },

        add_attr(){
            
        }
    }
}
</script>
