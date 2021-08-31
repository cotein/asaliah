<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <button 
                            @click="add_article"
                            type="button" 
                            class="btn btn-primary" 
                            >Agregar Artículo</button>
                    </div>
                    <strong>Detalle</strong>
                </div>
                <div class="card-body" data-toggle="match-height">
                    <table id="purchase_invoice_table" class="table table-striped table-bordered" style="margin-bottom:31px">
                        <thead>
                            <tr>
                                <th class="col-md-1 text-center">#</th>
                                <th class="col-md-8 text-center">Artículo</th>
                                <th class="col-md-2 text-center">Total</th>
                                <th class="col-md-1 text-center">Borrar</th>
                            </tr>
                        </thead>
                        <PurchaseInvoiceTableRow v-for="(row, index) in PurchaseInvoiceArticleGetter" :key="index" :number="index" />
                    </table>
                    <PurchaseInvoiceTaxes />
                    <div class="text-right">
                        <h3>Total compra: {{PurchaseInvoiceTotal | currency}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button 
                    @click="purchase_invoice_store"
                    :disabled=" ! PurchaseInvoiceIsOk "
                    class="btn btn-primary"
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
                    >Guardar comprobante de compras
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../../mixins/auth';
import PurchaseInvoiceTaxes from './PurchaseInvoiceTaxes';
import sleep_mixin from './../../../../mixins/sleep-mixin';
import toast_mixin from './../../../../mixins/toast-mixin';
import PurchaseInvoiceTableRow from './PurchaseInvoiceTableRow';
export default {
    
    mixins : [auth, toast_mixin, sleep_mixin],
    
    components : {
        PurchaseInvoiceTableRow,
        PurchaseInvoiceTaxes
    },

    data()
    {
        return {
            spinner : false
        }
    },

    computed : {
        ...mapGetters(
            [
               'PurchaseInvoiceArticleGetter',
               'PurchaseInvoiceTotal',
               'PurchaseInvoiceArticlesErrorGetter',
               'PurchaseInvoiceIsOk',
               'TaxesGetter'
            ]
        )
    },

    methods : {
        
        add_article()
        {
            this.$store.commit('PURCHASE_INVOICE_ADD_ARTICLE');
        },

        async purchase_invoice_store  () {
            this.$store.commit('SET_PURCHASE_INVOICE_ERRORS', {});
            this.spinner = true;
            this.sleep(500);
            let purchase_invoice = await this.$store.dispatch('purchase_invoice_store', this.User.token)
                .catch(error => {
                    this.$store.commit('SET_PURCHASE_INVOICE_ERRORS', error.response.data.errors);
                    this.error_message('No se pudo guardar el comprobante', 'Compras', 2500);
                    console.log(error.response.data.errors);
                    return false;
                }).finally(()=>this.spinner = false);

            if (purchase_invoice) {
                this.success_message('Guardado correctamente', 'Comprobante de compras', 3000)
                this.$store.commit('PURCHASE_INVOICE_SET_INITIAL_STATUS');
                this.TaxesGetter.forEach(element => {
                    this.$store.commit('PURCHASE_INVOICE_ADD_TAX', element);
                });

                this.$store.commit('SET_SELECTED_PROVIDER', {id:null, name:null});
                this.$store.commit('PURCHASE_INVOICE_SET_SUBSIDIARY', null);
                this.$store.commit('PURCHASE_INVOICE_SET_NUMBER', null);
            }
            
        }
    },

    watch : {

        PurchaseInvoiceTotal(n)
        {
            this.$store.commit('PURCHASE_INVOICE_SET_TOTAL', n);
        }
    }
       
}
</script>