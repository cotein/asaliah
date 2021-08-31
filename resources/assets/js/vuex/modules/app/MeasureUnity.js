export default {

    state : {

        measurement_unities : []
    },

    actions : {

        async getMeasureUnities({commit}, token)
        {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.get('/api/measure_unity/index');

                commit('SET_MEASURE_UNITIES', response.data);

                return response

            } catch (e) {
                console.log('error en getAddressType action');
                console.log(e);
            }
        }
    },

    mutations : {

        SET_MEASURE_UNITIES(state, value)
        {
            state.measurement_unities = value;
        }
    },

    getters : {

        MeasurementUnitiesGetter(state)
        {
            return state.measurement_unities;
        }
    }
}