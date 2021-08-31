import { Store } from "vuex";

export default {
    state : {
        suppliers : [],
    },
    getters : {
        GetSuppliers(state){
            return state.suppliers;
        }
    },
    actions : {
        getSuppliers(context, token){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return axios.post('/api/suppliers/index')
            .then((result) => {
                context.commit('ADD_SUPPLIERS', result.data);
            }).catch((err) => {
                console.log(err);
            });
        },
        
    },
    mutations : {
        ADD_SUPPLIERS(state, value){
            state.suppliers = value;
        }
    },



}

/* {
    state,      // same as store.state, or local state if in modules
    rootState,  // same as store.state, only in modules
    commit,     // same as store.commit
    dispatch,   // same as store.dispatch
    getters,    // same as store.getters, or local getters if in modules
    rootGetters // same as store.getters, only in modules
  } */