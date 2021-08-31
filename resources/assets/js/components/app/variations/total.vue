<template>
    <div class="text-center">
        <span class="badge badge-danger">{{data.total_stock}}</span>
    </div>
</template>

<script>
import busVue from './../../../extras/eventBus';
export default {
    props : ['data'],
    data() {
        return {
            values : this.data
        }
    },
    computed : {
        Available(){
            return this.data.available_total - this.data.available_quantity
        }
    },

    mounted() {
        let $vm = this;
        busVue.$on('increment_quantity', (values) => {
            if(values.variation_number == this.data.variation_number){
                $vm.values = Object.assign({}, values);
            }
        });

        busVue.$on('decrement_quantity', (values) => {
            if(values.variation_number == this.data.variation_number){
                $vm.values = Object.assign({}, values);
            }
        });
    },
}
</script>

<style>

</style>
