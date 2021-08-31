<template>
    <div class="form-group">
        <label for="address_province">PROVINCIA<sup>*</sup></label>
        <multiselect 
            ref="www"
            :allow-empty="false"
            :searchable="true" 
            :internal-search="false" 
            v-model="province" 
            placeholder="Buscar provincia" 
            label="name" track-by="name" 
            :options="Provinces" 
            @select="selectedProvince"
            @remove="removeProvince()"
            :show-labels="false">
        </multiselect>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';

export default {
    components : {
        Multiselect
    },
    data() {
        return {
            province : null
        }
    },

    methods: {
        getProvinces(){
            this.$store.dispatch('getProvinces')
                .then((result) => {
                    this.$store.commit('SET_PROVINCES', result.data);
                }).catch((err) => {
                    
                });
        },

        initShippingPrice(){
            Event.$emit('zero-shipping-amount')
        },

        selectedProvince(el){
            //this.initShippingPrice();

            //this.initCity();
            
            this.$store.commit('SET_PROVINCE', el);

            this.spinner_cities = true;

            this.$store.dispatch('getCities', el)
            .then((result) => {
                this.$store.commit('SET_CITIES', result.data);
            }).catch((err) => {
                
            }).finally(() => {
                this.spinner_cities = false;
            });
        },
    },

    computed : {
        ...mapGetters([
            'Provinces'
        ])
    },

    mounted() {
        this.getProvinces();
        console.log(this.$refs.www);
    },
}
</script>