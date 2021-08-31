<script>
import {mapGetters} from 'vuex';
import MultiselectProductBase from './../../../../../../Base/Product/MultiselectProductBase';  
export default {
    extends : MultiselectProductBase,

    props : ['index'],

    data() {
        return {
            show_spinner : false,
            products : [],
        }
    },

    methods : {

        asyncFind (query) {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

            axios.post('/api/products/find_by_name', {
                product_name : query
            }).then((result) => {
                this.products = result.data;
            }).catch((err) => {
                
            });
        },
        
        removeProduct(el)
        {
            
        },

        updateProductValue(el){

            let payload = {
                index : this.index,
                value : el
            }

            this.$store.commit('NEW_ORDER_SET_PRODUCT', payload);

        },

        selectedProduct(el)
        {
            let payload = {
                index : this.index,
                value : el.price_list
            }
            
            this.$store.commit('NEW_ORDER_SET_PRICE_LISTS_OF_A_PRODUCT', payload);

            this.sleep(200);

            this.$store.dispatch('updateTotalOnRowProduct', this.index);

        }
    },

    computed : {

        ...mapGetters([
            'NewOrderProductValue'
        ]),

        ProductValue(){
            console.log('index ' + this.index + ' - ' + JSON.stringify(this.NewOrderProductValue(this.index)));
            return this.NewOrderProductValue(this.index)
        },
    }

}
</script>
