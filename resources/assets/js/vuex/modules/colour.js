import Collection from 'collectionsjs';
export default {
    state : {
        colours : []
    },
    actions  :{
        fetchColours(context, token){
            /**
             * Desde el objeto context accedemos a todo el estado
             */
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            return axios.get('/api/colours/get_colours')
            .then((result) => {
                let sort_colours = new Collection(result.data).sortBy('name', 'asc');
                setTimeout(() => {
                    context.commit('ADD_COLOURS', sort_colours.all());    
                }, 200);
                
            }).catch((err) => {
                console.log(err);
            });
        }
    },
    mutations :{
        ADD_COLOURS(state, colours){
            state.colours = colours;
        },
    },
    getters : {
        
    }
}