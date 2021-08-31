<script>
import {mapGetters} from 'vuex';
import MultiselectPriceListBase from './../../../../../../Base/PriceList/MultiselectPriceListBase';  
export default {
    extends : MultiselectPriceListBase,

    props : ['index'],

    data() {
        return {
            show_spinner : false,
            products : [],
        }
    },

    methods : {

        updatePriceListValue(el){

            let payload = {
                index : this.index,
                value : el
            }

            this.$store.commit('NEW_ORDER_SET_PRICE_LIST', payload);

        },

        selectedPriceList(el)
        {
            let payload = {
                index : this.index,
                value : el.price_raw
            }

            this.$store.commit('NEW_ORDER_SET_PRICE_PRODUCT', payload);

            this.sleep(200);

            this.$store.dispatch('updateTotalOnRowProduct', this.index);

        },

        
    },

    computed : {

        ...mapGetters([
            'NewOrderPriceListsProductGetter',
            'NewOrderPriceListGetter',
            'GetIvas'
        ]),

        /* ProductValue(){
            return this.NewOrderProductValue(this.index);
        }, */

        price_list(){
            /* if (this.NewOrderPriceListsProductGetter(this.index) == null || this.NewOrderPriceListsProductGetter(this.index) == undefined) {
                return [];
            } */
            return this.NewOrderPriceListsProductGetter(this.index);
            
        },

        PriceListValue(){
            return this.NewOrderPriceListGetter(this.index);
        }
    }

}
</script>
