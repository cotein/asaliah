import collect from 'collect.js';
import variations from './../vuex/modules/variations';

class HandleVariationAttribute {
    constructor(variations_attibutes){
        this.variations_attibutes = collect(variations_attibutes);
    }

    createArrayForEachVariationAttribute() {
        this.variations_attibutes.sortBy('name', 'asc').each((item) => {
            Vue.set(variations.state.variations_attibutes, item.id, item);
        })
    }
}

export default HandleVariationAttribute;