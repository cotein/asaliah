<template>
    <div>
        <SearchPersonOnAfip />
        <CustomerFormData />
        <CustomerAddress 
            v-for="(address, index) in GetAddressCustomerNewGetter" 
            :key="index" 
            :index="index"
            :address="address"
        />
        <CustomerContact />
        <div class="row text-center">
            <button 
                class="btn btn-primary"
                :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                @click="store_customer_from_form"
            >
                INGRESAR CLIENTE
            </button>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import CustomerAddress from './CustomerAddress';
import CustomerContact from './CustomerContact';
import CustomerFormData from './CustomerFormData';
import SearchPersonOnAfip from './SearchPersonOnAfip';
import sleep_mixin from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import WsPucResponse from './../../../../src/Afip/WsPucResponse';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    mixins : [auth, toast_mixin, sleep_mixin],
    components : {
        Multiselect, VueAutonumeric, SearchPersonOnAfip, CustomerFormData, CustomerAddress, CustomerContact,
    },
    data() {
        return {
            spinner : false
        }
    },

    methods : {

        async store_customer_from_form () {
            this.$store.commit('SET_CUSTOMER_ERRORS', {});
            this.spinner = true;
            this.sleep(500);
            let customer = await this.$store.dispatch('store_customer_from_form', this.User.token)
                .catch((error) => {
                    console.log(error.response.data);
                    this.$store.commit('SET_CUSTOMER_ERRORS', error.response.data);
                }).finally(()=>this.spinner = false);
            
            if (customer) {
                this.success_message('Agregado correctamente', 'Proveedores', 2000);
                this.$store.commit('SET_CUSTOMER_INITIAL_DATA');
            }
        },

        async localidad_find_by_name (province_id, localidad) {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

            let response = await axios.post('/api/localidades/find_by_name', {
                localidad : localidad,
                province_id : province_id
            }).catch((err) => {
                console.log(err);
            });

            return response
        },

    },
    
    computed : {
        ...mapGetters([
            'Provinces',
            'CustomerName',
            'CustomerTipoClave',
            'PurchaserDocuments',
            'CustomerAddressProvince',
            'GetPersonWSPUC',
            'GetAddressCustomerNewGetter'
        ]),
    },

    watch : {

        async GetPersonWSPUC(n)
        {
            let wspuc = new WsPucResponse(n);
            console.log(wspuc.person);

            if (wspuc.hasErrorConstancia()) {

                let msg = '';

                if (Array.isArray(wspuc.getErrorConstancia())) {
                    
                    wspuc.getErrorConstancia().forEach(element => {
                        msg = msg + ' ' +  element;
                    });

                }else{

                    msg = wspuc.getErrorConstancia();
                }

                this.error_message(msg, 'AFIP', 9000);

                return false;
            }

            let name = wspuc.getNameOrRazonSocial();

            this.$store.commit('SET_CUSTOMER_NAME', name);
            
            let tipo_persona = wspuc.getTipoPersona();

            this.$store.commit('SET_CUSTOMER_TIPO_PERSONA', tipo_persona);
            
            let status = wspuc.getEstadoClave();

            this.$store.commit('SET_CUSTOMER_STATUS', status);

            let tipo_clave = wspuc.getTipoClave();

            this.$store.commit('SET_CUSTOMER_TIPO_CLAVE', tipo_clave);

            let number = wspuc.getNumber();

            this.$store.commit('SET_CUSTOMER_NUMBER', number);

            this.PurchaserDocuments.forEach(element => {
                if(element.name == this.CustomerTipoClave)
                {
                    this.$store.commit('SET_CUSTOMER_PURCHASE_DOCUMENT', element);
                    return false;
                }
            });

            if (wspuc.hasRegimen()) {
                
                wspuc.getRegimenes().forEach(element => {
                    
                    if (element.descripcionRegimen.includes('REG.RET.A LAS GANANCIAS') ) {
                        this.$store.commit('SET_CUSTOMER_REGIMEN', {
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
                this.$store.commit('SET_CUSTOMER_INSCRIPTION', inscription);
            }

            if (wspuc.hasDatosMonotributo()) {
                
                let inscription = {
                    id : 6,
                    name : 'Responsable Monotributo'
                }
                this.$store.commit('SET_CUSTOMER_INSCRIPTION', inscription);
            }

            let state = wspuc.getProvincia();

            if (state == 'CIUDAD AUTONOMA BUENOS AIRES') {
                state = 'CABA'
            }

            let province_id = null;
            this.Provinces.forEach(element => {
                if(element.name == state)
                {
                    province_id = element.id;

                    this.$store.commit('SET_CUSTOMER_ADDRESS_PROVINCE', {index:0, data:element});

                    return false;
                }
            });

            let cp = wspuc.getCodPostal();

            this.$store.commit('SET_CUSTOMER_ADDRESS_CP', {index:0, data:cp});
            
            let city = wspuc.getLocalidad();

            let localidad = await this.localidad_find_by_name(province_id, city);

            this.$store.commit('SET_CUSTOMER_ADDRESS_CITY', {index:0, data:localidad.data});
            
            let address = wspuc.getDireccion();

            this.$store.commit('SET_CUSTOMER_ADDRESS_ADDRESS', {index:0, data:address});

            let address_number = address.split(" ").pop();
            
            this.$store.commit('SET_CUSTOMER_ADDRESS_NUMBER', {index:0, data:address_number});

            let address_type = {
                id : 1,
                name : 'FISCAL'
            }

            this.$store.commit('SET_CUSTOMER_ADDRESS_TYPE', {index:0, data:address_type});

            this.$store.commit('SET_CUSTOMER_AFIP_DATA', n);
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