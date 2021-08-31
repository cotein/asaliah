<template>
    <div>
        <p>
            {{value}}
        </p>
    </div>
</template>

<script>
import collect from 'collect.js';
import AttributeNameTransformer from "./../../../src/AttributeNameTransformer";
const AT = new AttributeNameTransformer;
export default {
    props : ['data', 'index'],
    data() {
        return {
            value : null
        }
    },
    methods : {

    },

    mounted() {
        let $vm = this;
        console.log(this);
        let attribute_combinations = collect(this.data.attribute_combinations);

        setTimeout(() => {
            attribute_combinations.each((attr) => {

                let name = new String(attr.id);

                let name_to_lower_case = name.toString().toLowerCase().trim();
                
                if ($vm.$attrs.column == name_to_lower_case) {
                    $vm.value = attr.value_name;
                }

            });
            
        }, 150);
        
    },
}
</script>

<style>

</style>
