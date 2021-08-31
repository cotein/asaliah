import { toCanvas } from "bwip-js";

const mutations = {

    PURCHASE_INVOICE_SET_INITIAL_STATUS(state)
    {
        let iva = null;
        let iva_id = null;
        if (state.invoice.type.inscription_id == 1) {
            iva = {
                code : 5,
                id : 6,
                name : "21%",
                percentage : 21
            }
            iva_id = 6;
        }else{
            iva = {
                code : 1,
                id : 2,
                name : "No Gravado",
                percentage : 0
            }
            iva_id = 2;
        }
        state.invoice.money = {
            code: "PES",
            description: "name",
            id: 1,
            name: "PESOS",
            symbol: "$",
        }
        state.invoice.articles = [
            {
                article_is_selected : false,
                id : null,
                name : null,
                accounting_account_id : null,
                unit_price : 0,
                measure_unity : null,
                neto_import : 0,
                quantity : 1,
                iva : iva,
                iva_id : iva_id,
                iva_import : 0,
                discount_import : 0,
                total_import : 0,
            }
        ];
        state.invoice.percep_iibb = 0;
        state.invoice.percep_iva = 0;
        state.invoice.taxes = [],
        state.invoice.total = 0;
    },

    PURCHASE_INVOICE_SET_PERCEP_IIBB (state, value) {
        state.invoice.percep_iibb = value;
    },

    PURCHASE_INVOICE_SET_PERCEP_IVA (state, value) {
        state.invoice.percep_iva = value;
    },

    PURCHASE_INVOICE_SET_INVOICE_TYPE (state, value) {
        state.invoice.type = value;
    },

    PURCHASE_INVOICE_SET_SUBSIDIARY(state, value)
    {
        state.invoice.subsidiary = value;
    },

    PURCHASE_INVOICE_SET_NUMBER(state, value)
    {
        state.invoice.number = value;
    },

    PURCHASE_INVOICE_SET_MONEY(state, value)
    {
        state.invoice.money = value;
    },

    PURCHASE_INVOICE_SET_ARTICLE_IS_SELECTED(state, payload)
    {
        state.invoice.articles[payload.index].article_is_selected = payload.value;
    },
    PURCHASE_INVOICE_SET_ID(state, payload)
    {
        state.invoice.articles[payload.index].id = payload.value;
        state.invoice.articles[payload.index].name = payload.name;
        state.invoice.articles[payload.index].accounting_account_id = payload.accounting_account_id;
    },
    PURCHASE_INVOICE_SET_UNIT_PRICE(state, payload)
    {
        state.invoice.articles[payload.index].unit_price = parseFloat(payload.unit_price);

        let neto = (state.invoice.articles[payload.index].unit_price * parseInt(state.invoice.articles[payload.index].quantity)) - parseFloat(state.invoice.articles[payload.index].discount_import);
        
        state.invoice.articles[payload.index].neto_import = neto;

        let iva_import = neto * state.invoice.articles[payload.index].iva.percentage / 100;
        
        state.invoice.articles[payload.index].iva_import = iva_import;

        state.invoice.articles[payload.index].total_import = neto + iva_import;

    },
    PURCHASE_INVOICE_SET_MEASURE_UNITY(state, payload)
    {
        state.invoice.articles[payload.index].measure_unity = payload.value;
    },
    PURCHASE_INVOICE_SET_QUANTITY(state, payload)
    {
        state.invoice.articles[payload.index].quantity = payload.quantity;
        let neto = (state.invoice.articles[payload.index].unit_price * parseInt(state.invoice.articles[payload.index].quantity)) - parseFloat(state.invoice.articles[payload.index].discount_import);
        state.invoice.articles[payload.index].neto_import = neto;
        let iva_import = neto * state.invoice.articles[payload.index].iva.percentage / 100;
        
        state.invoice.articles[payload.index].iva_import = iva_import;

        state.invoice.articles[payload.index].total_import = neto + iva_import;
        
    },
    PURCHASE_INVOICE_SET_DISCOUNT_IMPORT(state, payload)
    {
        state.invoice.articles[payload.index].discount_import = payload.discount_import;

        let neto = (state.invoice.articles[payload.index].unit_price * parseInt(state.invoice.articles[payload.index].quantity)) - parseFloat(state.invoice.articles[payload.index].discount_import);
        state.invoice.articles[payload.index].neto_import = neto;
        let iva_import = neto * state.invoice.articles[payload.index].iva.percentage / 100;
        
        state.invoice.articles[payload.index].iva_import = iva_import;

        state.invoice.articles[payload.index].total_import = neto + iva_import;
        
    },
    PURCHASE_INVOICE_SET_IVA(state, payload)
    {
        state.invoice.articles[payload.index].iva = payload.iva;
        state.invoice.articles[payload.index].iva_id = payload.iva.id;
    },
    PURCHASE_INVOICE_SET_IVA_IMPORT(state, payload)
    {
        state.invoice.articles[payload.index].iva_import = payload.iva_import;

        state.invoice.articles[payload.index].total_import = state.invoice.articles[payload.index].neto_import + state.invoice.articles[payload.index].iva_import;
    },
    PURCHASE_INVOICE_SET_NETO_IMPORT(state, payload)
    {
        state.invoice.articles[payload.index].neto_import = payload.neto_import;

        state.invoice.articles[payload.index].total_import = state.invoice.articles[payload.index].neto_import + state.invoice.articles[payload.index].iva_import;
    },

    PURCHASE_INVOICE_ADD_ARTICLE(state)
    {
        state.invoice.articles.push({
            id : null,
            unit_price : 0,
            measure_unity : null,
            neto_import : 0,
            quantity : 1,
            iva : {
                code : 5,
                id : 6,
                name : "21%",
                percentage : 21
            },
            iva_id : 6,
            iva_import : 0,
            discount_import : 0,
            total_import : 0,
        });
    },

    REMOVE_ARTICLE(state, index)
    {
        state.invoice.articles.splice(index, 1);
    },

    PURCHASE_INVOICE_SET_PROVIDER(state, value)
    {
        state.invoice.provider = value;
    },

    PURCHASE_INVOICE_SET_DATE(state, value)
    {
        state.invoice.date = value;
    },

    PURCHASE_INVOICE_SET_IMPUTATION_DATE(state, value)
    {
        state.invoice.imputation_date = value;
    },

    PURCHASE_INVOICE_SET_TOTAL(state, value)
    {
        state.invoice.total = value;
    },

    PURCHASE_INVOICE_DATE_IS_OK(state, value)
    {
        state.invoice.date_is_ok = value;
    },

    PURCHASE_INVOICE_SET_TAX_IMPORT(state, payload)
    {
        state.invoice.taxes[payload.index].id = payload.tax.id;
        state.invoice.taxes[payload.index].import = payload.import;
        state.invoice.taxes[payload.index].name = payload.tax.name;
    },

    PURCHASE_INVOICE_ADD_TAX(state, tax)
    {
        state.invoice.taxes.push(
            {
                id : tax.id,
                name : tax.name,
                state_id : tax.state_id,
                import : 0
            }
        );
    }
}

export default mutations;