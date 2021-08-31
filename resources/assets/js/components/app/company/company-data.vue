<template>
    <div>
        <div class="row">
            <loading 
                :active.sync="loading" 
                color="#0469c7"
                :can-cancel="false" 
                :is-full-page="false">
            </loading>

            <div class="col-md-6" v-if="HasCompany">
                <h3>NOMBRE
                    <small>{{GetCompany.name}}</small>
                </h3>
                <h3>DOMICILIO
                    <small v-for="(a, index) in address" :key="index">{{a}}</small>
                </h3>
            </div>
            <div class="col-md-6" v-if="HasCompany">
                <h3>INSCRIPCION
                    <small>{{GetCompany.inscription}}</small>
                </h3>
                <h3>DOCUMENTO
                    <small>{{GetCompany.document_type}}</small>
                </h3>
                <h3>NUMERO
                    <small>{{GetCompany.cuit}}</small>
                </h3>
            </div>
        </div>
        <div class="row panel panel-body text-center">
            <h3>DATOS ARBA - IIBB </h3>
            <div class="col-md-6">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>NÚMERO IIBB</h5>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input v-model="iibb_conv" class="form-control" type="text" placeholder="Número de Ingresos Brutos">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>FECHA INICIO DE ACTIVIDAD</h5>
                    <datepicker 
                        :language="es"
                        :value="activity_init"
                        :format="customFormatter"
                        v-model="activity_init"
                        @selected="activityInit"
                        input-class="form-control"
                    ></datepicker>
                </div>
            </div>
            <div class="col-md-12">
                <button style="margin-top:15px" class="btn btn-primary" @click.prevent="update_company">Actualizar Datos</button>
            </div>
        </div>
        <div class="row panel panel-body text-center">
            <h3>PERCEPCIONES</h3>
            <div class="col-md-6">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>REALIZAR PERCEPCION IIBB</h5>
                    <multiselect placeholder="Buscar producto" 
                        id="ajax"
                        track-by="name" label="name"
                        :allowEmpty="false"
                        :options="options"
                        :searchable="false"
                        selectLabel="Seleccionar"
                        selectedLabel="Seleccionado"
                        deselectLabel="Remover"
                        v-model="percep_iibb"
                        @select="set_percep_iibb"
                        >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>REALIZAR PERCEPCION IVA</h5>
                    <multiselect placeholder="Buscar producto" 
                        id="ajax"
                        track-by="name" label="name"
                        :allowEmpty="false"
                        :options="options"
                        :searchable="false"
                        selectLabel="Seleccionar"
                        selectedLabel="Seleccionado"
                        deselectLabel="Remover"
                        v-model="percep_iva"
                        @select="set_percep_iva"
                        >
                    </multiselect>
                </div>
            </div>
        </div>

        <div class="row panel panel-body text-center">
            <h3>RETENCIONES</h3>
            <div class="col-md-3">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>RETENER SUSS</h5>
                    <multiselect placeholder="Buscar producto" 
                        id="ajax"
                        track-by="name" label="name"
                        :allowEmpty="false"
                        :options="options"
                        :searchable="false"
                        selectLabel="Seleccionar"
                        selectedLabel="Seleccionado"
                        deselectLabel="Remover"
                        v-model="ret_suss"
                        @select="set_ret_suss"
                        >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>RETENER IVA</h5>
                    <multiselect placeholder="Buscar producto" 
                        id="ajax"
                        track-by="name" label="name"
                        :allowEmpty="false"
                        :options="options"
                        :searchable="false"
                        selectLabel="Seleccionar"
                        selectedLabel="Seleccionado"
                        deselectLabel="Remover"
                        v-model="ret_iva"
                        @select="set_ret_iva"
                        >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>RETENER IIBB</h5>
                    <multiselect placeholder="Buscar producto" 
                        id="ajax"
                        track-by="name" label="name"
                        :allowEmpty="false"
                        :options="options"
                        :searchable="false"
                        selectLabel="Seleccionar"
                        selectedLabel="Seleccionado"
                        deselectLabel="Remover"
                        v-model="ret_iibb"
                        @select="set_ret_iibb"
                        >
                    </multiselect>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-body text-center" data-toggle="match-height" style="height: 138px;">
                    <h5>RETENER GANANCIAS</h5>
                    <multiselect placeholder="Buscar producto" 
                        id="ajax"
                        track-by="name" label="name"
                        :allowEmpty="false"
                        :options="options"
                        :searchable="false"
                        selectLabel="Seleccionar"
                        selectedLabel="Seleccionado"
                        deselectLabel="Remover"
                        v-model="ret_gcias"
                        @select="set_ret_gcias"
                        >
                    </multiselect>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-body text-center">
                <h3>LOGO
                    <small>Se usará esta imagen para ser mostrada en comprobantes</small>
                </h3>
                <div class="col-md-6 text-center">
                    <vue-dropzone 
                        :options="dropOptions" 
                        @vdropzone-success="uploadLogoResponse"
                        ref="uploadLogo" 
                        id="upload_logo"
                    >
                    </vue-dropzone>
                    <button style="margin-top:15px" class="btn btn-primary" @click.prevent="uploadLogo">Guardar logo</button>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <fade-transition>
                        <img class="img-responsive" :src="UrlLogo" alt="Logo">
                    </fade-transition>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import vueDropzone from "vue2-dropzone";
