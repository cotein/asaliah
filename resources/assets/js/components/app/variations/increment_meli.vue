<template>
    <div class="btn-group btn-group-sm" role="group">
        <button @click="Decrement()" class="btn btn-default" type="button" :disabled="DecrementDisabled">
            <span class="icon icon-minus"></span>
        </button>
        <div class="btn btn-default">
            {{Result}}
        </div>
        <button @click="Increment()" class="btn btn-default" type="button" :disabled="IncrementDisabled">
            <span class="icon icon-plus"></span>
        </button>
    </div>
</template>

<script>
import busVue from './../../../extras/eventBus';
export default {
    props : ['data'],
    data() {
        return {
            quantity : null,
        }
    },

    methods: {
        Increment(){
            if (this.data.total_stock > this.data.available_quantity_meli) {
                this.quantity++  
            
                this.data.available_quantity_meli = this.quantity;
                busVue.$emit('increment_quantity', this.data);
            }
        },

        Decrement(){
            if (this.data.available_quantity_meli <= this.data.total_stock) {
                this.quantity--;  

                this.data.available_quantity_meli = this.quantity;
                busVue.$emit('decrement_quantity', this.data);
            }
        }
    },

    computed: {
        Result(){
            return this.quantity;
        },

        IncrementDisabled(){
            if (this.total<=0) {
                return true
            }
            return false;
        },

        DecrementDisabled(){
            if (this.quantity < 1) {
                return true
            }
            return false;
        }
    },

    mounted() {
        this.quantity = 0;
        this.total = this.data.available_total;
    },
}
</script>

<style>

</style>
