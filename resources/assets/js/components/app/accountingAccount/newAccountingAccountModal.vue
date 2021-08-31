<template>
    <div ref="modalAccountingAccount" tabindex="-1" role="dialog" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Nueva cuenta contable de proveedores</h4>
                </div>
                <div class="modal-body">
                    <form class="form form-horizontal">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="control-label" >Nombre</label>
                                <div class="">
                                    <input  v-model="name" class="form-control" type="text">
                                    <p class="text-danger" v-if="has_error">Esta cuenta contable ya ha sido creada.</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button 
                        class="btn btn-primary"
                        :class="{'spinner spinner-inverse spinner-sm' : saving_spinner}"
                        @click.prevent="son_provider"
                        >Guardar
                    </button>
                    <button 
                        class="btn btn-default"
                        @click="modalClose"
                        >Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../mixins/auth';
import Multiselect from 'vue-multiselect';
import sleep from './../../../mixins/sleep-mixin';
export default {
    components : {
        Multiselect
    },
    mixins : [auth, sleep],
    data() {
        return {
            name : null,
            sumariza : null,
            saving_spinner : false,
            has_error : false
        }
    },
    methods : {
        modalShow(){
            $(this.$refs.modalAccountingAccount).modal('show');
        },

        modalClose(){
            $(this.$refs.modalAccountingAccount).modal('hide');
            this.name = null;
            this.has_error = false;
        },

        async son_provider()
        {
            this.has_error = false;
            this.saving_spinner = true;
            this.sleep(500);
            let payload = {
                token : this.User.token,
                name : this.name
            }
            let accounting_account = await this.$store.dispatch('son_provider', payload)
                    .catch(((error) => {
                        this.has_error = true;
                    })).finally(()=> this.saving_spinner = false);

            if (accounting_account) {
                this.$store.commit('SET_PROVIDER_SUBLEVEL_ACCOUNTING_ACCOUNT', accounting_account.data);
                this.modalClose();
                this.name = null;
            }

        }

    },

    computed : {

        ...mapGetters([
            'AccountingAccountsGetter',
        ])
    },

    mounted() {
        Event.$on('open-accounting-account-modal', () => {
            $(this.$refs.modalAccountingAccount).modal('show')
        });
    },

}
</script>
    