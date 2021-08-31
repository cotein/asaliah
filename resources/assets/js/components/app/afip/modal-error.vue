<template>
    <div ref="modalError" tabindex="-1" role="dialog" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Se ha producido un Error</h4>
                </div>
                <div class="modal-body" >
                    <div v-if="(GetErrors.hasOwnProperty('Code'))">
                        <p><strong>Código: </strong>{{GetErrors.Code}} : {{GetErrors.Msg}}</p>
                    </div>
                    <div v-else>
                        <div v-for="err in GetErrors" :key="err.Code">
                            <p><strong>Código: </strong>{{err.Code}} : {{err.Msg}}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click="initial_status_error_msg()" class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
export default {
    data() {
        return {
            
        }
    },
    methods : {
        modalShow(){
            $(this.$refs.modalError).modal('show');
        },

        modalClose(){
            $(this.$refs.modalError).modal('hide');
        },

        initial_status_error_msg(){
            this.$store.dispatch('initial_status_error_msg');
        }
    },

    computed : {

        ...mapGetters([
            'GetErrors',
        ])
    },

    mounted() {
        Event.$on('show-modal-error', () => $(this.$refs.modalError).modal('show'));
    },

}
</script>