<template>
    <div class="panel panel-body">
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <div class="form form-horizontal">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Nombre</label>
                        <div class="col-sm-9">
                        <input class="form-control" type="text" disabled v-model="name">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Clave</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" disabled v-model="purchaser_document">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Número</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" v-model="number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="form-control-1">Inscripción</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" disabled v-model="inscription">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <CustomerSearchAfipData :dni_cuil_cuit="number" />
                </div>
<!--                 <div class="col-md-3">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Persona</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text">
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="divider">
            <div class="divider-content">Datos de contacto</div>
        </div>
        <div class="form form-horizontal">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Contacto</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" v-model="contact">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Celular</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" v-model="cell_phone">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                <label class="col-sm-3 control-label" for="form-control-1">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" v-model="email">
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="form-form-horizontal">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tel. 1</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" v-model="phone_1">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tel. 2</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" v-model="phone_2">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="col-sm-3 control-label" for="form-control-1">Tel. 3</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" v-model="phone_3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="divider" v-if="GetCustomerAddress">
            <div class="divider-content">Domicilios</div>
        </div>
        <div class="divider" v-else>
            <div class="divider-content">Este cliente no tiene domicilios asignados</div>
        </div>
        <div class="form form-horizontal" v-if="GetCustomerAddress">
            <div v-for="(address, index) in GetCustomerAddress" :key="index">
                <CustomerAddress :address="address" :index="index" />
            </div>
        </div>
        <button class="btn btn-danger" data-toggle="modal" data-target="#address-new-modal" type="button">Agregar domicilio nuevo</button>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import auth from './../../../mixins/auth';
import Loading from 'vue-loading-overlay';
import CustomerAddress from './CustomerAddress';
import 'vue-loading-overlay/dist/vue-loading.css';
import CustomerSearchAfipData from './CustomerSearchAfipData';
    export default {
        props : ['customer_id'],
        mixins : [auth],
        components : {
            Loading, CustomerAddress, CustomerSearchAfipData
        },
        data() 
        {
            return {
                loading : false,
                customer : {}
            }
        },

        computed : {

            ...mapGetters(
                [
                    'GetCustomerAddress'
                ]
            ),

            name :
            {
                get()
                {
                    return this.$store.getters.GetCustomerName;
                },

                set(value)
                {
                    console.log(value);
                }
            },

            purchaser_document :
            {
                get()
                {
                    return this.$store.getters.GetCustomerPurchaserDocument;
                },

                set(value)
                {
                    console.log(value);
                }
            },

            number :
            {
                get()
                {
                    return this.$store.getters.GetCustomerNumber;
                },

                set(value)
                {
                    console.log(value);
                }
            },

            inscription :
            {
                get()
                {
                    return this.$store.getters.GetCustomerInscription;
                },

                set(value)
                {
                    console.log(value);
                }
            },

            contact :
            {
                get()
                {
                    return this.$store.getters.GetCustomerContact;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_CONTACT', value);
                }
            },

            cell_phone :
            {
                get()
                {
                    return this.$store.getters.GetCustomerCellPhone;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_CELL_PHONE', value);
                }
            },

            phone_1 :
            {
                get()
                {
                    return this.$store.getters.GetCustomerPhone1;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_PHONE1', value);
                }
            },

            phone_2 :
            {
                get()
                {
                    return this.$store.getters.GetCustomerPhone2;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_PHONE2', value);
                }
            },

            phone_3 :
            {
                get()
                {
                    return this.$store.getters.GetCustomerPhone3;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_PHONE3', value);
                }
            },

            email :
            {
                get()
                {
                    return this.$store.getters.GetCustomerEmail;
                },

                set(value)
                {
                    this.$store.commit('SET_CUSTOMER_EMAIL', value);
                }
            }
        },

        async mounted()
        {
            this.loading = true;

            let payload = {
                token : this.User.token,
                customer_id : this.customer_id
            }
            let customer = await this.$store.dispatch('getCustomerData', payload);

            if (customer) {
                console.log('customer');
                console.log(customer);
                this.customer = customer.data
                this.$store.commit('SET_CUSTOMER_DATA', customer.data);
            }

            this.loading = false;

            let address_type = await this.$store.dispatch('getAddressType', this.User.token);

            if (address_type) {
                this.$store.commit('SET_ADDRESS_TYPE', address_type.data);
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>