<template>
        <a :href="Edit()" class="btn btn-outline-warning btn-icon sq-32" type="button" :class="{isDisabled : Disabled}">
            <span class="icon icon-edit"></span>
        </a>
</template>

<script>
import busVue from '../../../extras/eventBus';
    export default {
        props: ['data', 'index'],
       
        methods : {
            rowNumber(){
                return this.index;
            },
            Edit(){
                return '/mercadolibre/editar/' + this.data.id;
            }
        },
        computed : {
            Disabled(){
                if (this.data.status != 'active') {
                    return true;
                }
                return false;
            }
        },
        mounted() {
            let $vm = this;
            busVue.$on('change_status', (data)=>{
                if ($vm.data.id == data.id) {
                    $vm.data.status = data.status;
                    $vm.data = Object.assign({}, $vm.data);
                }
                
            });
        },
    }
</script>
<style scoped>
    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
        pointer-events: none;
    }
</style>
