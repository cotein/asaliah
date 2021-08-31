<template>
    <div 
        id="customer_edit_modal" 
        ref="customer_edit_modal"
        tabindex="-1" 
        role="dialog" 
        class="modal fade" 
        style="display: none;"
    >
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Editar Cliente</h4>
                </div>
                <div class="modal-body">
                    <CustomerFormData />
                    <CustomerAddress 
                        v-for="(address, index) in GetAddressCustomerNewGetter" 
                        :key="index" 
                        :index="index"
                        :address="address"/>
                    <CustomerContact />
                    
                </div>
                <div class="modal-footer">
                    <div class="row text-center">
                        <button 
                            class="btn btn-primary"
                            :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                            @click="customer_update_from_modal"
                        >
                            GUARDAR
                        </button>
                        <button 
                            class="btn btn-primary"
                            @click="add_new_address"
                        >
                            AGREGAR DOMICILIO
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Event} from 'vue-tables-2';
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import CustomerAddress from './../../customers/new/CustomerAddress';
import CustomerContact from './../../customers/new/CustomerContact';
import CustomerFormData from './../../customers/new/CustomerFormData';
import SearchPersonOnAfip from './../../customers/new/SearchPersonOnAfip';
import sleep_mixin from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import WsPucResponse from './../../../../src/Afip/WsPucResponse';
import { required } from 'vuelidate/lib/validators';
    export default {
        components : {
            Multiselect, SearchPersonOnAfip, CustomerFormData, CustomerAddress, CustomerContact,
        },
        mixins : [auth, toast_mixin, sleep_mixin],

        data(){
            return {
                spinner : false
            }
        },

        computed : {

            ...mapGetters(
                [
                    'GetAddressType',
                    'Provinces',
                    'GetCustomersData',
                    'GetAddressCustomerNewGetter'
                ]
            )
        },

        validations(){
            return {
                domicilio : {
                    required,
                },
                between_streets : {
                    required
                }
            }
        },

        methods : {

            add_new_address()
            {
                this.$store.commit('ADD_NEW_ADDRESS');
            },

            async customer_update_from_modal () {
                this.$store.commit('SET_CUSTOMER_ERRORS', {});
                this.spinner = true;
                this.sleep(500);
                let customer = await this.$store.dispatch('customer_update_from_modal', this.User.token)
                    .catch((error) => {
                        this.$store.commit('SET_CUSTOMER_ERRORS', error.response.data);
                    }).finally(()=>this.spinner = false);
                
                if (customer) {
                    this.success_message('Agregado correctamente', 'Proveedores', 2000);
                    this.$store.commit('SET_CUSTOMER_INITIAL_DATA');

                    console.log('customer');
                    console.log(customer.data);
                    $(this.$refs.customer_edit_modal).modal('hide');
                    this.$store.commit('SET_CUSTOMER_INITIAL_DATA');
                    Event.$emit('update_customer_from_modal_form', customer.data);
                }
            },
        },
        
        mounted(){
            Event.$on('open_customer_edit_modal', () => {
                $(this.$refs.customer_edit_modal).modal('show');
                $(".modal-backdrop.fade.in").hide();
                this.$refs.customer_edit_modal
            }); 
            
        }
        
    }
    
</script>

<style scoped>
.modal-dialog{
    position: fixed !important;
    top: 10% !important;
    right: 5vh !important;
    bottom: 0 !important;
    left: 0 !important;
    z-index: 10040 !important;
    overflow-y: auto !important;
}
.modal-body{
    height: 60vh !important;
    overflow-y: auto !important;
}

</style>