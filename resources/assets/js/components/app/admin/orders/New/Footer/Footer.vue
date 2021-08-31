<template >
    <div class="footer">
        <div class="total-1">
            <p>
                Neto: 
            </p>
            <p>
              {{NewOrderTotalsNeto | currency}}
            </p>
        </div>
        <div class="total-2">
        <p>
                Iva: 
            </p>
            <p>
              {{NewOrderTotalsIvaImportGetter | currency}}
            </p>
        </div>        
        <div class="total-3">
        <p>
                Descuento: 
            </p>
            <p>
              {{NewOrderTotalsDiscountGetter | currency}}
            </p>
        </div> 
        <div class="total-4">
        <p>
                Total: 
            </p>
            <p>
              {{NewOrderTotalsTotalGetter | currency}}
            </p>
        </div>    
    </div>
</template>
<script>
import {mapGetters} from 'vuex';

export default {
    computed : {

        ...mapGetters([
            'NewOrderDataGetter',
            'NewOrderTotalsNeto',
            'NewOrderTotalsIvaImportGetter',
            'NewOrderTotalsDiscountGetter',
            'NewOrderTotalsTotalGetter'
        ])
    },

    watch : {
        NewOrderDataGetter : {
            handler: async function (val, oldVal) { 

                let neto = await this.$store.dispatch('calculeNetoAction');
                this.$store.commit('NEW_ORDER_SET_NETO', neto);

                let iva = await this.$store.dispatch('calculeIvaImportAction');
                this.$store.commit('NEW_ORDER_SET_IVA_IMPORT', iva);
                
                let discount = await this.$store.dispatch('calculeDiscountAction');
                this.$store.commit('NEW_ORDER_SET_DISCOUNT', discount);
                
                let total = await this.$store.dispatch('calculeTotalAction');
                this.$store.commit('NEW_ORDER_SET_TOTAL', total);
            },
            deep: true
        }
    }
}
</script>

<style scoped>
    .footer{
        display: flex;
        justify-content : space-around;
    }
    div[class*="total"]{
        background-color : white;
        display : flex;
        color : white;
        vertical-align : middle;

    }
    p {
        padding : 1rem;
        font-size : 2rem;
        font-weight: bold;
        color : black;
    }
</style>