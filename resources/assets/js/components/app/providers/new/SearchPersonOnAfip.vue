<template>
    <div class="row">
        <div class="col-md-12">
            <form class="form form-inline">
                <label >BUSCAR EN AFIP </label>
                <div class="form-group">
                    <div class="input-with-icon">
                        <vue-autonumeric
                            :disabled="spinner"
                            placeholder="CUIT"
                            class="form-control text-right"
                            :options="options"
                            v-model="cuit"
                        ></vue-autonumeric>
                    </div>
                </div>
                <button 
                    v-tooltip="'Buscar contribuyente en Afip'"
                    @click="getPersonFromAfip"
                    :disabled="spinner || !$v.cuit.minLength || !$v.cuit.maxLength"
                    class="btn btn-primary btn-icon sq-32" 
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                    type="button">
                    <span class="icon icon-search"></span>
                </button>
                <fade-transition>
                    <span v-if="!$v.cuit.minLength || !$v.cuit.maxLength" class="btn-danger">
                        La CUIT debe tener 11 caracteres de longitud
                    </span>
                </fade-transition>
            </form>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import { required, minLength, maxLength } from 'vuelidate/lib/validators';
import toast_mixin from './../../../../mixins/toast-mixin';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    mixins : [auth, toast_mixin],
    components : {
        Multiselect, VueAutonumeric
    },
    data() {
        return {
            cuit : null,
            spinner : false,
            options : {
                decimalPlaces : 0,
                digitGroupSeparator: '',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
            hasError : false,
            errorMsg : null
        }
    },
    methods : {

        async getPersonFromAfip()
        {
            this.$store.commit('SET_PROVIDER_INITIAL_DATA');
            this.hasError = false;
            this.errorMsg = null;
            this.spinner = true;
            let payload = {
                token : this.User.token,
                cuit : this.cuit
            }

            let person = await this.$store.dispatch('getPersonFromAfip', payload)
                .catch((err)=>{
                    let e = JSON.parse(err.response.data);
                    this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                }).finally(()=>this.spinner = false);
        }
    }, 

    validations(){
        return {
            cuit : {
                required,
                minLength: minLength(11),
                maxLength: maxLength(11)
            },
        }
    },
    
}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>