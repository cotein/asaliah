<template>
    <div>
        <label class="custom-control custom-control-primary custom-checkbox">
            <input class="custom-control-input" type="checkbox"  
                v-model="checked"
                @change="Check()"
            >
            <span class="custom-control-indicator"></span>
        </label>
    </div>
</template>

<script>
    import {Event} from 'vue-tables-2';
    
    export default {
        props: ['data', 'index'],
        data() {
            return {
                checked : false,
            }
        },
        methods : {
            Check(){
                if (this.checked) {
                    
                    this.data.selected_to_update = true;
                    
                    Event.$emit('checked', this.data)

                }else{

                    this.data.selected_to_update = false;

                    Event.$emit('unchecked', this.data)
                }

            }
        },
        computed : {
            
        },

        mounted() {
            let $vm = this;

            Event.$on('checkAll', () => {
                $vm.checked = true;
            });

            Event.$on('uncheckAll', () => {
                $vm.checked = false;
            });
        },
       
    }
</script>
