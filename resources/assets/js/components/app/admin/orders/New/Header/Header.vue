<template>
    <div>
        <div class="first-container">
            <div class="item-1">
                <customer-search />
            </div>
            <div class="item-2">
                
            </div>
            <div class="item-3">
                <date_order title="Fecha del Pedido" />
            </div>
        </div>
        <div class="second-container">
            <div class="item-4">
                <p id="dni">DNI:</p>
                <input type="text" v-model="customer_dni">
            </div>
            <div class="item-5">
                <ButtonSearchOnAfip />
            </div>
            <div class="item-6">
                ppppppppp
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import date_order from './date-picker-order.vue';
import ButtonSearchOnAfip from './button-search-on-afip.vue';
import CustomerSearch from '../../../customer/CustomerSearch.vue';
export default {
    
    components : {
        CustomerSearch, 
        ButtonSearchOnAfip, 
        date_order,
    },

    computed : {

        ...mapGetters([
            'NewCustomerDniGetter'
        ]),

        customer_dni : {
            get(){
                return this.NewCustomerDniGetter;
            },
            set(value){
                this.$store.commit('NEW_CUSTOMER_SET_DNI', value);
            }
        }
    }
}
</script>
<style scoped>
    .first-container, .second-container {
        display: flex;
        justify-content: space-between;
    }
    .second-container{
        margin-top: 1rem;
    }
    .my-date-component {
        margin-left: auto;
    }
    .my-button-search{
        margin-top: 2.3rem;
        margin-left: 1.7rem;
    }
    .item-2{
        padding-top : 2.3rem;
        text-align: left;
        font-size: 2rem;
    }
    .item-3{
         text-align: right;
    }
    .item-4{

        display: flex;
    }
    .item-5{
        width: 10rem;
        color: #434343;
    }
    .second-container div[class*=item-]{
        vertical-align: middle;
    }
    #dni{
        margin-right: 2rem;
    }
</style>