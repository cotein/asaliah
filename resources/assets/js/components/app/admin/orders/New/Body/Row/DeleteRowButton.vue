<script>
import {mapGetters} from 'vuex';
import DeleteRowBase from './../../../../../../Base/Button/DeleteRowBase';
export default {
    
    extends : DeleteRowBase,

    computed : {

        ...mapGetters([
            'NewOrderAtLeastIHaveOneProduct'
        ]),

        IsDisabled(){
            
            return (this.NewOrderAtLeastIHaveOneProduct <= 1) ? true : false;
        }
    },

    methods : {

        delete_item(){
            console.log(this.index);
            this.$store.commit('NEW_ORDER_DELETE_PRODUCT', this.index);
        }
    }
}
</script>