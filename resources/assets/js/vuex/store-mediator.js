export default function (store) {
    
    store.subscribe(({type, payload}, state) => {

        switch (type) {
            case 'NEW_ORDER_SET_DISCOUNT_PRODUCT':
            case 'NEW_ORDER_SET_QUANTITY_PRODUCT':
            case 'NEW_ORDER_SET_UNIT_PRICE_PRODUCT':
            case 'NEW_ORDER_SET_TOTAL_PRODUCT':
               store.dispatch('updateTotalOnRowProduct', payload.index);
               //store.dispatch('calculeIvaImportAction', payload.index);
               break;
        
        }
    });
}