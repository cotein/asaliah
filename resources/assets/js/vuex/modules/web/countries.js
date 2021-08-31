export default {
    state: {
        countries : [
            {
                id : 1,
                name : 'Argentina',
                afip_code : 200
            } 
        ]
    },

    getters : {
        Countries(state){
            
            if (state.countries != []) {
                return state.countries;
            }

            return [];
        }
    }

}