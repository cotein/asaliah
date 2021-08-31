import collect from 'collect.js';
import variations from './../vuex/modules/variations';

class HandleAllowVariations {
    constructor(allow_variations) {
        this.allow_variations = collect(allow_variations);
    }

    createArrayForEachAttribute() {
        this.allow_variations.each((item) => {
            let values = collect(item.values).sortBy('name', 'asc');
            Vue.set(variations.state.options, item.id, values.all());
        })
        //console.log(variations.state.options);
    }

}

export default HandleAllowVariations;