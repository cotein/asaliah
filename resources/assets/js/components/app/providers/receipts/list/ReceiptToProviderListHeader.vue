<template>
    <div class="row">
        <div class="col-md-12">
            <loading 
                :active.sync="loading" 
                color="#0469c7"
                :can-cancel="false" 
                :is-full-page="true">
            </loading>
            <div class="row">
                <div class="col-md-12">
                    <div class="form form-inline" >
                        <div class="form-group col-md-6" style="padding-bottom-15px">
                            <ProviderFindByName />
                        </div>
                        <div style="padding-top:21px" class="pull-right">
                            <button 
                                class="btn btn-primary" 
                                type="submit"
                                >Buscar Comprobantes</button>
                            <!-- <button 
                                @click="order_payment_generate"
                                class="btn btn-warning" 
                                :class="{'btn btn-warning spinner spinner-inverse spinner-sm' : spinner}"
                                type="submit"
                                :disabled="! EnablePayButton || spinner"
                                >
                                Crear orden de pago
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="text-center">
                <paginate
                    :page-count="pageCount"
                    :click-handler="loadData"
                    :prev-text="'Ant.'"
                    :next-text="'Sig.'"
                    :container-class="'pagination'">
                </paginate>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import auth from './../../../../../mixins/auth';
    export default {
        components : {
        },
        data(){
            return {

            }
        },

        computed : {

            ...mapGetters([
            ])
        },
        
        methods : {

            
        },

        mounted(){
        }
    }
</script>

<style lang="scss" scoped>

</style>