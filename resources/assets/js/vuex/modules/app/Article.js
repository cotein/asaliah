export default {

    state : {

        articles : [],
        article : false
    },

    actions : {

        async get_articles({commit}, token)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/article/index');
                
                commit('SET_ARTICLES', response.data);

                return response

            } catch (e) {
                console.log('error en get_articles action');
                console.log(e);
            }
        },

        async save_article({commit}, payload)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/article/store',
                {
                    article : payload.article
                });

                commit('SET_ARTICLE', response.data);

                return response

            } catch (e) {
                console.log('error en save_article action');
                console.log(e);
            }
        }
    },

    mutations : {

        SET_ARTICLES(state, value)
        {
            state.articles = value;
        },

        SET_ARTICLE(state, value)
        {
            state.article = value;
        }
    },

    getters : {

        ArticleGetter(state)
        {
            return state.article;
        },

        ArticlesGetter(state)
        {
            return state.articles;
        }
    }
}