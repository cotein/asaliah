<template>
    <div class="form-group">
        <label class="col-sm-5 control-label" >{{name}}</label>
        <div class="col-md-7">
            <multiselect placeholder="Elegir una opción" 
                track-by="name" label="name"
                :loading="show_spinner"
                :options="listing_types">
            </multiselect>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from 'vuex';
import Multiselect from 'vue-multiselect'
export default {
    props : ['name'],
    components: {
        Multiselect
    },
    data() {
        return {
            listing_types : [],
            show_spinner : true,

        }
    },
    methods : {
        ...mapActions(['updateListingTypesValueAction']),

        fetchListingTypesFromMeli(){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.user.token;
            let $vm = this;
            $vm.show_spinner = true;
            return axios.post('/api/products/fetchlistingtypes')
                .then((result) => {
                    $vm.show_spinner = false;
                    $vm.listing_types = result.data.body;
                }).catch((err) => {
                    $vm.show_spinner = false;
                    console.log(err);
            });
         }
    },
    computed : {
         ...mapState(['products', 'ivas'])
    },
    mounted(){
        setTimeout(() => {
            this.fetchListingTypesFromMeli();            
        }, 500);
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

