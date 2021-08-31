import collect from 'collect.js';
export default {
    state : {
        publications : [],
        quick_view_product : {
            data_for_select : []
        },
        selected_category : null,
        loading : false,
        see_all_products : false  
    },
    actions : {
        /** WEB - Sort Publications*/
        lowestAtHighestPrice(context, value){
            let publications = collect(context.state.publications);
            if (value == 1) Vue.set(context.state, 'publications', publications.sortBy('raw_price').all());
            if (value == 2) Vue.set(context.state, 'publications', publications.sortByDesc('raw_price').all());

        },

        /** API */
        storePublication(context){
            setTimeout(() => {
                //window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.$store.state.user.token;
                axios.post('/api/publication/store', {'publication' : context.publication})
                .then((result) => {
                    $vm.disabled_button = false;
                }).catch((err) => {
                    $vm.disabled_button = false;
                });
            }, 2000);
        },

    }, 

    mutations : {

        SET_SEE_ALL_PRODUCTS_VALUE(state, value){
            state.see_all_products = value
        },

        SET_PUBLICATIONS_WEB_WITH_PAGINATION(state, value){
            //state.publications = value;
            let publications = collect(state.publications);
            
            if (publications.count()==0) {
                state.publications = value;
            }else{
                const diff = collect(value).diff(publications);

                diff.each((p) => {
                    state.publications.push(p);
                });
                
            }
        },

        SET_PUBLICATIONS_WEB(state, value){
           state.publications = [];
           state.publications = value;
        },

        SELECTED_CATEGORY(state, value){
            state.selected_category = value;
        },

        SET_QUICK_VIEW_PRODUCT(state, product){
            state.quick_view_product = product;
        },

        SET_LOADING(state, value){
            state.loading = value;
        },

        CLEAR_PUBLICATIONS(state){
            state.publications = [];
        }

    },
    getters : {
        GetSeeAllProducts(state){
            return state.see_all_products;
        },
        
        Loading(state){
            return state.loading;
        },

        PublicationsWeb(state){
            if (state.publications != null) {
                return state.publications;
            }
            return []
        },

        HasPublicationsWeb(state){
            let publications = collect(state.publications);

            if (publications.count() > 0) {
                return true;
            }

            return false;
        },

        QuickViewProduct(state){
            if (state.quick_view_product != null) {
                return state.quick_view_product;
            }
            return []
        },

        SelectedCategory(state){
            return state.selected_category;
        },

        
    }
}