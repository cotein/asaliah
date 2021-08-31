const actions = {

        async fetchParentCategories(context, token){
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/categories/parent')

                return response;

            } catch (e) {
                throw e;
            
            }
        },

        async fetchChildCategories(context, payload){
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/categories/child', {
                    category_id : payload.category_id
                }); 

                return response;

            } catch (e) {
                throw e;
            
            }
        },

        

        async category_store(context, payload)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let category = await axios.post('/api/categories/store', {
                    name : payload.name,
                    parent_id : payload.parent_id,
                    attributes : payload.attributes
                })

                return category;

            } catch (e) {
                throw e;
            }
        },

        newCategorySetName(context, name)
        {
            context.commit('NEW_CATEGORY_SET_NAME', name);
        },

        updateCategoryValue(context, category)
        {
            if (category && category.id) {
                context.commit('ADD_CATEGORY_TO_SELECTED_CATEGORIES_FROM_ROOT', category);
                if (parseInt(category.parent_id) > 0) {
                    context.commit('NEW_CATEGORY_SET_PARENT_ID', category);
                }
            }else{
                context.commit('SET_CATEGORY_INITIAL_STATUS');
            }
        },

        async setCategoryStatus(context, payload)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

                let category = await axios.post('/api/categories/set_status', {
                    category_id : payload.category_id,
                    status : payload.status,
                })

                return category;

            } catch (e) {
                throw e;
            }
        }
}

export default actions;