export const SET_PUBLICATIONS = 'SET_PUBLICATIONS';
import collect from 'collect.js';
export default {

    state : {
        publications : [],
    },

    actions : {
        getPublicationsFromHere(context, token){
            setTimeout(() => {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                axios.get('/api/publication/index')
                .then((result) => {
                    console.info(result)
                    context.commit(SET_PUBLICATIONS, result.data);
                }).catch((err) => {
                    console.error(err);
                });
            }, 750);
        }
    },

    mutations : {
        [SET_PUBLICATIONS](state, publications){
            state.publications = publications;
        }
    },

    getters : {
        PublicationsFromHere(state){
            let publications = collect(state.publications);
            if (publications.count() == 0) {
                return [];
            }
            return state.publications;
        }
    }
}