import collect from 'collect.js';

const getters = {

    HasSaleInvoice(state){

        if (state.invoice != null) {
            return true;
        }

        return false;
    },

    GetInvoice(state, getters){

        if (getters.HasSaleInvoice) {
            return state.invoice;
        }

        return false;
    },

    GetInvoices(state){
        
        if (state.invoices != null) {
            return state.invoices;
        }

        return false;
    },

    GetCbtesAsoc(state)
    {
        if (state.cbtesAsoc != []) {
            return state.cbtesAsoc;
        }

        return false;
    },

    TotalInvoices(state)
    {
        if (state.invoices[0].id != '') {
            
            let invoices = collect(state.invoices);

            return invoices.sum(i => parseFloat(i.description.total).toFixed(2));

            //return collect(state.invoices).sum('total_raw');
        } 
        

        return false;
    },

    TotalInvoicesIva21(state)
    {
        if (state.invoices[0].id != '') {
            
            let invoices = collect(state.invoices);

            return invoices.sum(i => {
                if (i.iva[0].iva_id == 6) {
                    return parseFloat(i.description.iva).toFixed(2);
                }
            });
        }
        return false;
    },

    TotalInvoicesIva105(state)
    {
         if (state.invoices[0].id != '') {
            
            let invoices = collect(state.invoices);

            return invoices.sum(i => {
                if (i.iva[0].iva_id == 5) {
                    return parseFloat(i.description.iva_import).toFixed(2);
                }
            });

        } 
        
        return false;
    },

    TotalInvoicesIvaImport(state, getters)
    {
        if (state.invoices[0].id != '') {
            
            let invoices = collect(state.invoices);

            return invoices.sum(i => {
                return parseFloat(i.description.iva).toFixed(2);
            });
        } 

        

        return 0;
    },

    TotalInvoicesNetoImport(state)
    {
        if (state.invoices[0].id != '') {
            
            let invoices = collect(state.invoices);

            return invoices.sum(i => {
                return parseFloat(i.description.neto).toFixed(2);
            });
        } 

        
        return 0;
    },

    TotalInvoicesAlicIva21(state){
            
        if (state.invoices[0].id != '') {
            let invoices = collect(state.invoices);

            let result = invoices.map(i => {
                if (i.iva[0].iva_id == 6) {
                    return i;
                }
            }).filter().collapse();

            console.log('################################################');
            console.log('################################################');
            console.log(result);
            console.log('################################################');
            console.log('################################################');
            if (result.count() > 0) {

                let BaseImp = collect(result).reduce((acc, item) => {
                    console.log('collapse');
                    console.log(item);
                    return acc + item.description.neto;
                });

                let Importe = collect(result).reduce((acc, item) => {
                    //return acc + item.iva_import;
                     return acc + item.description.iva;
                });
                /**
                * //TODO 'Corregir code de iva'
                */

                console.log('BaseImp, Importe');
                console.log(BaseImp, Importe);
                return {
                    Id : 5,
                    BaseImp : parseFloat(BaseImp).toFixed(2),
                    Importe : parseFloat(Importe).toFixed(2)
                }
            }

            return false;
            
        }
        return 0;
    },

    TotalInvoicesAlicIva105(state){
            
        if (state.invoices[0].id != '') {
            let invoices = collect(state.invoices);

            let result = invoices.map(i => {
                if (i.iva[0].iva_id == 5) {
                    return i;
                }
            }).filter().collapse();

            if (result.count() > 0) {
                let BaseImp = collect(result).reduce((acc, item) => {
                    return acc + item.description.neto;
                });

                let Importe = collect(result).reduce((acc, item) => {
                     return acc + item.description.iva;
                });
                /**
                * //TODO 'Corregir code de iva'
                */
                return {
                    Id : 5,
                    BaseImp : parseFloat(BaseImp).toFixed(2),
                    Importe : parseFloat(Importe).toFixed(2)
                }
            }

            return false;
        }
        return 0;
    },

    GetObs(state)
    {
        return state.obs;
    }
   
}

export default getters;