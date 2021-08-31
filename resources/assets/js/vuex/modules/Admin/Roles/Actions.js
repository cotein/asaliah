const actions = {

    async getRolesList({commit}, token)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.get('/api/company/rol/index');

            commit('SET_ROLES', response.data);

            return response;

        } catch (e) {
            console.log('error en getRolesList action');
            console.log(e);
        }
    },

}

export default actions;