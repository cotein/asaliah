import MeliHandleData from "./../../src/MeliHandleData";
import HandleVariationAttribute from './../../src/HandleVariationAttribute';
import collect from 'collect.js';
export default {
    state : {
        token : null,
        category : null,
        attributes : [],
        loading_attributes : false,
    }, 
    actions : {
        getAttributes(context){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.token;

            context.commit('SET_LOADING_ATTRIBUTES', true);

            return axios.post('/api/products/fetchattributes', {'category' : context.state.category})
            .then((result) => {
                context.commit('SET_ATTRIBUTES', result.data);
                context.commit('SET_LOADING_ATTRIBUTES', false);
            }).catch((err) => {
                console.log(err);
                context.commit('SET_LOADING_ATTRIBUTES', false);
            });
        }
    },
    mutations : {
        SET_ATTRIBUTES(state, value){
            state.attributes = value
        },

        SET_TOKEN(state, token){
            state.token = token
        },

        SET_CATEGORY(state, category){
            state.category = category   
        },

        SET_LOADING_ATTRIBUTES(state, value){
            state.loading_attributes = value
        }
    }, getters : {
        LoadingAttributes(state){
            return state.loading_attributes;
        },

        GetVariationAttributes(state){
            let data = new MeliHandleData(state.attributes);
            return data.fetch_variations_attributes().variations_attributes.items;
        },

        /* GetAllowVariationColor(state){
            let data = new MeliHandleData(state.attributes);
            let allow_variations = data.fetch_allow_variations_attributes().allow_variations.items;
            return collect(allow_variations).filter((i) => {
                if (i.id == 'COLOR') {
                    return i;
                }
            }).all();
        }, */

        GetAttributeColor(state){
            let data = new MeliHandleData(state.attributes);
            let variations_attributes = data.fetch_variations_attributes().variations_attributes.items;
            return collect(variations_attributes).filter((i) => {
                if (i.id == 'MAIN_COLOR') {
                    return i;
                }
            }).all();
        },

        GetAttributeSize(state){
            let data = new MeliHandleData(state.attributes);
            let variations_attributes = data.fetch_variations_attributes().variations_attributes.items;
            return collect(variations_attributes).filter((i) => {
                if (i.id == 'FOOTWEAR_SIZE') {
                    return i;
                }
            }).all();
        }
    }
}