import collect from 'collect.js';

class MeliHandleData {
    constructor(attributes) {
        this.attributes = attributes;
        this.body = collect(this.attributes['body']);
        this.required_attributes = null;
        this.others_attributes = null;
        this.allow_variations = null;
        this.variations_attributes = null;
    }

    fetch_required_attributes() {

        this.required_attributes = this.body.filter((i) => {
            let tags = collect(i.tags);
            if (tags.has('required')) {
                return i;
            }
        });

        return this;
    }

    fetch_attributes() {

        this.others_attributes = this.body.filter((i) => {
            let tags = collect(i.tags);
            if (!tags.has('required') && !tags.has('allow_variations') && !tags.has('variation_attribute')) {
                return i;
            }
        });

        return this;
    }

    fetch_allow_variations_attributes() {
        this.allow_variations = this.body.filter((i) => {
            let tags = collect(i.tags);
            if (tags.has('allow_variations')) {
                return i;
            }
        });

        return this;
    }

    fetch_variations_attributes(){
        this.variations_attributes = this.body.sortBy('name', 'asc').filter((item) => {
            let tags = collect(item.tags);
            if (tags.has('variation_attribute')) {
                return item;
            }
        });

        return this;
    }
}

export default MeliHandleData;