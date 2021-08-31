import collect from 'collect.js';

const getters = {

    PurchaseInvoiceType(state)
    {
        return state.invoice.type;
    },

    PurchaseInvoiceSubsidiary(state)
    {
        return state.invoice.subsidiary;
    },

    PurchaseInvoiceNumber(state)
    {
        return state.invoice.number;
    },

    PurchaseInvoiceMoney(state)
    {
        return state.invoice.money;
    },

    PurchaseInvoiceArticleGetter(state)
    {
        return state.invoice.articles;
    },

    PurchaseInvoiceTaxes(state)
    {
        return state.invoice.taxes;
    },

    PurchaseInvoiceTotal(state)
    {
        let articles =  collect(state.invoice.articles);

        return articles.sum('neto_import') + articles.sum('iva_import') + collect(state.invoice.taxes).sum('import');
    },

    PurchaseInvoicePercepIIBB(state)
    {
        return state.invoice.percep_iibb;
    },

    PurchaseInvoicePercepIVA(state)
    {
        return state.invoice.percep_iva;
    },

    PurchaseInvoiceArticlesCount(state)
    {
        let articles =  collect(state.invoice.articles);

        if (articles.count() > 1) {
            return true;
        }
        return false;
    },

    GetPurchaseInvoiceDate(state)
    {
        return state.invoice.date;
    },

    GetPurchaseInvoiceImputationDate(state)
    {
        return state.invoice.imputation_date;
    },

    GetPurchaseInvoiceProvider(state)
    {
        return state.invoice.provider;
    },

    PurchaseInvoiceIsOk(state, getters)
    {
        if (getters.PurchaseInvoiceType && 
            getters.GetPurchaseInvoiceProvider &&
            getters.GetPurchaseInvoiceImputationDate &&
            getters.GetPurchaseInvoiceDate &&
            getters.PurchaseInvoiceSubsidiary &&
            getters.PurchaseInvoiceNumber &&
            getters.PurchaseInvoiceDateIsOk
            ) {
            return true;
        }
        return false;
    },

    PurchaseInvoiceDateIsOk(state)
    {
        return state.invoice.date_is_ok;
    }
}

export default getters;