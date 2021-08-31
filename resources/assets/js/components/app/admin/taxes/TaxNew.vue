<template>
    <div class="row" style="padding-bottom:10px">
        <div class="demo-form-wrapper">
            <div class="form form-inline">
                <div class="form-group col-md-2">
                    <input 
                        class="form-control"
                        type="text"
                        v-model="name"
                    >
                </div>
                <div class="form-group col-md-3">
                    <TaxesAccountingAccountNew />
                </div>
                <div class="form-group  col-md-3">
                    <TaxesTypeNew />
                </div>
                <div class="form-group  col-md-3">
                    <TaxesStatesNew />
                </div>
                <div class="form-group  col-md-1">
                    <button 
                        class="btn btn-primary" 
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : loading}"
                        type="button"
                        @click="tax_store"
                    >Guardar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import {Event} from 'vue-tables-2';
    import TaxesTypeNew from './TaxesTypeNew';
    import TaxesStatesNew from './TaxesStatesNew';
    import sleep from './../../../../mixins/sleep-mixin';
    import toast from './../../../../mixins/toast-mixin';
    import TaxesAccountingAccountNew from './TaxesAccountingAccountNew';
    export default {
        components : {
            TaxesStatesNew, TaxesTypeNew,
            TaxesAccountingAccountNew
        },

        mixins : [sleep, toast],

        data(){
            return {

                loading : false,
            }
        },

        computed : {

            ...mapGetters([
                'TaxNameGetter',
                'TaxGetter'
            ]),

            name : {
                get(){
                    return this.TaxNameGetter;
                },
                set(value){
                    this.$store.commit('TAX_SET_NAME', value);
                }
            }
        },

        methods : {

            async tax_store  () {
                
                this.loading = true;

                let payload = {
                    token : this.User.token,
                    tax : this.TaxGetter
                }

                let tax = await this.$store.dispatch('tax_store', payload)
                    .catch((err) => {
                        this.error_message('No se puedo guardar el impuesto', 'Impuestos');
                    }).finally(() => this.loading = false);
                
                if (tax) {
                    this.success_message('Impuesto guardado exitosamente', 'Impuestos');

                    this.$store.commit('ADD_TAX', tax);
                    
                    this.$store.commit('TAX_SET_INITIAL_STATUS');

                    Event.$emit('set_tax_initial_status');

                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>