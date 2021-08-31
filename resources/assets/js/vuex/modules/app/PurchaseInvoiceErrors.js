import collect from 'collect.js'
export default {

    state : {
        errors : {}
    },

    mutations: {

        SET_PURCHASE_INVOICE_ERRORS(state, value)
        {
            state.errors = value;
        }
    },

    getters : {

        PurchaseInvoiceProviderErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.provider.id');
            }
            return false;
        },

        PurchaseInvoiceDateErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.date');
            }
            return false;
        },

        PurchaseInvoiceImputationDateErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.imputation_date');
            }
            return false;
        },

        PurchaseInvoiceTypeErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.type.id');
            }
            return false;
        },

        PurchaseInvoiceSubsidiaryErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.subsidiary');
            }
            return false;
        },

        PurchaseInvoiceNumberErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.number');
            }
            return false;
        },

        PurchaseInvoiceMoneyErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.money.id');
            }
            return false;
        },

        PurchaseInvoiceArticlesErrorGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('invoice.articles');
            }
            return false;
        },
    }
}