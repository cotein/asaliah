import collect from 'collect.js';

const getters = {

    BillCbteTipo(state){

        return state.sale.bill_type;
    },

    BillType(state){

        return state.sale.type;
    },

    BillSale(state){
        return state.sale;
    },

    HasAddress(state){

        if (state.sale.customer.address == null || state.sale.customer.address == "") {
            return false;
        }

        return true;
        
    },

    HasError(state){

        if (state.error != null) {
            return true;
        }

        return false;
    },

    PosiblesCities(state){

        const cities = collect(state.exist_customer.posibles_cities);

        if (cities.count() > 1) {
            return state.exist_customer.posibles_cities;
        }

        return false;

    },

    HasCities(state){
        
        if (state.exist_customer != null) {
            const cities = collect(state.exist_customer.posibles_cities);

            if (cities.count() > 1) {
                return true;
            }

            return false;
        }

        return false;
        
    },

    GetProductsFromInvoice(state)
    {
        return state.sale.products
    },

    InvoiceProducts(state){
        return collect(state.sale.products).toArray();
    },

    Neto(state){
        let products = collect(state.sale.products);

        return products.sum('neto_import');
    },

    Iva21(state){
        let products = collect(state.sale.products);

        let iva21 = products.filter((p)=> {
            if (p.iva_name == 21 || p.iva_name == '21') {
                return p;
            }
        })

        return iva21.sum('iva_import');
    },

    Iva105(state){

        let products = collect(state.sale.products);

        let iva105 = products.filter((p)=> {
            if (p.iva_name == 10.5 || p.iva_name == '10.5') {
                return p;
            }
        });

        return iva105.sum('iva_import');
    },

    IvaImport(state){

        let products = collect(state.sale.products);
        
        return products.sum('iva_import');

    },

    GrandTotal(state){
        
        let products = collect(state.sale.products);

        let neto = products.sum('neto_import');

        let iva = products.sum('iva_import');

        return neto + iva;
    },

    ExistCustomer(state){

        if (! state.exist_customer) {
            return false;
        }

        return state.exist_customer;
    },

    AlicIva(state){

        let products = collect(state.sale.products);
        
        return products.groupBy('iva').map((iva) => {

            let BaseImp = collect(iva).reduce((acc, item) => {
                return acc + item.neto_import;
            });

            let Importe = collect(iva).reduce((acc, item) => {
                return acc + item.iva_import;
            });
            /**
            * //TODO 'Corregir code de iva'
            */
            return {
                Id : (iva.all()[0].iva_name == 21) ? 5 : 4,
                BaseImp : BaseImp.toFixed(2),
                Importe : Importe.toFixed(2)
            }
            
        }).values().all()
        
    },

    isGeneralRegime(state, getters){

        if (getters.ExistCustomer.inscription_id == 1 ) {
            return true;
        }

        return false;
    },

    HasOneProduct(state)
    {
        let products = collect(state.sale.products);

        if (products.count() == 1) {
            return true;
        }

        return false;
    },

    PercepIIBB(state)
    {
        return state.sale.percep_iibb;
    }
   
}

export default getters;