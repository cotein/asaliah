<template>
    <div class="scroll-y">
        <table class="my--table table-hover table-bordered">
            <thead>
                <tr>
                    <th width="3%" class="text-center">#</th>
                    <th width="35%" class="text-center">Nombre</th>
                    <th width="9%" class="text-center">P./Un.</th>
                    <th width="9%" class="text-center">Cantidad</th>
                    <th width="8%" class="text-center">Desc.</th>
                    <th width="10%" class="text-center">Iva</th>
                    <th width="20%" class="text-center">Total</th>
                    <th width="6%" class="text-center">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="(product, index) in ProductFromNewOrder" >
                    <tr :key="index">
                        <td class="text-center">{{ index + 1 }}</td>
                        <td class="text-left">{{( product && product.product) ? product.product.name : '' }}</td>
                        <td class="text-right">
                            <Editable_Td 
                                :index="index" 
                                :value="product.unit_price | currency"
                                :mutation="'NEW_ORDER_SET_UNIT_PRICE_PRODUCT'"
                            />
                        </td>
                        <td class="text-center">
                            <Editable_Td 
                                :index="index" 
                                :value="product.quantity"
                                :mutation="'NEW_ORDER_SET_QUANTITY_PRODUCT'"
                            />
                        </td>
                        <td class="text-right">
                            <Editable_Td 
                                :index="index" 
                                :value="product.discount | currency" 
                                :mutation="'NEW_ORDER_SET_DISCOUNT_PRODUCT'"
                            />
                        </td>
                        <td class="text-right">{{product.iva_import | currency}}</td>
                        <td class="text-right">{{product.total | currency}}</td>
                        <td class="text-center">
                            <DeleteRow :index="index" />
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import RowProduct from './RowProduct';
    import DeleteRow from './Row/DeleteRowButton';
    import Editable_Td from './Row/Editable-td';
    export default {

        components : {
            RowProduct,
            DeleteRow,
            Editable_Td,
        },

        data(){
           return {
               
           }
        },

        computed : {

            ...mapGetters([
                'ProductFromNewOrder'
            ])
        },
       
    }
</script>

<style scoped>
    thead th {
        padding : 1rem;
        position : sticky;
        top : 0;
        background-color : lightgray;
        color : black;
        z-index : 50;
    }
    .my--table {
        position : relative;
        width : 100%;
    }
    .scroll-y {
        height:20rem;
        overflow-y: auto;
    }
    tbody tr {
        height: 3rem;
    }
   
</style>