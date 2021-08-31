import collect from 'collect.js';
export default  {
    state : {
        product : [],
    },

    actions : {
        publish(state){
            setTimeout(() => {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + $vm.token;
                axios.post('/api/publication/publish', {'products' : state.product})
                .then((result) => {
                    console.info(result)
                }).catch((err) => {
                    console.error(err);
                });
            }, 750);
        }, 
    },

    mutations : {
        SET_PRODUCT(state, product){
            let pro = collect(product);
            //Vue.set(state.product, pro.count(), product);
            state.product = product;
        },

        DELETE_PRODUCT(state){
            state.product = [];
        }
    },
    
    getters : {
        ProductToPublish(state){
            return state.product;
        },

        

        IsPublished(state){
            let result = false;

            collect(state.product.variation).every((v)=>{
                if (v.published == true) {
                    result = true;
                    return false;    
                }
            });

            return result;
        }

    }
}