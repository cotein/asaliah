<template>
    <div class="col-md-4">
        <label class="control-label" >{{attr.name.toUpperCase()}}</label>
        <input class="form-control" 
            type="text"
            v-model="model" 
            :placeholder="attr.name + ' del producto'">
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    props : ['index', 'attr'],

    computed : {

        model : {
            get(){
                return this.$store.getters.AttributeByNameGetter(this.index);
            },
            set(value){
                let payload = {
                    index : this.index,
                    value : value
                }

                this.$store.commit('NEW_PRODUCT_SET_ATTRIBUTE', payload);
            }
        }
    }
}
</script>
