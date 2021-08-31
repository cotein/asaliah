<template>
    <div>
        <!-- <button 
            @click="goTo" 
            v-tooltip="'Editar pedido'"
            class="btn btn-info btn-icon sq-32" 
            type="button">
            <span class="icon icon-edit"></span>
        </button> -->
        <button 
            @click="pedido_cliente_delete"
            v-tooltip="'Anular pedido'"
            class="btn btn-outline-danger btn-icon sq-32"
            :class="{'btn btn-danger spinner spinner-inverse spinner-sm' : spinner}" >
            
            <span class="icon icon-trash"></span>
        </button>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import {Event} from 'vue-tables-2';
    import auth from './../../../mixins/auth';
    import toast_mixin from './../../../mixins/toast-mixin';
    export default {
        props: ['data', 'index'],
        data() {
            return {
                token : null,
                spinner : false
            }
        },

        mixins : [auth, toast_mixin],
        
        methods : {
            goTo()
            {
                let code = String(this.data.id);

                window.location.href = "/pedidos/clientes/edicion/" + code;
            },

            async print(){
            
                let tributos = await this.$store.dispatch('tipoTributos', this.User.token);
            },

            async pedido_cliente_delete()
            {
                let payload = {
                    token : this.User.token,
                    pedido_cliente_id : this.data.id
                }
                this.spinner = true;
                let pedido = await this.$store.dispatch('pedido_delete', payload);
                if (pedido) {
                    this.success_message('Se eliminó correctamente', 'Pedidos');
                    Event.$emit('pedido_cliente_delete', this.data);
                }

                this.spinner = false;
            }
        },

        computed : {
            ...mapGetters([
                'GetCompany'
            ])
        },

        /* watch : {
            GetCompany(n)
            {
                console.log('cambio getcompany');
                console.log(n);
            }
        }, */

        mounted() {

        },
       
    }
</script>