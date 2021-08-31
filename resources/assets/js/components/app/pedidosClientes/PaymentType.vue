<template>
    <div >
        <label for="">MODO DE PAGO</label>
        <multiselect placeholder="Modo de Pago" 
            id="payment_type"
            track-by="name" label="name"
            :options="PaymentTypesGetter"
            @input="updatePaymentTypeValue"
            :value="PaymentTypeGetter"
            selectLabel="Seleccionar"
            selectedLabel="Seleccionado"
            deselectLabel="Quitar"
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
import Multiselect from 'vue-multiselect';
import auth from './../../../mixins/auth';
import {mapGetters, mapActions, mapState} from 'vuex';
export default {
    props : ['index'],
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            show_spinner : false,
        }
    },

    methods : {

       ...mapActions(['updatePaymentTypeValue'])
    },

    computed : {

        ...mapGetters([
            'PaymentTypesGetter',
            'PaymentTypeGetter'
        ]),
    },

    mounted()
    {
        let payment_types = this.$store.dispatch('getPaymentTypes', this.User.token);

    }

}
</script>
