export default {
    state : {
        publications : [],
        quick_view : null,
    },
    actions : {
        /** WEB */
        getPublications(context){
            return axios.get('/publications')
            .then((result) => {
                context.commit('SET_PUBLICATIONS', result.data)
            }).catch((err) => {

            });
        },

        /** API */
        storePublication(context){
            setTimeout(() => {
                //window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.user.token;
                axios.post('/api/publication/store', {'publication' : context.publication})
                .then((result) => {
                    $vm.disabled_button = false;
                }).catch((err) => {
                    $vm.disabled_button = false;
                });
            }, 2000);
        }
    }, 

    mutations : {
        

        SET_QUICK_VIEW(state, publication){
            state.quick_view = publication
        }
    },
    getters : {
        Publications(state){
            if (state.publications != null) {
                return state.publications;
            }
            return []
        },

        QuickView(state){
            if (state.quick_view != null) {
                return state.quick_view;
            }
            return []
        }
    }
}