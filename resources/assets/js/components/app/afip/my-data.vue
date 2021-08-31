<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="true">
        </loading>
        <form class="form form-inline">
            <div class="form-group">
                <div class="input-with-icon">
                    <input v-model="cuit" class="form-control" type="text" placeholder="CUIT">
                    <div class="icon icon-lock input-icon"></div>
                </div>
            </div>
            <button @click.prevent="getPersona()" class="btn btn-primary" type="button">Buscar</button>
            <button @click.prevent="company_store()" :disabled="HasPerson" class="btn btn-warning" type="button">Guardar</button>
        </form>
        <br>
        <div v-if="HasDatosGenerales">
            <datos_generales :datos_generales="GetDatosGenerales" ></datos_generales>
        </div>
        <div v-if="HasDatosMonotributo">
            <datos_monotributo :datos_monotributo="GetDatosMonotributo" ></datos_monotributo>
        </div>
        <div v-if="HasDatosRegimenGeneral">
            <datos_regimen_general :datos_regimen_general="GetDatosRegimenGeneral" ></datos_regimen_general>
        </div> 
    </div>
</template>
<script>
import toast_mixin from './../../../mixins/toast-mixin';
import auth from './../../../mixins/auth';
import Loading from 'vue-loading-overlay';
import {mapActions, mapGetters} from 'vuex';
import datos_generales from './datos-generales';
import {FadeTransition} from 'vue2-transitions';
import datos_monotributo from './datos-monotributo';
import datos_regimen_general from './datos-regimen-general';
export default {
    mixins : [auth, toast_mixin],

    components : {
        Loading, datos_generales, datos_monotributo, datos_regimen_general, FadeTransition
    },

    data() {
        return {
            cuit : null,
            loading : false,
            datos_generales : null,
            datos_monotributo : null,
            datos_regimen_general : null,
            company : null,
        }
    },   
    
    methods : {
        ...mapActions([
            'getPersonFromAfip',
            'storeCompany',
        ]),

        initialData(){
            this.datos_generales = null;
            this.datos_monotributo = null;
            this.datos_regimen_general = null;
            this.company = null;
        },

        async getPersona(){

            this.initialData();

            this.loading = true;

            this.$store.commit('SET_CUIT', this.cuit);

            let payload = {
                    token : this.User.token,
                    cuit : this.cuit
                }

            let person = await this.$store.dispatch('getPersonFromAfip', payload)
            .catch((err)=>{
                let e = JSON.parse(err.response.data);
                console.log(e);
                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
            })
            .finally(() => {
                    this.loading = false;
                });

            this.$store.commit('SET_COMPANY', person);

            this.company = person;
            
            if (this.HasDatosGenerales) {
                this.datos_generales = this.GetDatosGenerales;
            }
        },

        async company_store(){
                
            let company = await this.$store.dispatch('company_store', this.User.token)
                        .finally(() => this.loading = false);

        }
    },

    computed : {

        ...mapGetters([
            'HasCompany',
            'HasDatosGenerales',
            'GetDatosGenerales',
            'HasDatosRegimenGeneral',
            'GetDatosRegimenGeneral',
            'HasDatosMonotributo',
            'GetDatosMonotributo',
            'HasErrorConstancia',
            'GetErrorConstancia'
        ]),

        DatosGenerales(){
            return this.datos_generales;
        },

        DatosMonotributo(){
            return this.datos_monotributo;
        },

        DatosRegimenGeneral(){
            return this.datos_regimen_general;
        },

        HasPerson(){
            
            if (! (this.company != null)) {
                return true;
            }

            return false;
        }
    }
}
</script>