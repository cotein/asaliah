<script>
import {mapGetters} from 'vuex';
import MultiselectIvaBase from './../../../../../../Base/Iva/MultiselectIvaBase'
export default {
    
    props : ['index'],

    extends : MultiselectIvaBase,

    data() {
        return {

        }
    },

    computed : {

        ...mapGetters([
            'GetIvas',
            'NewOrderIvaOfProduct'
        ]),

        IvaValue(){
            return this.NewOrderIvaOfProduct(this.index);
        },

        ivas(){
            return this.GetIvas;
        }
    },

    methods : {

        updateIvaValue(el){

            let payload = {
                index : this.index,
                value : el
            }

            this.$store.commit('NEW_ORDER_SET_IVA_OF_PRODUCT', payload);

        },

        selectedIva(el){

            let payload = {
                index : this.index,
                value : el
            }

            this.$store.commit('NEW_ORDER_SET_IVA_IMPORT_OF_PRODUCT', payload);
        }
        
    },
    
    /* mounted(){
        this.$store.dispatch('fetchIvas');
    } */
}
</script>


