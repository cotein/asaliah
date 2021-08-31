<template>
    <tbody>
        <tr>
            <td rowspan="2" class="text-center center--vertical">{{number + 1}}</td>
            <td>
                <div class="col-md-12">
                    <PurchaseInvoiceFindArticle :index="number" />
                </div>
                <div class="col-md-8 text-center">
                    <small>IVA</small>
                    <multiselect placeholder="Iva" 
                        id="iva"
                        track-by="name" label="name"
                        v-model="selecIva"
                        :options="GetIvas"
                        :searchable="false"
                        :internal-search="false" 
                        :clear-on-select="false" 
                        @select="selectedIva"
                        @remove="removeIva"
                        :disabled=" ! PurchaseInvoiceIsOk "
                        >
                    </multiselect>
                </div>
                <div class="col-md-4 text-center">
                    <small>Unidad de medida</small>
                    <p v-if="MeasureUnity"><strong>{{MeasureUnity}}</strong></p>
                </div>
            </td>
            
            <td rowspan="2" class="text-center center--vertical">
               <strong>{{total_import | currency}}</strong>
            </td>
            
            <td rowspan="2" class="text-center center--vertical">
                <button 
                    @click="removeArticleRow"
                    :disabled="! PurchaseInvoiceArticlesCount"
                    :class="{'btn btn-danger spinner spinner-inverse spinner-sm' : spinner_trash}" 
                    class="btn btn-outline-danger btn-icon sq-32">
                    <span class="icon icon-trash"></span>
                </button>
            </td>
        </tr>
        <tr>
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width:20%" class="text-center">
                            <small>P.Unitario</small>
                            <vue-autonumeric 
                                class="form-control text-right"
                                v-model="unit_price"
                                :options=money_options
                                :disabled=" ! PurchaseInvoiceIsOk "
                            ></vue-autonumeric>
                        </td>
                        <td style="width:20%" class="text-center">
                            <small>Cantidad</small>
                            <vue-autonumeric 
                                class="form-control text-right"
                                v-model="quantity"
                                :options=int_options
                                :disabled=" ! PurchaseInvoiceIsOk "
                            ></vue-autonumeric>
                        </td>
                        <td style="width:20%" class="text-center">
                            <small>Neto</small>
                            <vue-autonumeric 
                                class="form-control text-right"
                                v-model="neto_import"
                                :options=money_options
                                :disabled=" ! PurchaseInvoiceIsOk "
                            ></vue-autonumeric>
                        </td>
                        <td style="width:20%" class="text-center">
                            <small>Iva Importe</small>
                            <vue-autonumeric 
                                class="form-control text-right"
                                v-model="iva_import"
                                :options=money_options
                                :disabled=" ! PurchaseInvoiceIsOk "
                            ></vue-autonumeric>
                        </td>
                        <td style="width:20%" class="text-center">
                            <small>Desc. Importe</small>
                            <vue-autonumeric 
                                class="form-control text-right"
                                v-model="discount_import"
                                :options=money_options
                                :disabled=" ! PurchaseInvoiceIsOk "
                            ></vue-autonumeric>
                        </td>
                    </tr>
                </tbody>
            </table>
        </tr>
    </tbody>
</template>

<script>
import {mapGetters} from 'vuex';
import collect from 'collect.js';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
import sleep_mixin from './../../../../mixins/sleep-mixin';
import PurchaseInvoiceFindArticle from './PurchaseInvoiceFindArticle';
import VueAutonumeric from '../../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
export default {
    props : ['number'],
    components : {
        PurchaseInvoiceFindArticle, Multiselect, VueAutonumeric
    },
    mixins : [auth, sleep_mixin],    

    data() {
        return {
            article_is_selected : false,
            spinner_trash : false,
            selecIva : {
                /* code : 5,
                id : 6,
                name : "21%",
                percentage : 21 */
            },
            money_options : {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                currencySymbol: '$ ',
                currencySymbolPlacement: 'p',
                roundingMethod: 'U',
                minimumValue: '0',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
            int_options : {
                digitGroupSeparator: '.',
                decimalCharacter: ',',
                decimalCharacterAlternative: '.',
                decimalPlaces : '0',
                roundingMethod: 'U',
                minimumValue: '1',
                modifyValueOnWheel  : false,
                showOnlyNumbersOnFocus : true,
            },
        }
    },

    methods : {
       
        removeArticleRow(){
            this.spinner_trash = true;
            this.sleep(500)
            this.$store.commit('REMOVE_ARTICLE', this.number);
            this.spinner_trash = false;
        },

        selectedIva(e){
            console.log(e);
            this.$store.commit('PURCHASE_INVOICE_SET_IVA', {
                index : this.number,
                iva : e
            });
        },

        removeIva(e){
            this.$store.commit('PURCHASE_INVOICE_SET_IVA', {
                index : this.number,
                iva_id : null
            });
        },
        
    },

    computed : {

        ...mapGetters(
            [
                'GetIvas',
                'PurchaseInvoiceArticlesCount',
                'SelectedProviderGetter',
                'PurchaseInvoiceIsOk'
            ]
        ),

        ArticleIsSelected()
        {
            return this.$store.state.PurchaseInvoice.invoice.articles[this.number].article_is_selected;
        },

        MeasureUnity()
        {
            return this.$store.state.PurchaseInvoice.invoice.articles[this.number].measure_unity;
        },

        total_import :
        {
            get()
            {
                return this.$store.state.PurchaseInvoice.invoice.articles[this.number].total_import;
            }
        },

        unit_price :
        {
            get()
            {
                return this.$store.state.PurchaseInvoice.invoice.articles[this.number].unit_price;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_UNIT_PRICE', {index:this.number, unit_price : value});
            }
        },

        neto_import :
        {
            get()
            {
                return this.$store.state.PurchaseInvoice.invoice.articles[this.number].neto_import;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_NETO_IMPORT', {index:this.number, neto_import : value});
            }
        },

        quantity :
        {
            get()
            {
                return this.$store.state.PurchaseInvoice.invoice.articles[this.number].quantity;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_QUANTITY', {index:this.number, quantity : value});
            }
        },

        iva_import : {
            get(){
                return this.$store.state.PurchaseInvoice.invoice.articles[this.number].iva_import;
            },
            set(value){
                this.$store.commit('PURCHASE_INVOICE_SET_IVA_IMPORT', {
                    index : this.number,
                    iva_import : value
                });
            }
        },

        discount_import :
        {
            get()
            {
                return this.$store.state.PurchaseInvoice.invoice.articles[this.number].discount_import;
            },
            set(value)
            {
                this.$store.commit('PURCHASE_INVOICE_SET_DISCOUNT_IMPORT', {index:this.number, discount_import : value});
            }
        },
    }
}
</script>
<style  scoped>
    .center--vertical {
        vertical-align: middle;
    }
    .vue__autonumeric__input {
        font-size: 18px;
    }
    .multiselect .multiselect__select .multiselect__tags .multiselect__input
    {
    font-size:5px;
    }
</style>