const ZERO = 0;
import collect from 'collect.js';
/* 
POR EL TRANSPORTE DE CREMA DE LEVADURA
DESDE: SAF. ARGENTINA S.A. - VIRREY DEL PINO - BUENOS AIRES
HASTA: BIMBO - PILAR - BUENOS AIRES
HASTA: FARGO PANIFICADOS S.A. - VILLA TESEI - BUENOS AIRES
HASTA: CIA. DE ALIMENTOS FARGO S.A. - SAN FERNANDO - BUENOS AIRES
REMITOS: 1546/1547 - FECHA DE CARGA: 14/01/2020 - HDR: 143253 
*/
export default {
    namespace : true,
    state : {
        cart : {
            products : [],
            country : null,
            province : null,
            city : null,
            street : null,
            street_number : null,
            message : null,
            email : null,
            shipping_amount : 0,
        },

    },

    actions : {

    },

    mutations : {

        SET_COUNTRY(state, value){
            state.cart.country = value;
        },

        SET_PROVINCE(state, value){
            state.cart.province = value;
        },
        
        SET_CITY(state, value){
            state.cart.city = value;
        },

        SET_STREET(state, value){
            state.cart.street = value;
        },

        SET_STREET_NUMBER(state, value){
            state.cart.street_number = value;
        },

        SET_MESSAGE(state, value){
            state.cart.message = value;
        },

        SET_EMAIL(state, value){
            state.cart.email = value;
        },

        SET_SHIPPING_AMOUNT(state, value){
            //state.cart.shipping_amount = value;
            Vue.set(state.cart, 'shipping_amount', value);
        },

        CLEAR_CART(state){
            state.cart.products = [];
        },

        ADD_PRODUCT_TO_CART(state, product){
            state.cart.products.push(product);
        },

        DELETE_PRODUCT_CART(state, product){

            collect(state.cart.products).map((i, index) => {

                if (i.item.id == product.item.id) {
                        
                    state.cart.products.splice(index, 1);

                }
            })
            
        },

        CART_INITIAL_STATUS(state){
            state.cart.products = [],
            state.cart.country = null,
            state.cart.province = null,
            state.cart.city = null,
            state.cart.street = null,
            state.cart.street_number = null,
            state.cart.message = null,
            state.cart.email = null,
            state.cart.shipping_amount = 0
        }


    },
    
    getters : {

        TotalQuantity(state){
            let products = collect(state.cart.products);

            if (products.count() > 0) {
                return products.sum('quantity');
            }

            return ZERO;
        },

        Products(state){
            return state.cart.products;
        },

        Cart(state){
            return state.cart;
        },

        HasEmail(state){
            if (state.cart.email != null) {
                return true;
            }

            return false;
        },

        CountryGetter(state){
            return state.cart.country;
        },

        ProvinceGetter(state){
            return state.cart.province;
        },

        CityGetter(state){
            return state.cart.city;
        },

        EmailGetter(state){
            return state.cart.email;
        },

        ShippingAmountGetter(state){
            return state.cart.shipping_amount
        }
        
    }
}