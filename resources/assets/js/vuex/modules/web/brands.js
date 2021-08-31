import collect from 'collect.js'
export default {
    state : {
        brands : []
    },

    actions : {

        getBrands(context){
            return new Promise((resolve, reject) => {
                axios.get('/brands')
                .then((response) => {
                    resolve(response);
                }, error => {
                    reject(error);
                });
            
            });
        },

    },

    mutations : {
        SET_BRANDS(state, value){
            state.brands = value;
        },

        SHOW_BRAND(state, brand_id){
            let brands = collect(state.brands);

            brands.each((bra, index) => {
                
                if (bra.id == brand_id) {

                    bra.show = true;
                    
                }
            });
        },

        SHOW_ALL_BRAND_FILTER(state){
            
            let brands = collect(state.brands);

            brands.each((brand, index) => {
                
                brand.show = true;
                    
            });

        },
    },

    getters : {
        Brands(state){
            return state.brands;
        }
    }

}