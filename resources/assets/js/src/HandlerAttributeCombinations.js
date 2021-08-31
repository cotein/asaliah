import collect from 'collect.js';

class HandlerAttributeCombinations {

    constructor(publication){

        this.publication = publication;

    }

    process_attribute_combinations(products){
        
        let prdcts = collect(products);

        return prdcts.map(product => {

            return collect(product.variations).map(variation => {

                return collect(variation.attribute_combinations).map(attr => {
                    //console.log(attr);                    
                        return attr;

                }).all();

            }).all();

        }).flatten(2).unique('value_name').each(p => {

            return p;
            
        });

    }

    process_variations(vs){
        
        let variations = collect(vs);

        return variations.map(variation => {

            return collect(variation.attribute_combinations).map(attr => {
                //console.log(attr);                    
                    return attr;

            }).all();

        }).all();

    }

    fetch_keys(attribute_combinations){

        return attribute_combinations.map((attr) => {
            
            return attr.id;
        
        }).unique().all();
        
    }

    fetch_colors(attribute_combinations){

        return attribute_combinations.filter((color)=>{
        
            if (color.id == 'COLOR') {
                
                color.show = true;
                
                return color;
            }

        }).sortBy('value_name').all();
    }

    colors(attribute_combinations){

        return attribute_combinations.filter((color)=>{
        
            if (color.id == 'COLOR') {

                return color;
            }

        });
    }

    fetch_sizes(attribute_combinations){

        return attribute_combinations.filter((size)=>{
        
            if (size.id == 'SIZE') {

                size.show = true;

                return size;
            }

        }).sortBy('value_name').all();
    }

    /**
     * Extrae cada attributo del producto (attribute_combinations)
     * para crear un filtyer_nav
     */
    filter_types(types, attribute_combinations) {

        return collect(types).map((type, index) => {

            return collect(attribute_combinations).filter((attr)=>{

                if (attr.id == types[index]) {
    
                    attr.show = true;
    
                    return attr;
                }
    
            }).sortBy('value_name').all();

        }).all();

    }

}

export default HandlerAttributeCombinations;
