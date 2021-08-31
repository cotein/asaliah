
const mutations = {

    SET_INVOICE(state, value){
        state.invoice = value;
    },

    ADD_INVOICE(state){
        state.invoices.push(
            {
                'id' : '',
                'cbte_tipo' : '',
                'pto_vta' : '',
                'nro' : '',
                'cuit' : '',
                'cbte_fch' : '',
                'name' : '',
                'total' : '',
                'total_raw' : '',
                'neto' : '',
                'iva' : '',
                'items' : '',
                'percep_iibb' : '',
                'percentage_percep_iibb' : '',
                'description' : {
                    'detail' : '',
                    'neto' : '',
                    'iva' : '',
                    'total' : '',
                }
            }
        )
    },

    SET_INVOICE_DATA(state, data){
        state.invoices[data.index].id = data.id;
        state.invoices[data.index].cbte_tipo = data.cbte_tipo;
        state.invoices[data.index].pto_vta = data.pto_vta;
        state.invoices[data.index].nro = data.nro;
        state.invoices[data.index].cuit = data.cuit;
        state.invoices[data.index].cbte_fch = data.cbte_fch;
        state.invoices[data.index].name = data.name;
        state.invoices[data.index].name_and_import = data.name_and_import;
        state.invoices[data.index].total = data.total;
        state.invoices[data.index].total_raw = data.total_raw;
        state.invoices[data.index].neto = data.neto;
        state.invoices[data.index].iva = data.iva;
        state.invoices[data.index].items = data.items;
        state.invoices[data.index].percep_iibb = data.percep_iibb;
        state.invoices[data.index].percentage_percep_iibb = data.percentage_percep_iibb;

        state.cbtesAsoc.push(
            {
                Tipo : data.cbte_tipo,
                PtoVta : data.pto_vta,
                Nro : data.nro,
                Cuit : data.cuit,
                CbteFch : data.cbte_fch
            }
        )
    },

    ADD_OBS(state, value){
        state.obs = value
    },

    DELETE_CBTE_ASOC(state, index)
    {
        state.cbtesAsoc.splice(index, 1);
    },

    DELETE_INVOICE(state, index){
        state.invoices.splice(index, 1);
    },

    /**
        * Estas mutations las utilizo para
        * las notas de crédito y débito
        */

    SET_INVOICE_DETAIL(state, data)
    {
        state.invoices[data.index].description.detail = data.detail;
    },

    SET_INVOICE_TOTAL(state, data)
    {
        console.log('dentro set invoice total');
        console.log(data);
        if (data.total == 0) {
            state.invoices[data.index].description.total = data.total;
            state.invoices[data.index].description.neto = data.total;
            state.invoices[data.index].description.iva = data.total;
        }else{
            let neto = parseFloat(data.total);
            let iva = parseFloat(neto * 21 / 100);
            state.invoices[data.index].description.iva_id = 6;
            state.invoices[data.index].description.neto = neto;
            state.invoices[data.index].description.iva = iva;
            state.invoices[data.index].description.total = data.total;
            /* if (state.invoices[data.index].iva[0].iva_id == 6) {
                let neto = data.total / 1.21;
                state.invoices[data.index].description.iva_id = 6;
                state.invoices[data.index].description.neto = parseFloat(neto);
                state.invoices[data.index].description.iva = parseFloat(data.total - neto); 
            }
            
            if (state.invoices[data.index].iva[0].iva_id == 5) {
                let neto = data.total / 1.105;
                state.invoices[data.index].description.iva_id = 5;
                state.invoices[data.index].description.neto = parseFloat(neto);
                state.invoices[data.index].description.iva = parseFloat(data.total - neto); 
            } */
        }
        
    },

    SET_INITIAL_INVOICES(state)
    {
        state.invoice = null;
        state.invoices = null;
        state.invoices = [
            {
                'id' : '',
                'cbte_tipo' : '',
                'pto_vta' : '',
                'nro' : '',
                'cuit' : '',
                'cbte_fch' : '',
                'name' : '',
                'neto' : '',
                'iva' : '',
                'total' : '',
                'total_raw' : '',
                'percep_iibb' : '',
                'percentage_percep_iibb' : '',
                'description' : {
                    'detail' : '',
                    'neto' : '',
                    'iva' : '',
                    'total' : '',
                }
            }
        ];
        state.cbtesAsoc = [];
    }
}

export default mutations;