import aux from './../../../mixins/auth';
import Loading from 'vue-loading-overlay';
import Multiselect from 'vue-multiselect';
import Datepicker from 'vuejs-datepicker';
import {es} from 'vuejs-datepicker/dist/locale';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        props : {
            user_id : Number,
        },

        components : {
            Loading, Multiselect, vueDropzone, Datepicker
        },
        
        mixins : [aux],

        data() {
            return {
                es : es,
                urlLogo : '/images/logos/default-logo.png',
                dropOptions : {
                    dictDefaultMessage: "Hacer click aquí para seleccionar un logo",
                    url: "/api/company/upload_logo",
                    thumbnailWidth: 150,
                    autoProcessQueue: false,
                    addRemoveLinks: true,
                    dictRemoveFileConfirmation:  "¿Desea cancelar la subida de ésta imagen?",
                    dictRemoveFile : 'Quitar imagen',
                    dictCancelUpload : 'Cancelar subida',
                    dictCancelUploadConfirmation : "¿Desea cancelar la subida de ésta imagen?",
                    dictMaxFilesExceeded : 'Sólo se permite 1 archivo',
                    headers: {
                        Authorization: null
                    },
                    params : {
                        //product : null
                    },
                    parallelUploads : 1,
                    uploadMultiple: false,
                    maxFiles : 1
                },
                loading : true,
                options : [
                    {
                        id : 0,
                        name : 'SI'
                    },
                    {
                        id : 1,
                        name : 'NO'
                    }
                ],
                percep_iibb : [
                    {
                        id : 1,
                        name : null
                    },
                ],
                percep_iva : [
                    {
                        id : 1,
                        name : null
                    },
                ],
                ret_suss : [
                    {
                        id : 1,
                        name : null
                    },
                ],
                ret_iva : [
                    {
                        id : 1,
                        name : null
                    },
                ],
                ret_iibb : [
                    {
                        id : 1,
                        name : null
                    },
                ],
                ret_gcias : [
                    {
                        id : 1,
                        name : null
                    },
                ],
                activity_init : null,
                activity_init_send : null,
                iibb_conv : null
            }
        },

        computed : {

            ...mapGetters([
                'HasCompany',
                'GetCompany'
            ]),

            UrlLogo()
            {
                if (this.HasCompany) {
                    return this.GetCompany.url_logo;
                }
                return false
            },
            
            address(){

                if (this.HasCompany) {
                    
                    let address = this.GetCompany.address.split('-');
                    return address;
                }

                return false;
            }
        },

        methods : {
            
            customFormatter(date){
                return this.$moment(date).format("DD-MM-YYYY");
            },

            activityInit(value)
            {
                let activity_init = this.$moment(value).format("YYYY-MM-DD");
                this.activity_init_send = activity_init;
            },

            uploadLogoResponse(file,response){
                
                this.GetCompany.url_logo = response;

                this.$refs.uploadLogo.removeFile(file);

                this.success_message('Logo actualizado correctamente', 'Datos de la Empresa', 4000)
            },

            set_percep_iibb(el)
            {
                this.percep_iibb.name = el.name;
                this.update_company()
            },

            set_percep_iva(el)
            {
                this.percep_iva.name = el.name;
                this.update_company()
            },

            set_ret_iibb(el)
            {
                this.ret_iibb.name = el.name;
                this.update_company()
            },

            set_ret_gcias(el)
            {
                this.ret_gcias.name = el.name;
                this.update_company()
            },

            set_ret_suss(el)
            {
                this.ret_suss.name = el.name;
                this.update_company()
            },

            set_ret_iva(el)
            {
                this.ret_iva.name = el.name;
                this.update_company()
            },

            async update_company()
            {
                let data = {
                    token : this.User.token,
                    values : {
                        percep_iibb : this.percep_iibb,
                        percep_iva : this.percep_iva, 
                        ret_gcias : this.ret_gcias,
                        ret_iibb : this.ret_iibb,
                        ret_iva : this.ret_iva,
                        ret_suss : this.ret_suss,
                        iibb_conv : this.iibb_conv,
                        activity_init : this.activity_init_send,
                    }
                }

                let company = await this.$store.dispatch('update_company', data);

                if(company)
                {
                    this.success_message('Actualizados correctamente', 'Datos de la Empresa', 4000)
                }
            },

            success_message(first, second, time)
            {
                this.$toast.success(first, second , {
                    timeOut : time,
                    titleColor : 'black',
                    messageColor : 'black',
                    theme: 'dark',
                    icon: 'icon icon-check',
                    iconColor : 'black',
                    position: 'bottomRight',
                    progressBarColor: 'rgb(0, 255, 184)',
                    pauseOnHover : false,
                });   
            },

            setTaxes(data)
            {
                this.percep_iibb = {
                    id : 1,
                    name :  (data.percep_iibb) ? 'SI' : 'NO'
                }
                this.percep_iva = {
                    id : 1,
                    name :  (data.percep_iva) ? 'SI' : 'NO'
                }
                this.ret_gcias = {
                    id : 1,
                    name : (data.ret_gcias) ? 'SI' : 'NO'
                }
                this.ret_iibb = {
                    id : 1,
                    name : (data.ret_iibb) ? 'SI' : 'NO'
                }
                this.ret_iva = {
                    id : 1,
                    name :  (data.ret_iva) ? 'SI' : 'NO'
                }
                this.ret_suss = {
                    id : 1,
                    name : (data.ret_suss) ? 'SI' : 'NO'
                },

                this.iibb_conv = data.iibb_conv;
                this.activity_init = data.activity_init;
            },

            uploadLogo() {
                this.dropOptions.headers.Authorization = 'Bearer ' + this.User.token;
                this.$refs.uploadLogo.processQueue();   
            },

            uploadOk(){
                
            },
        },

        mounted()
        {
            let company = this.$store.dispatch('get_company', this.User.token);
            
            company.then((data) => {
                console.log(data.data);
                this.setTaxes(data.data)
            }).finally(() => this.loading = false);
            
        }
    }
</script>

<style lang="scss" scoped>

</style>