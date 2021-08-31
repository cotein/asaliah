<template>
    <div  
        id="article_modal"
        tabindex="-1" 
        role="dialog" class="modal fade in" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Agregar artículo</h4>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">NOMBRE</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" v-model="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">CÓDIGO</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" v-model="code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-md-4 control-label">UNIDAD DE MEDIDA</label>
                            <div class="col-md-6">
                                <multiselect placeholder="Unidad de medida" 
                                    track-by="name" label="name"
                                    v-model="measure_unity"
                                    :options="MeasurementUnitiesGetter"
                                    :clear-on-select="false" 
                                    selectLabel=''
                                    selectedLabel='Seleccionado'	
                                    deselectLabel="Deseleccionar"	
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-md-4 control-label">CONTROLAR STOCK?</label>
                            <div class="col-md-6">
                                <multiselect placeholder="Stockeable" 
                                    v-model="is_stockeable"
                                    :value="is_stockeable"
                                    :options="booleans"
                                    :clear-on-select="false" 
                                    selectLabel='Seleccionar'
                                    selectedLabel='Seleccionado'	
                                    deselectLabel="Deseleccionar"
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-md-4 control-label">IMPUTAR A CUENTA</label>
                            <div class="col-md-6">
                                <multiselect placeholder="Cuenta contable" 
                                    track-by="name" label="name"
                                    v-model="accounting_account"
                                    :value="accounting_account"
                                    :options="AccountingAccountsGetter"
                                    :clear-on-select="false" 
                                    selectLabel='Seleccionar'
                                    selectedLabel='Seleccionado'	
                                    deselectLabel="Deseleccionar"
                                    >
                                    <span slot="noOptions">
                                            Lista Vacía
                                    </span>
                                    <span slot="noResult">
                                            La búsqueda no arrojó resultados
                                    </span>
                                </multiselect>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button 
                        @click="create_article"
                        class="btn btn-primary" 
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
                        type="button">Guardar</button>
                    <button class="btn btn-default" data-dismiss="modal" type="button">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Event} from 'vue-tables-2'
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import { required } from 'vuelidate/lib/validators';
import toast_mixin from './../../../../mixins/toast-mixin';
    export default {
        components : {
            Multiselect
        },
        mixins : [auth, toast_mixin],

        data(){
            return {
                booleans : [
                    'SI',
                    'NO'
                ],
                name : null,
                code : null,
                measure_unity : null,
                accounting_account : null,
                is_stockeable : 'NO',
                spinner : false
            }
        },

        methods : {

            async create_article () {
                
                this.spinner = true;
                let payload = {
                    token : this.User.token,
                    article : {
                        name : this.name,
                        code : this.code,
                        measure_unity : this.measure_unity,
                        accounting_account : this.accounting_account,
                        is_stockeable : this.is_stockeable,
                    }
                }

                let article = await this.$store.dispatch('save_article', payload);

                this.spinner = false;

                $('#article_modal').modal('hide');

            }
        },

        computed : {

            ...mapGetters(
                [
                    'MeasurementUnitiesGetter',
                    'AccountingAccountsGetter'
                ]
            )
        },

        validations(){
            return {
               
            }
        },

    }
    
</script>

<style lang="scss" scoped>

</style>