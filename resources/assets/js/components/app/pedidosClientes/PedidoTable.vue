<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <button 
                            type="button" 
                            class="btn btn-primary" 
                            @click="addProduct()"
                            >Agregar Producto</button>
                    </div>
                    <strong>Detalle</strong>
                </div>
                <div class="card-body" data-toggle="match-height">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-8 text-center">Producto</th>
                                <th class="col-md-2 text-center">Total</th>
                                <th class="col-md-1 text-center">Borrar</th>
                            </tr>
                        </thead>
                        <PedidoRow v-for="(row, index) in GetProductsFromPedidos" :key="index" :number="index"></PedidoRow>
                    </table>
                    <div class="text-right">
                        <h3>Total del pedido: {{ TotalPedido | currency}}</h3>
                    </div>
                </div>
                
            </div>
            <div class="col-md-12 text-center">
                <div
                    v-tooltip="(! PedidoHasCustomer) ? 'Debe seleccionar un cliente' : ''"
                >
                    <button 
                        class="btn btn-primary"
                        @click="save()"
                        :disabled="! PedidoHasCustomer"
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
                        >Guardar pedido
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
import toast_mixin from './../../../mixins/toast-mixin';
import PedidoRow from './PedidoRow';
export default {
    name : 'F',
    
    mixins : [auth, toast_mixin],
    
    components : {
        PedidoRow
    },

    data()
    {
        return {
            spinner : false
        }
    },

    computed : {
        ...mapGetters(
            [
                'ProductsCount',
                'TotalPedido',
                'GetProductsFromPedidos',
                'PaymentTypeGetter',
                'PedidoHasCustomer'
            ]
        )
    },

    watch : {
       
        TotalPedido(n)
        {
            this.$store.state.pedidos_clientes.pedido.total_pedido = n;
        },

        PaymentTypeGetter(n)
        {
            this.$store.commit('SET_PAY_METHOD', n);
        }

    },
    
    methods : {

        addProduct(){
            this.$store.commit('ADD_PRODUCT_TO_PRODUCTS');
        },

        async save()
        {
            this.spinner = true;

            let pedido = await this.$store.dispatch('pedido_store', this.User.token);

            this.spinner = false;

            if (pedido) {
                
                this.success_message('Pedidos', 'Transacción correcta')

                this.$store.commit('SET_INITIAL_STATUS_PEDIDO_CLIENTE');

                Event.$emit('clean_async_customers');

            }
            

        }
    },
       
}
</script>