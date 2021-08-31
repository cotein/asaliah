<template>
    <div class="row">
        <div class="row" style="margin-bottom:15px">
            <allow_variation_attributes></allow_variation_attributes>
        </div> 
        <div class="row">
            <variation_attributes></variation_attributes>
        </div>
    </div>
</template>

<script>
import { mapFields } from 'vuex-map-fields';
import {mapActions, mapState, mapGetters} from 'vuex';
import { required, maxLength } from 'vuelidate/lib/validators';
import variation_attributes from './../../products/attributes/variation_attributes';
import allow_variation_attributes from './../../products/attributes/allow_variation_attributes';
export default {
    components : {
        variation_attributes,
        allow_variation_attributes
    },


    data() {
        return {
            available_quantity : null,
            available_total : null,
            submitted : false,
            int_Options : {
                decimalPlaces : 0,
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
        }
    },

    validations(){
        return {
            available_total : {
                required
            },
            available_quantity : {
                required
            },
            form: ['available_total', 'available_quantity']
        }
    },

    methods : {
        validate() {
            this.$v.form.$touch();
            this.submit();
            var isValid = !this.$v.form.$invalid
            this.$emit('on-validate', this.$data, isValid)
            return isValid
        },

        submit(){
            this.submitted = true;
        }
    },
    
    watch : {
        available_quantity(value){
            this.$store.commit('SET_AVAILABLE_QUANTITY', value);
        }
    },

    computed: {
        RequiredAvailableTotal(){
            return (this.submitted && !this.$v.available_total.required)
        },
        RequiredAvailableQuantity(){
            return (this.submitted && !this.$v.available_quantity)
        },
    },
}
</script>

<style>

</style>
