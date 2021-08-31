<template>
  <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="row top-15">
            <div class="col-md-6">
                <asyncFindCustomer/>
            </div>
            <div class="col-md-6">
                <pedidoDate/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="padding-top:15px">
                <label for="">BUSCAR CLIENTE EN AFIP</label>
                <form class="form form-inline">
                    <div class="form-group">
                        <vue-autonumeric 
                            class="form-control"
                            v-model="cuit"
                            :options=options
                        ></vue-autonumeric>
                    </div>
                    <button 
                        @click.prevent="search_people_on_afip" 
                        class="btn btn-primary" 
                        type="button"
                        :disabled="spinner"
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                        >Buscar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <PaymentType />
            </div>
        </div>
        <fade-transition :duration="500">
            <div class="row top-15">
                <div class="col-md-12" style="margin-top:15px">
                    <PedidoTable />
                </div>
            </div>
        </fade-transition>
  </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import pedidoDate from './PedidoDate';
import PaymentType from './PaymentType';
import PedidoTable from './PedidoTable';
import Loading from 'vue-loading-overlay';
import pedidoAddress from './PedidoAddress';
import 'vue-loading-overlay/dist/vue-loading.css';
import toast_mixin from './../../../mixins/toast-mixin';
import modal_error from './../../../mixins/modal-error';
import asyncFindCustomer from './PedidoAsyncFindCustomer';
import CustomerSearchAfipData from './../customers/CustomerSearchAfipData';
import VueAutonumeric from '../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    components : {
        Loading, asyncFindCustomer, pedidoDate, pedidoAddress,
        PedidoTable, CustomerSearchAfipData, VueAutonumeric,PaymentType
    },
    mixins : [toast_mixin, modal_error],
    data() {
        return {
            loading : false,
            spinner : false,
            cuit : null,
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
        }
    },

    methods : {

        async search_people_on_afip()
        {
            this.$store.commit('SET_INITIAL_STATUS_PEDIDO_CLIENTE');

            this.spinner = true;
            
            let payload = {
                token : this.User.token,
                cuit : this.cuit
            }

            let people = await this.$store.dispatch('getPersonFromAfip', payload).catch((err)=>{
                this.spinner = false;
                this.cuit = null;
                let e = JSON.parse(err.response.data);
                this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
            });

            if (people) {
           
                let isFinalConsumer = await this.$store.dispatch('isFinalConsumer')
            
                if (isFinalConsumer) {

                    let payload = {
                        token : this.User.token,
                        cuit : people.idPersonaListReturn.idPersona
                    }
                    let final_consumer = await this.$store.dispatch('getPersonFromAfip', payload)
                    .catch((err)=>{
                        let e = JSON.parse(err.response.data);
                        this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
                    });

                    let customer_data = {
                        token : this.User.token,
                        customer : this.GetPersonWSPUC
                    }
                    
                    let customer = await this.$store.dispatch('store_customer', customer_data);
                    this.success_message('Clientes', 'Cliente registrado correctamente');
                    this.$store.commit('SET_CUSTOMER_DATA', customer);
                    $("#address-new-modal").modal('show');
                    this.$store.commit('SET_CUSTOMER_ON_PEDIDO', customer);
                
                }else{

                    let customer_data = {
                        token : this.User.token,
                        customer : this.GetPersonWSPUC
                    }

                    let customer = await this.$store.dispatch('store_customer', customer_data);

                    if (customer) {
                        this.$store.commit('SET_CUSTOMER_ON_PEDIDO', customer);
                        this.$store.commit('SET_CUSTOMER_ADDRESSES', []);
                        this.$store.commit('SET_CUSTOMER_DATA', customer);
                        if (customer.addresses) {
                            this.$store.commit('SET_CUSTOMER_ADDRESSES', customer.addresses);
                            this.success_message('Clientes', 'Cliente registrado correctamente');
                        }
                    }
                }
            }
            this.cuit = null;
            this.spinner = false;
            
        }
    },

    computed : {

        ...mapGetters(
            [
                'CustomerAddresses',
                'PedidoHasCustomer',
                'GetPersonWSPUC',
                'GetCustomersData',
                'GetAddressType',
                'PaymentTypeGetter'
            ]
        )
    },

    watch : {

        PaymentTypeGetter(n)
        {
            this.$store.commit('SET_PAY_METHOD', n);
        }
    },

    async mounted()
    {
        this.$store.dispatch('fetchIvas');

        let address_type = await this.$store.dispatch('getAddressType', this.User.token);

        if (address_type) {
            this.$store.commit('SET_ADDRESS_TYPE', address_type.data);
        }

        let provinces = await this.$store.dispatch('getProvinces', this.User.token);

        if (provinces) {
            this.$store.commit('SET_PROVINCES', provinces.data);
        }
    }

}
</script>

<style scoped>
    .top-15 {
        margin-top: 15px;
    }
</style>