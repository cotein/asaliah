<template>
    <div class="center--vertical" :class="{'has-error' : PurchaseInvoiceArticlesErrorGetter}">
        <multiselect placeholder="Buscar producto" 
            id="find_article"
            track-by="name" label="name"
            :loading="show_spinner"
            v-model="selectedArticle"
            :options="articles"
            :searchable="true"
            :disabled=" ! PurchaseInvoiceIsOk "
            :internal-search="false" 
            :clear-on-select="false" 
            @search-change="asyncFind"
            @select="selectArticle"
            >
            <span slot="noOptions">
                    Lista Vacía
            </span>
            <span slot="noResult">
                    La búsqueda no arrojó resultados
            </span>
        </multiselect>
        <p class="text-danger" v-if="PurchaseInvoiceArticlesErrorGetter">{{PurchaseInvoiceArticlesErrorGetter[0]}}</p>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';
import auth from './../../../../mixins/auth';
export default {
    props : ['index'],
    components : {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            show_spinner : false,
            articles : [],
            selectedArticle : null
        }
    },

    computed : {
        ...mapGetters([
            'PurchaseInvoiceArticlesErrorGetter',
            'PurchaseInvoiceIsOk'
        ])
    },
    methods : {
        asyncFind (query) {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

            axios.post('/api/article/find_article_by_name', {
                name : query
            }).then((result) => {
                this.articles = result.data;
            }).catch((err) => {
                
            });
        },

        selectArticle(el){

            this.$store.commit('PURCHASE_INVOICE_SET_ARTICLE_IS_SELECTED', {index:this.index, value:true});
            let payload = {
                index:this.index, 
                value:el.id,
                name : el.name,
                accounting_account_id : el.accounting_account_id,
            }
            this.$store.commit('PURCHASE_INVOICE_SET_ID', payload);
            this.$store.commit('PURCHASE_INVOICE_SET_MEASURE_UNITY', {index:this.index, value:el.measure_unity});
        },
    },

}
</script>
<style  scoped>
    .center--vertical {
        vertical-align: middle;
    }
</style>