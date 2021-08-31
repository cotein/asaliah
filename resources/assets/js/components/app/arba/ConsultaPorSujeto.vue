<template>
    <div>
        <div class="row">
            <div class="form form-inline">
                <div class="form-group">
                    <div class="input-with-icon">
                        <input v-model="cuit" class="form-control" type="text" placeholder="CUIT">
                        <div class="icon icon-lock input-icon"></div>
                    </div>
                </div>
                <button 
                    @click.prevent="getAlicuota()" 
                    class="btn btn-primary"
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
                    type="button">Buscar</button>
            </div>
        </div>
        <fade-transition>
            <div class="row" v-if="HasAlicuota" style="margin-top:15px">
                <div class="col-md-6" >
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                        <h3>Alícuota de Percepción - IIBB</h3>
                        <h4>{{HasAlicuota.contribuyentes.contribuyente.alicuotaPercepcion}} %</h4>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                        <h3>Alícuota de Retención - IIBB</h3>
                        <h4>{{HasAlicuota.contribuyentes.contribuyente.alicuotaRetencion}} %</h4>
                    </div>
                </div>
            </div>
            <div class="row" v-if="HasAlicuotaError" style="margin-top:15px">
                <div class="col-md-6 col-md-offset-3" >
                    <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                        <h3>Error en la consulta</h3>
                        <h5>{{HasAlicuotaError}}</h5>
                    </div>
                </div>
            </div>
        </fade-transition>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import aux from './../../../mixins/auth';
import toast_mixin from './../../../mixins/toast-mixin';
    export default {
        
        mixins : [aux, toast_mixin],
        data() {
            return {
                cuit : null,
                spinner : false
            }
        },

        computed : {
            ...mapGetters([
                'HasAlicuota',
                'HasAlicuotaError'
            ]),

           
        },

        methods : {
            
            getAlicuota()
            {
                let payload = {
                    token : this.User.token,
                    cuit : this.cuit
                }
                this.spinner = true;
                this.$store.dispatch('getAlicuota', payload)
                    .catch((err)=>{
                        console.log(err.response.data);
                    
                    this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                }).finally(()=>{

                    this.spinner = false;
                })
            }
        },

    }
</script>

<style lang="scss" scoped>

</style>