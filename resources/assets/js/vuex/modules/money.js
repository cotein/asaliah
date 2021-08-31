export default {
    state : {
        moneys : false
    },
    actions : {

        async fetchMoney(context){

            try {
                let moneys = await axios.get('/api/get_moneys');

                //context.commit('ADD_MONEYS', moneys.data);

                return moneys;

            } catch (error) {
                
            }
            /* return axios.get('/api/get_moneys')
            .then((result) => {
                context.commit('ADD_MONEYS', result.data);
            }).catch((err) => {
                console.log(err);
            }); */
        }
    },
    mutations : {
        ADD_MONEYS(state, moneys){
            state.moneys = moneys;
        },
    },

    getters : {

        GetMoneys(state){

            if (state.moneys) {
                return state.moneys
            }
            return [];
        }
    }
}