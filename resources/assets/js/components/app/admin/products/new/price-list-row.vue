<template>
   <tr>
        <td class="text-center">{{index + 1 }}</td>
        <td>{{price_list.name }}</td>
        <td class="text-center">
            <benefit_component :data="price_list" />
            <!-- <button 
                class="btn btn-outline-danger btn-icon sq-24" 
                type="button"
                v-tooltip="'Disminuir beneficio'">
                  <span class="icon icon-caret-down"></span>
            </button>
            {{price_list.benefit }} %
            <button 
                class="btn btn-outline-success btn-icon sq-24" 
                type="button"
                v-tooltip="'Aumentar beneficio'">
                <span class="icon icon-caret-up"></span>
            </button> -->
        </td>
        <td class="text-center">Costo</td>
        <td>
            <input class="form-control" type="text" v-model="price">
        </td>
    </tr>
</template>

<script>
import {mapGetters} from 'vuex';
//import benefit from './../../price-list/List/components/benefit.vue';
import benefit_component from './../../price-list/List/components/benefit.vue'
export default {
  //components: { benefit },
    props : ['index', 'price_list'],

    components : {benefit_component},

    computed : {

        ...mapGetters([
            'PriceProductGetter'
        ]),

        price : {
            get(){
                if (this.PriceProductGetter[this.index]) {
                    return this.PriceProductGetter[this.index].price;
                }
            },

            set(value){
                
                let payload = {
                    index : this.index,
                    price_list_id : this.price_list.id,
                    price : value
                }

                this.$store.commit('NEW_PRODUCT_SET_PRICE', payload);
            }
        },

    },
   
}
</script>

<style scoped>
    td button.btn-outline-danger{
        margin-right: .8rem;
    }
    td button.btn-outline-success{
        margin-left: .8rem;
    }
</style>
