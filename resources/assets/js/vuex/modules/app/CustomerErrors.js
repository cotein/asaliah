import collect from 'collect.js'
export default {

    state : {
        errors : {}
    },

    mutations: {

        SET_CUSTOMER_ERRORS(state, value)
        {
            state.errors = value;
        }
    },

    getters : {

        CustomerErrorNameGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('customer.name');
            }
            return false;
        },

        CustomerErrorRegimenGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('customer.regimen');
            }
            return false;
        },

        CustomerErrorNumberGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('customer.number');
            }
            return false;
        },

        CustomerErrorInscriptionGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('customer.inscription.id');
            }
            return false;
        },

        CustomerErrorPurchaseDocumentGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('customer.purchase_document.id');
            }
            return false;
        },

        CustomerErrorSubLevelAccountingAccountGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('customer.sublevel_accounting_account.id');
            }
            return false;
        },
    }
}