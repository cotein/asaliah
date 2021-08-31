<template>
<div class="form form-inline">
    <div class="form-group col-md-4 col-md-offset-1" v-if="person_is_array">
        <select class="custom-select"   v-model="dni_cuil_cuit">
            <option v-for="(person, index) in person_array" :value="person" :key="index">{{person}}</option>
        </select>
    </div>
    <slide-x-right-transition :duration="750">
        <div class="form-group col-md-1">
            <button 
                @click="searchData" 
                v-tooltip="'Buscar datos del cliente en Afip'"
                class="btn btn-primary btn-icon sq-32" 
                :disabled="HasAfipData"
                :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                type="button">
                <span class="icon icon-search"></span>
            </button>
        </div>
    </slide-x-right-transition>
</div>
</template>
<script>
import WsPucResponse from './../../../src/Afip/WsPucResponse';
import {Event} from 'vue-tables-2';
import auth from './../../../mixins/auth';
import {mapActions, mapGetters} from 'vuex';
import sleep from './../../../mixins/sleep-mixin';
import {SlideXRightTransition} from 'vue2-transitions';
import toast_mixin from './../../../mixins/toast-mixin';
export default {
    props : {
        dni_cuil_cuit : {
            default : ''
        },
        data : {
            default : null
        }
    }, 
    //['dni_cuil_cuit', 'data'],
    mixins : [auth, toast_mixin, sleep],

    components : {
        SlideXRightTransition
    },

    data() {
        return {
            spinner : false,
            person_is_array : false,
            person_array : [],
            cuil : null,
            original_cuit : null,
        }
    },   
    
    methods : {

        async searchData(){
            
            this.spinner = true;

            if (this.dni_cuil_cuit == null) {
                this.error_message('El cliente no posee número de documento', 'AFIP');
                this.spinner = false;
                return false;
            }

            let payload = {
                token : this.User.token,
                cuit : this.dni_cuil_cuit,
            }

            let person = await this.$store.dispatch('getPersonFromAfip', payload)
            .catch((err)=>{
                console.log(err.response);
                let e = JSON.parse(err.response.data);
                console.log(e);
                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
            });

            if (person) {
                console.log('person');
                console.log(person);
                console.log('person');
                if (person.hasOwnProperty('idPersonaListReturn')) {
                    
                    if (person.idPersonaListReturn.hasOwnProperty('idPersona')) {
                    
                        if (Array.isArray(person.idPersonaListReturn.idPersona)) {
                            //aca tengo que guardar el cuit en alguna variable por que este es un dni
                            // y tengo un array de cuit o cuil
                            this.original_cuit = this.dni_cuil_cuit;
                            this.person_is_array = true;
                            this.person_array = person.idPersonaListReturn.idPersona;
                            this.spinner = false;
                            return false;
                        }

                        let payload = {
                            token : this.User.token,
                            cuit : person.idPersonaListReturn.idPersona
                        }  

                        let persona = await this.$store.dispatch('getPersonFromAfip', payload)
                        .catch((err)=>{
                            console.log(err.response);
                            let e = JSON.parse(err.response.data);
                            console.log(e);
                            this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                        });

                        if (persona) {
                            let payload = {
                                token : this.User.token,
                                customer : persona,
                                dni_cuil_cuit : this.dni_cuil_cuit,
                                original_cuit : this.original_cuit,
                            } 
                            let customer = await this.$store.dispatch('update_customer', payload)
                            .catch((err)=>{
                                console.log(err.response);
                                let e = JSON.parse(err.response.data);
                                console.log(e);
                                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                            });
                            this.$store.commit('SET_CUSTOMER_DATA', customer.data);
                            this.success_message('Actualizado correctamente', 'Cliente')
                        }
                        
                    }
                }

                if (person.hasOwnProperty('personaReturn')) {
                    let payload = {
                        token : this.User.token,
                        customer : person,
                        dni_cuil_cuit : this.dni_cuil_cuit,
                        original_cuit : this.original_cuit,
                    } 
                    let customer = await this.$store.dispatch('update_customer', payload)
                        .catch((err)=>{
                                console.log(err.response);
                                let e = JSON.parse(err.response.data);
                                console.log(e);
                                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                        });
                    this.person_is_array = false;
                    this.$store.commit('SET_CUSTOMER_DATA', customer.data);
                    this.success_message('Actualizado correctamente', 'Cliente')
                }
               
            }
            this.spinner = false;
        },

    },

    computed : {

        ...mapGetters(
            [
                'GetCustomerPurchaserDocument'
            ]
        ),

        HasAfipData()
        {
            if (this.data == null) {
                return false;
            }else{
                if (this.data.customer_has_afip_data) {
                    return this.data.customer_has_afip_data;
                }
                return false;
            }
        }

        
    },

    watch : {

        GetCustomerPurchaserDocument(n)
        {
            if (this.data != null) {
                this.data.customer_has_afip_data = true;
            }
        }
    },
    mounted(){
        this.current_url =  window.location.pathname;
        this.sleep(250);
        
    }
}
</script>