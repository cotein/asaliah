<template>
    <div class="card margin-top">
        <div class="card-header title bg-default">
            <h4>CONTACTO</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" >Nombre</label>
                            <div class="">
                                <input v-model="name" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" >Email</label>
                            <div class="">
                                <input v-model="email" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" >Celular</label>
                            <div class="">
                                <input v-model="cell_phone" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" >Teléfono</label>
                            <div class="">
                                <input v-model="phone_1" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" >Teléfono</label>
                            <div class="">
                                <input v-model="phone_2" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label" >Teléfono</label>
                            <div class="">
                                <input v-model="phone_3" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import { required } from 'vuelidate/lib/validators';
import toast_mixin from './../../../../mixins/toast-mixin';
import WsPucResponse from './../../../../src/Afip/WsPucResponse';
    export default {
        components : {
            Multiselect
        },
        mixins : [auth, toast_mixin],

        computed : {

            ...mapGetters(
                [
                    'ProviderContactName',
                ]
            ),

            name : {
                get()
                {
                    return this.ProviderContactName;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_CONTACT_NAME', value);
                }
            },

            email : {
                get()
                {
                    return this.ProviderContactEmail;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_CONTACT_EMAIL', value);
                }
            },

            cell_phone : {
                get()
                {
                    return this.ProviderContactCellPhone;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_CONTACT_CELLPHONE', value);
                }
            },

            phone_1 : {
                get()
                {
                    return this.ProviderContactPhone1;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_CONTACT_PHONE1', value);
                }
            },
            phone_2 : {
                get()
                {
                    return this.ProviderContactPhone2;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_CONTACT_PHONE2', value);
                }
            },
            phone_3 : {
                get()
                {
                    return this.ProviderContactPhone3;
                },

                set(value)
                {
                    this.$store.commit('SET_PROVIDER_CONTACT_PHONE3', value);
                }
            },

            
        },

        methods : {
            ...mapActions([
                'setProviderAddressType',
                'setProviderProvince'
            ])
        },
    }
</script>

<style lang="scss" scoped>

</style>