<template>
    <div>
        <loading 
            :active.sync="Load" 
            color="#0469c7"
            :height="31"
            :width="31"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                <button type="button" class="card-action card-toggler" title="Collapse"></button>
                <button type="button" class="card-action card-reload" title="Reload"></button>
                <button type="button" class="card-action card-remove" title="Remove"></button>
                </div>
                <strong>Productos involucrados en la venta</strong>
                <span aria-hidden="true"> · </span>
                <!-- <a href="#">View full report</a> -->
            </div>
            <div class="card-body">
                <table class="table table-borderless table-fixed" v-if="HasOrderItems">
                    <ol>
                        <li v-for="(product, index) in GetOrderItems" :key="index">
                            <p>{{product.item.title}}</p>
                            <p>Cantidad: {{product.quantity}}</p>
                            <p>Precio unitario: {{product.unit_price | currency}}</p>
                        </li>
                    </ol>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex';
    import Loading from 'vue-loading-overlay';
    export default {
        components : {
            Loading
        },
        data() {
            return {
                load : null,
                buyer : null
            }
        },
        methods : {
           
        },
        computed : {
            ...mapGetters(['GetOrderItems', 'HasOrderItems']),

            Load(){
                if ( ! (this.HasOrderItems) ) {
                    return true;
                }
                return false
            }
        },
        mounted() {
            
        },

    }
</script>
