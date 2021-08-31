
const actions = {

    async getUserList({commit}, token)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.get('/api/company/user/index');

            commit('SET_USERS', response.data);

            return response;

        } catch (e) {
            throw e;
        }
    },

    async updateUserRol({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.put('/api/company/user/rol/update', {
                user_id : payload.user_id,
                new_rol : payload.rol
            });

            return response;

        } catch (e) {
            throw e;
        }
    },

    async active({commit}, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
            
            let response = await axios.put('/api/company/user/active', {
                user_id : payload.user_id,
                active : payload.active
            });

            return response;

        } catch (e) {
            throw e;
        }
    },
}

export default actions;