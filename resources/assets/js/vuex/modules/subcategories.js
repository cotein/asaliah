import  MeliHandleData from "./../../src/MeliHandleData";
import HandleAllowVariations from './../../src/HandleAllowVariations';
import HandleVariationAttribute from './../../src/HandleVariationAttribute';
import HandleOtherAttributes from "../../src/HandleOtherAttributes";

export default {
    state : {
        sub_categories : [],
        attributes : [],
        variations_attributes : [],
        children_category : null
    },
    actions  :{
        fetchChildrenCategories(context, el){   
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + el.token;
            return axios.post('/api/categories/fetch_children_categories', {'category' : el.category})
            .then((result) => {
                if (result.data.body.children_categories.length > 0) {
                    context.commit('ADD_SUB_CATEGORIES', result.data.body.children_categories);
                }else{
                    context.commit('ADD_CHILDREN_CATEGORY', result.data.body);
                    
                    context.dispatch('fetchAttributes', el);

                    context.commit('ADD_PATH_FROM_ROOT', result.data.body.path_from_root);
                    
                    context.commit('ADD_SKU_CODE', result.data.body.id);

                }
            }).catch((err) => {
                console.log(err);
            });
        },

        fetchAttributes(context, el){
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + el.token;

            return axios.post('/api/products/fetchattributes', {'category' : el.category})
            .then((result) => {

                let handle_meli_data = new MeliHandleData(result.data);
                let allow_variations = handle_meli_data.fetch_allow_variations_attributes().allow_variations;
                
                let handle_allow_attributes = new HandleAllowVariations(allow_variations);
                handle_allow_attributes.createArrayForEachAttribute();

                let others_attributes = handle_meli_data.fetch_attributes().others_attributes
               
                let oa = new HandleOtherAttributes(others_attributes);
                oa.createArrayForEachOtherAttribute();

                context.commit('ADD_ATTRIBUTES', result.data);
            }).catch((err) => {
                console.log(err);
            });
        }

    },
    getters : {
        VariationAttributes(state){
            let data = new MeliHandleData(state.attributes);
            return data.fetch_variations_attributes().variations_attributes.items;
        },

        OthersAttributes(state){
            let data = new MeliHandleData(state.attributes);
            return data.fetch_attributes().others_attributes.items;
        },

        AllowVariationsAttributes(state){
            let data = new MeliHandleData(state.attributes);
            return data.fetch_allow_variations_attributes().allow_variations.items;
        },

        MaxTitleLength(state){
            if (state.children_category != null) {
                return state.children_category.settings.max_title_length;
            }else{
                return 0;
            }
        },

        MaxDescriptionLength(state){
            if (state.children_category != null) {
                return state.children_category.settings.max_description_length;
            }else{
                return 0;
            }
        }
    },
    mutations :{
        
        ADD_SUB_CATEGORIES(state, sub_categories){
            state.sub_categories.push(sub_categories);
        },

        ADD_ATTRIBUTES(state, attributes){
            state.attributes = attributes;
        },

        ADD_CHILDREN_CATEGORY(state, value){
            state.children_category = value;
        }

    }
}