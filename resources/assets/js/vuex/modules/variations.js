import collect from 'collect.js';

export default {
    state: {
        options: [],
        variations_attibutes: [],
        row : {
            /* value : null,
            price : 0,
            available_quantity : 0 */
        }
        
    },

    getters : {
        OptionsColor(state){
            let options = collect(state.options);
            if (options.has('COLOR')) {
                return state.options.COLOR;
            }
            return [];
        },

        OptionsSize(state){
            let options = collect(state.options);
            if (options.has('SIZE')) {
                return state.options.SIZE;
            }
            return [];
        },

    },

    mutations: {
       
    }
}