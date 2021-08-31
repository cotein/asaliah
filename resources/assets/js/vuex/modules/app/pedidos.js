import collect from 'collect.js';
export default {

    state : {
        pedidos : [],
        bill_button_show_spinner : false
    },

    actions : {

        getPedidos(context, token){

            return new Promise((resolve, reject) => {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                axios.get('/api/pedidos/getpedidos')
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });
            });
        }
    },

    mutations : {

        /* SET_PEDIDOS(state, value){
            state.pedidos = value;
        }, */

        SET_BILL_BUTTON_SHOW_SPINNER(state, value){
            state.bill_button_show_spinner = value
        }
    },

    getters : {

        Pedidos(state){
            
            return state.pedidos
            /* let pedidos = collect(state.pedidos);

            if (pedidos.isEmpty()) {
                return state.pedidos;
            } */
        },

        BillButtonShowSpinner(state){
            return state.bill_button_show_spinner
        }
    }
}