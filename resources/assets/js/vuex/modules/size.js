export default {
    state : {
        sizes : []
    },
    actions  :{
        fetchIvas(context){
            /**
             * Desde el objeto context accedemos a todo el estado
             */
            return axios.get('/api/get_ivas')
            .then((result) => {
                context.commit('ADD_IVAS', result.data);
            }).catch((err) => {
                console.log(err);
            });
        }
    },
    mutations :{
        ADD_SIZES(state, sizes){
            state.sizes = sizes;
        },

       
    }
}