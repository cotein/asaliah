<template>
    <div>
        <div>
            <div id="grid">
                <div class="item-grid1">
                    <MultiselectProduct :index="index"/>
                </div>
                <div class="item-grid9">
                    <MultiselectPriceList :index="index"/>
                </div>
                <div class="item-grid2">
                    <label>Código</label>
                </div>
                <div class="item-grid3">
                    <label class="form--label" for="unit-price-input">P. Unitario</label>
                    <input 
                        class="form--input" 
                        type="text" 
                        id="unit-price-input"
                        v-model="unit_price"
                        @focus="$event.target.select()"
                        @keyup="isCurrency($event)">
                    <p class="formulario__input-error"></p>
                </div>
                <div class="item-grid4">
                    <label class="form--label" for="quantity-input">Cantidad</label>
                    <input 
                        class="form--input" 
                        type="text" 
                        v-model="quantity"
                        id="quantity-input"
                        @focus="$event.target.select()"
                        @keyup="isNumber($event)">
                </div>
                <div class="item-grid5">
                    <MultiselectIva :index="index" />
                </div>
                <div class="item-grid6">
                    <label>Importe Iva</label>
                    <p>
                        {{IvaImport | currency}}
                    </p>
                </div>
                <div class="item-grid7">
                    <label class="form--label" for="discount-input">Descuento</label>
                    <input 
                        class="form--input" 
                        type="text" 
                        id="discount-input"
                        v-model="discount"
                        @focus="$event.target.select()"
                        @keyup="isNumber($event)">
                </div>
                <div class="item-grid8">
                    <label class="form--label" for="total-input">Total</label>
                    <input 
                        class="form--input" 
                        type="text" 
                        id="total-input"
                        v-model="total"
                        @focus="$event.target.select()"
                        @keyup="isNumber($event)">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import DeleteRow from './Row/DeleteRowButton';
import MultiselectIva from './Row/MultiselectIva';
import MultiselectProduct from './Row/MultiselectProduct';
import MultiselectPriceList from './Row/MultiselectPriceList';

export default {

    props : ['index'],

    components : {
        DeleteRow,
        MultiselectIva,
        MultiselectProduct,
        MultiselectPriceList
    },

    data() {
        return {
            expresions : {
                quantity : /^[0-9]+$/,
                currency : /^[0-9]+[,]{1}$/,
                
                format_currency : /^[+-]?[0-9]{1,3}(?:[0-9]*(?:[.,][0-9]{2})?|(?:,[0-9]{3})*(?:\.[0-9]{2})?|(?:\.[0-9]{3})*(?:,[0-9]{2})?)$/
            },
        }
    },

    methods: {

        isNumber(e) {
            let char = String.fromCharCode(e.keyCode);
            console.log(this.expresions.quantity.test(char), char);
            if (this.expresions.quantity.test(char)) return true;
            else e.preventDefault();
        },

        isCurrency(e) {
            let char = String.fromCharCode(e.keyCode);
            console.log(this.expresions.quantity.test(e.target.value), this.expresions.currency.test(e.target.value), e.target.value);
            if (this.expresions.quantity.test(e.target.value) || this.expresions.currency.test(e.target.value)) return true;
            else e.preventDefault();

        }
    },

    computed : {

        ...mapGetters([
            'NewOrderUnitPriceProductGetter',
            'NewOrderQuantityProductGetter',
            'NewOrderDiscountProductGetter',
            'NewOrderTotalProductGetter',
            'NewOrderIvaImportGetter'
        ]),

        IvaImport(){
            return this.NewOrderIvaImportGetter(this.index);
        },

        unit_price : {
            get(){
                return this.NewOrderUnitPriceProductGetter(this.index);
            },
            set(value){

                let payload = {
                    value : value,
                    index : this.index
                }

                this.$store.commit('NEW_ORDER_SET_UNIT_PRICE_PRODUCT', payload);
            }
        },

        quantity : {
            get(){
                return this.NewOrderQuantityProductGetter(this.index);
            },
            set(value){

                let payload = {
                    value : value,
                    index : this.index
                }

                this.$store.commit('NEW_ORDER_SET_QUANTITY_PRODUCT', payload);
            }
        },

        discount : {
            get(){
                return this.NewOrderDiscountProductGetter(this.index);
            },
            set(value){

                let payload = {
                    value : value,
                    index : this.index
                }

                this.$store.commit('NEW_ORDER_SET_DISCOUNT_PRODUCT', payload);
            }
        },

        total : {
            get(){
                return this.NewOrderTotalProductGetter(this.index);
            },
            set(value){

                let payload = {
                    value : value,
                    index : this.index
                }

                this.$store.commit('NEW_ORDER_SET_TOTAL_PRODUCT', payload);
            }
        },
    },

    mounted(){

        
    }
}
</script>
<style scoped>
    #grid {
        display: grid;
        gap: .1rem;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr;
    }
    div[class^="item-"]{
        margin: .3rem;
    }
    .item-grid1 {
        grid-column-start: 1;
        grid-column-end: 4;
    }
    .item-grid9 {
        grid-column-start: 4;
        grid-column-end: 6;
    }
    .item-grid5 {
        grid-column-start : 4;
        grid-column-end: 6;
    }
    .item-grid8 {
        grid-column-start : 3;
        grid-column-end: 6;
    }
    .index-number, .delete-button{
        text-align: center;
        font-size: 32px;
        vertical-align: middle;
    }
    .form--label{
        display : block;
        font-weight : 700;
        cursor : pointer;
    }
    .form--input{
        width: 100%;
        background-color: white;
        border: .2rem solid transparent;
        border-radius: .2rem;
        height: 3.6rem;
        line-height: 2rem;
        padding: .8rem;
        transition: .3s ease all;
    }
    .form--input:focus{
        border: .2rem solid #0077ff;
        outline: none;
        box-shadow: .2rem 0rem 2rem rgba(163, 163, 163, .5);
    }
</style>
