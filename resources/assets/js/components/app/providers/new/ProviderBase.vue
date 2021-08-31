<template>
    <div>
        <SearchPersonOnAfip />
        <ProviderFormData />
        <ProviderAddress />
        <ProviderContact />
        <ProviderTaxes />
        <div class="row text-center">
            <button 
                class="btn btn-primary"
                :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                @click="store_provider"
            >
                INGRESAR PROVEEDOR
            </button>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import ProviderTaxes from './ProviderTaxes';
import auth from './../../../../mixins/auth';
import ProviderAddress from './ProviderAddress';
import ProviderContact from './ProviderContact';
import ProviderFormData from './ProviderFormData';
import SearchPersonOnAfip from './SearchPersonOnAfip';
import sleep_mixin from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import WsPucResponse from './../../../../src/Afip/WsPucResponse';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    mixins : [auth, toast_mixin, sleep_mixin],
    components : {
        Multiselect, VueAutonumeric, SearchPersonOnAfip, ProviderFormData, ProviderAddress, ProviderContact,
        ProviderTaxes
    },
    data() {
        return {
            spinner : false
        }
    },

    methods : {

        async store_provider () {
            this.$store.commit('SET_PROVIDER_ERRORS', {});
            this.spinner = true;
            this.sleep(500);
            let provider = await this.$store.dispatch('store_provider', this.User.token)
                .catch((error) => {
                    this.$store.commit('SET_PROVIDER_ERRORS', error.response.data);
                }).finally(()=>this.spinner = false);
            
            if (provider) {
                this.success_message('Agregado correctamente', 'Proveedores', 2000);
                this.$store.commit('SET_PROVIDER_INITIAL_DATA');
            }
        },

        openModalError(){
            Event.$emit('show-modal-error');
        },
    },
    
    computed : {
        ...mapGetters([
            'Provinces',
            'ProviderName',
            'ProviderTipoClave',
            'PurchaserDocuments',
            'ProviderAddressProvince',
            'GetPersonWSPUC',
            'ProviderRegimen'
        ]),
    },

    watch : {

        GetPersonWSPUC(n)
        {
            let wspuc = new WsPucResponse(n);
            
            if (wspuc.hasErrorConstancia()) {

                let msg = '';

                wspuc.getErrorConstancia().forEach(element => {
                    msg = msg + ' ' +  element;
                });

                this.error_message(msg, 'AFIP', 9000);

                return false;
            }

            let name = wspuc.getNameOrRazonSocial();

            this.$store.commit('SET_PROVIDER_NAME', name);
            
            let tipo_persona = wspuc.getTipoPersona();

            this.$store.commit('SET_PROVIDER_TIPO_PERSONA', tipo_persona);
            
            let status = wspuc.getEstadoClave();

            this.$store.commit('SET_PROVIDER_STATUS', status);

            let tipo_clave = wspuc.getTipoClave();

            this.$store.commit('SET_PROVIDER_TIPO_CLAVE', tipo_clave);

            let number = wspuc.getNumber();

            this.$store.commit('SET_PROVIDER_NUMBER', number);

            this.PurchaserDocuments.forEach(element => {
                if(element.name == this.ProviderTipoClave)
                {
                    this.$store.commit('SET_PROVIDER_PURCHASE_DOCUMENT', element);
                    return false;
                }
            });

            if (wspuc.hasRegimen()) {
                
                wspuc.getRegimenes().forEach(element => {
                    
                    if (element.descripcionRegimen.includes('REG.RET.A LAS GANANCIAS') ) {
                        this.$store.commit('SET_PROVIDER_REGIMEN', {
                                id : element.idRegimen,
                                code : element.idRegimen,
                                name : element.idRegimen + ' | ' + element.descripcionRegimen
                            }
                        );
                    }
                });
            }

            if (wspuc.hasRegimenGeneral()) {
                
                let inscription = {
                    id : 1,
                    name : 'Iva Responsable Inscripto'
                }
                this.$store.commit('SET_PROVIDER_INSCRIPTION', inscription);
            }

            if (wspuc.hasDatosMonotributo()) {
                
                let inscription = {
                    id : 6,
                    name : 'Responsable Monotributo'
                }
                this.$store.commit('SET_PROVIDER_INSCRIPTION', inscription);
            }

            let state = wspuc.getProvincia();

            if (state == 'CIUDAD AUTONOMA BUENOS AIRES') {
                state = 'CABA'
            }

            this.Provinces.forEach(element => {
                if(element.name == state)
                {
                    this.$store.commit('SET_PROVIDER_ADDRESS_PROVINCE', element);
                    return false;
                }
            });


            let cp = wspuc.getCodPostal();

            this.$store.commit('SET_PROVIDER_ADDRESS_CP', cp);
            
            let city = wspuc.getLocalidad();

            this.$store.commit('SET_PROVIDER_ADDRESS_CITY', city);
            
            let address = wspuc.getDireccion();

            this.$store.commit('SET_PROVIDER_ADDRESS_ADDRESS', address);

            let address_number = address.split(" ").pop();
            
            this.$store.commit('SET_PROVIDER_ADDRESS_NUMBER', address_number);

            let address_type = {
                id : 1,
                name : 'FISCAL'
            }

            this.$store.commit('SET_PROVIDER_ADDRESS_TYPE', address_type);
            this.$store.commit('SET_PROVIDER_AFIP_DATA', n);
        }

    },

    async mounted(){

        await this.$store.dispatch('get_accounting_accounts', this.User.token);
        let provinces = await this.$store.dispatch('getProvinces', this.User.token);

        if (provinces) {
            this.$store.commit('SET_PROVINCES', provinces.data);
        }
    }
}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>