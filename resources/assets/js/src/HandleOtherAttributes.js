import collect from 'collect.js';

class HandleOtherAttributes {
    constructor(attributes){
        this.attributes = collect(attributes);
    }

    createArrayForEachOtherAttribute() {
        this.attributes.sortBy('name', 'asc').each((item) => {
            Vue.set(products.state.others_attributes, item.id, item);
        })
    }
}

export default HandleOtherAttributes;