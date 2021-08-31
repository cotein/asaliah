<template>
    <div class="form-group">
        <label>{{attr.name}}</label>
        <input class="form-control" type="text" v-model="value" :disabled="Disabled">
        <small class="help-block" v-if="HasAllowVariation">Campo requerido</small>
        <small>{{ValueType}}</small>
        <small>{{ToolTip}}</small>
        <small>{{Hint}}</small>
    </div>
</template>

<script>
import collect from 'collect.js';
import busVue from './../../../../extras/eventBus';
export default {
    props : ['attr', 'index', 'sku'],
    data() {
        return {
            value : null,
            attribute : {
                id : null,
                value_id : null,
                value_name : null
            }
        }
    },
    methods: {
        GiveItFormat(){
            let $vm = this;
            let attributes = collect($vm.attr);

            $vm.attribute.id = $vm.attr.id;
            $vm.attribute.value_id = $vm.attr.id;
            $vm.attribute.value_name = (attributes.has('default_unit')) ? $vm.value + ' ' + $vm.attr.default_unit : $vm.value
        }
    },
    computed : {
        ValueType(){
            if (this.attr.value_type == 'number_unit') {
                return 'Unidad por defecto: ' + this.attr.default_unit;
            }
        },

        ToolTip(){
            if (this.attr.tooltip) {
                return this.attr.tooltip;
            }
        },

        Hint(){
            if (this.attr.hint) {
                return this.attr.hint;
            }
        },

        Disabled(){
            if (this.attr.id == 'SELLER_SKU') {
                return true;
            }
            return false;
        },

        HasAllowVariation(){
            let tags = collect(this.attr.tags);

            if (tags.has('allow_variations')) {
                return true;
            }

            return false;
        }
    },
    mounted() {
        let $vm = this;
        
        setTimeout(() => {
            if ($vm.Disabled) {
                $vm.attribute.id = 'SELLER_SKU';
                $vm.attribute.value_id = $vm.sku;
                $vm.attribute.value_name = 'SKU'

                $vm.value = $vm.sku;
            }
        }, 200);

        busVue.$on('send_variation_attribute', ()=>{
            if ($vm.value != null) {
                $vm.GiveItFormat();
                setTimeout(() => {
                    $vm.$store.commit('ADD_VARIATION_ATTRIBUTE', $vm.attribute);
                }, 111 * $vm.index + 1);
            }
        });

        busVue.$on('request_attribute_from_variation', ()=>{
            if ($vm.value != null) {
                $vm.GiveItFormat();
                setTimeout(() => {
                    busVue.$emit('send_attribute_from_variation_attribute_input',  $vm.attribute)
                }, 111 * $vm.index + 1);
            }
        });

    },
}
</script>

<style>
</style>
