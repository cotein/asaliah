
<script>
import {mapGetters} from 'vuex';
import WsPucAfipButtonBase from './../../../../../Base/Button/WsPucAfipButtonBase';
export default {
    
    extends : WsPucAfipButtonBase,

    computed : {

        ...mapGetters([
            'NewCustomerDniGetter',
        ]),

        IsDisabled(){
            return false;
        }
    },

    methods : {

        async searchOnAfip()
        {
            console.log('searchOnAfip');
            let payload = {
                token : this.User.token,
                cuit : this.NewCustomerDniGetter
            }

            let person = await this.$store.dispatch('wsPucGetPerson', payload)
                .catch( err => console.log(err));
                
            if (person) {
                console.log('person');
                console.log(person);
            }
        },
    }
}
</script>