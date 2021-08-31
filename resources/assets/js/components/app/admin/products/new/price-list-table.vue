<template>
    <div style="min-height:300px">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="text-center" width="10%">#</th>
                    <th class="text-center" width="30%">Lista de precio</th>
                    <th class="text-center" width="20%">Beneficio</th>
                    <th class="text-center" width="10%">Costo</th>
                    <th class="text-center" width="30%">Importe</th>
                </tr>
            </thead>
            <tbody>
                <price_list_row v-for="(price_list, index) in GetEnablePriceList" :key="index" :index="index" :price_list="price_list" >
                    
                </price_list_row>
            </tbody>
        </table>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import price_list_row from './price-list-row';
import sleep_mixin from './../../../../../mixins/sleep-mixin';
    export default {

        components : {price_list_row},

        mixins : [sleep_mixin],

        computed : {
            ...mapGetters([
                'GetEnablePriceList'
            ])
        },

        async mounted(){

            console.log('///////////////////////////////////////////////');
            this.sleep(750);
            
            let response = await this.$store.dispatch('enablePriceLists', this.User.token)
                .catch((err) => {
                    console.log(err);
                })

            if (response) {
                this.$store.commit('SET_ENABLE_PRICE_LISTS', response.data);
            }

            this.GetEnablePriceList.forEach(element => {
                console.log(element);
                let price = {
                    price_list_id : element.id,
                    price : null
                }
                this.$store.commit('NEW_PRODUCT_ADD_PRICE_LIST', price);
                this.sleep(150);
            });
        }
    }
</script>

<style lang="scss" scoped>

</style>