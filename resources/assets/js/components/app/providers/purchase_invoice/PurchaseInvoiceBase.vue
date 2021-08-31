<template>
    <div >
        <div class="row">
            <div class="col-md-12">
                <div class="form form-horizontal">
                    <div class="form-group">
                        <div class="col-md-6" >
                            <ProviderFindByName />
                        </div>
                        <div class="col-md-3 pull-right" :class="{'has-error' : PurchaseInvoiceImputationDateErrorGetter}">
                            <label class="control-label">FECHA IMPUTACIÓN</label>
                            <datepicker
                                :language="es"
                                :value="GetPurchaseInvoiceImputationDate"
                                @input="setPurchaseInvoiceImputationDate"
                                input-class="my-input"
                                :format="customFormatter"
                            ></datepicker> 
                            <p class="text-danger" v-if="PurchaseInvoiceImputationDateErrorGetter">{{PurchaseInvoiceImputationDateErrorGetter[0]}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin-top">
            <MultiselectVouchers :spinner="voucher_spinner"/>
        </div>
        <div class="row margin-top">
            <MultiselectMoney :spinner="money_spinner" />
            <InvoiceDate />
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#article_modal" type="button">Agregar artículo</button> -->
            
        </div>
        <div class="row margin-top">
            <PurchaseInvoiceTable />
        </div>
    </div>
</template>

<script>
import {Event} from 'vue-tables-2';
import InvoiceDate from './Invoice-Date';
import Multiselect from 'vue-multiselect';
import Datepicker from 'vuejs-datepicker';
import {mapGetters, mapActions} from 'vuex';
import auth from './../../../../mixins/auth';
import {es} from 'vuejs-datepicker/dist/locale';
import MultiselectMoney from './Multiselect-Money';
import ProviderFindByName from './../ProviderFindByName';
import MultiselectVouchers from './Multiselect-Vouchers';
import PurchaseInvoiceTable from './PurchaseInvoiceTable';
import toast_mixin from './../../../../mixins/toast-mixin';
import open_article_mixin from './../../../../mixins/EventListenerOpenArticleModal-mixin';
export default {
    mixins : [auth, toast_mixin, open_article_mixin],
    components : {
        Multiselect, Datepicker, MultiselectVouchers, MultiselectMoney,
        InvoiceDate, PurchaseInvoiceTable, ProviderFindByName
    },
    data() {
        return {
            es:es,
            searching : false,
            cuit : null,
            money_spinner : true,
            voucher_spinner : true,
            money : null,
        }
    },

    methods : {

        ...mapActions([
            'setPurchaseInvoiceImputationDate'
        ]),

        customFormatter(date){
                return this.$moment(date).format("DD-MM-YYYY");
        },

        async getVouchers(){
            let vouchers = await this.$store.dispatch('getVouchers', this.User.token);
            this.$store.commit('SET_VOUCHERS', vouchers.data);
            this.voucher_spinner = false;
        },

        async getMoneys(){
            let moneys = await this.$store.dispatch('fetchMoney');
            this.$store.commit('ADD_MONEYS', moneys.data);
            this.money_spinner = false;
        },

    }, 
    
    computed : {
        ...mapGetters([
            'ProviderName',
            'GetMoneys',
            'Vouchers',
            'Provinces',
            'TaxesGetter',
            'GetPurchaseInvoiceImputationDate',
            'PurchaseInvoiceImputationDateErrorGetter'
        ]),

        DisabledDates(){
            return {
                to:  this.$moment(this.Today).toDate(),
                from: this.$moment(this.Today).add(15, 'days').toDate(), 
                days : [0]
            } 
        },
    },

    async mounted(){
        
        this.$moment.locale('es');

        await this.getVouchers();
        await this.getMoneys();
        await this.$store.dispatch('get_articles', this.User.token);
        await this.$store.dispatch('get_accounting_accounts', this.User.token);
        await this.$store.dispatch('getMeasureUnities', this.User.token);

        let tax_types = await this.$store.dispatch('get_tax_types', this.User.token);
        
        if (tax_types) {
            this.$store.commit('SET_TAX_TYPES', tax_types);
        }

        let taxes = await this.$store.dispatch('get_taxes', this.User.token);

        if (taxes) {
            this.$store.commit('SET_TAXES', taxes);

            taxes.forEach(element => {
                this.$store.commit('PURCHASE_INVOICE_ADD_TAX', element);
            });
        }

        this.$store.dispatch('fetchIvas');
    }
}
</script>

<style scoped>
    .margin-top{
        margin-top: 15px;
    }
</style>