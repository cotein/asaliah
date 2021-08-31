<template>
    <div>
        <BlockUI :message="msg" v-if="loading">
        </BlockUI>
        <Product__Table />
    </div>
</template>

<script>
import {mapActions} from 'vuex';
import auth from '../../../../../mixins/auth';
import Product__Table from './ProductTable';

    export default {
        
        mixins : [auth],

        components : {
            Product__Table
        },

        data(){
            return {
                loading : false,
                msg : "Buscando productos"
            }
        },

    }
</script>