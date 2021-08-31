import collect from 'collect.js';
export default {
    state : {
        ivas : [],
        payment_list : false
    },
    actions  :{
        fetchIvas(context){
            /**
             * Desde el objeto context accedemos a todo el estado
             */
            return axios.get('/api/get_ivas')
            .then((result) => {
                context.commit('ADD_IVAS', result.data);
                context.commit('PAYMENT_LIST', true);
            }).catch((err) => {
                console.log(err);
            });
        }
    },
    mutations :{
        ADD_IVAS(state, ivas){
            state.ivas = ivas;
        },
        PAYMENT_LIST(state, value){
            state.payment_list = value;
        }
    },

    getters : {
        GetIvas(state){
            let ivas = collect(state.ivas);

            if (ivas.count() > 0) {
                return state.ivas;
            }

            return []
        },
        /** Lo utilizo para habilitar el modal de ivas 
         * en Listado de Pagos en MercadoPago.
         * Es para informar el iva en los productos descargados de Meli,
         * ya que cuando se sincroniza no descarga el iva del producto
         */
        PaymentList(state){
            if (state.payment_list) {
                return true;
            }
            return false;
        }
    }
}