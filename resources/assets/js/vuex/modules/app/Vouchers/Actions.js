const actions = {

    async getVouchers(context, token){

        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

            let response = axios.get('/api/vouchers/index');

            return response.data;

        } catch (error) {
            
            throw error;
        }
    }
}

export default actions;