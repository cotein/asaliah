import collect from 'collect.js'
export default {

    state : {
        errors : {}
    },

    mutations: {

        SET_PROVIDER_ERRORS(state, value)
        {
            state.errors = value;
        }
    },

    getters : {

        ProviderErrorNameGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('provider.name');
            }
            return false;
        },

        ProviderErrorRegimenGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('provider.regimen');
            }
            return false;
        },

        ProviderErrorNumberGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('provider.number');
            }
            return false;
        },

        ProviderErrorInscriptionGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('provider.inscription.id');
            }
            return false;
        },

        ProviderErrorPurchaseDocumentGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('provider.purchase_document.id');
            }
            return false;
        },

        ProviderErrorSubLevelAccountingAccountGetter(state)
        {
            if(! (state.errors == {}))
            {
                let errors = collect(state.errors);
                return errors.get('provider.sublevel_accounting_account.id');
            }
            return false;
        },
    }
}