const getters = {

    ProviderName(state)
    {
        return state.provider.name
    },

    ProviderInscriptionGetter(state)
    {
        return state.provider.inscription
    },

    ProviderPurchaseDocumentGetter(state)
    {
        return state.provider.purchase_document
    },

    ProviderAddressType(state)
    {
        return state.provider.address.type;
    },

    ProviderAddressProvince(state)
    {
        return state.provider.address.state;
    },

    ProviderAddressCity(state)
    {
        return state.provider.address.city;
    },

    ProviderAddressCp(state)
    {
        return state.provider.address.cp;
    },

    ProviderAddressAddress(state)
    {
        return state.provider.address.address;
    },

    ProviderAddressNumber(state)
    {
        return state.provider.address.number;
    },

    ProviderAddressBetween(state)
    {
        return state.provider.address.between;
    },

    ProviderAddressObs(state)
    {
        return state.provider.address.obs;
    },

    ProviderContactName(state)
    {
        return state.provider.contact.name;
    },

    ProviderContactEmail(state)
    {
        return state.provider.contact.email;
    },

    ProviderContactCellPhone(state)
    {
        return state.provider.contact.cell_phone;
    },

    ProviderContactPhone1(state)
    {
        return state.provider.contact.phone_1;
    },

    ProviderContactPhone2(state)
    {
        return state.provider.contact.phone_2;
    },

    ProviderContactPhone3(state)
    {
        return state.provider.contact.phone_3;
    },

    ProviderRegimen(state)
    {
        return state.provider.regimen;
    },

    ProviderStatus(state)
    {
        return state.provider.status;
    },

    ProviderTipoPersona(state)
    {
        return state.provider.tipo_persona;
    },

    ProviderTipoClave(state)
    {
        return state.provider.tipo_clave;
    },

    ProviderNumber(state)
    {
        return state.provider.number;
    },

    ProviderTaxGciasExempt(state)
    {
        return state.provider.taxes.gcias_exempt;
    },

    ProviderTaxIIBBExempt(state)
    {
        return state.provider.taxes.iibb_exempt;
    },

    ProviderTaxIvaExempt(state)
    {
        return state.provider.taxes.iva_exempt;
    },

    ProviderTaxSUSSExempt(state)
    {
        return state.provider.taxes.suss_exempt;
    },

    ProviderAccountingAccount(state)
    {
        return state.provider.accounting_account;
    },

    ProviderSubLevelAccountingAccount(state)
    {
        return state.provider.sublevel_accounting_account;
    },

    SelectedProviderGetter(state)
    {
        return state.selected_provider;
    },

    GetProvidersGetters(state)
    {
        return state.providers;
    }
}

export default getters;