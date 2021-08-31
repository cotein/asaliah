<template>
    <div  
        id="tax_modal"
        tabindex="-1" 
        role="dialog" class="modal fade in" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Agregar impuesto</h4>
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
                            <label for="" class="col-md-3 col-md-4 control-label">TIPO DE IMPUESTO</label>
                            <div class="col-md-6">
                                <multiselect placeholder="Stockeable" 
                                    v-model="tax_types"
                                    :options="TaxesTypesGetter"
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
                name : null,
                tax_types : null,
                accounting_account : null,
                spinner : false
            }
        },

        methods : {

           
        },

        computed : {

            ...mapGetters(
                [
                    'TaxesTypesGetter',
                    'AccountingAccountsGetter'
                ]
            )
        },

        validations(){
            return {
               
            }
        },

        mounted()
        {
            console.log('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
        }

    }
    
</script>

<style lang="scss" scoped>

</style>