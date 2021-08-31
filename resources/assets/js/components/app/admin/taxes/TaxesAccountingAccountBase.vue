<template>
    <div>
        <multiselect placeholder="Inscripción" 
            track-by="name" label="name"
            :options="AccountingAccountsGetter"
            v-model="accounting_account"
            :loading="loading"
            :disabled="(data)?! data.status:false"
            :appendToBody = "{optionsZindex: 999, hideScrollLevel: 5}"
            >
            <span slot="noOptions">
                    Lista Vacía
            </span>
            <span slot="noResult">
                    La búsqueda no arrojó resultados
            </span>
        </multiselect>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import Multiselect from 'vue-multiselect';
    import sleep from './../../../../mixins/sleep-mixin';
    import toast from './../../../../mixins/toast-mixin';
    export default {
        props : ['number', 'data'],

        mixins : [sleep, toast],

        components : {
            Multiselect
        },
        data(){
            return {
                accounting_account : {id:null,name:null},
                loading : false
            }
        },

        computed : {

            ...mapGetters([
                'AccountingAccountsGetter'
            ])
        },
    }
</script>
