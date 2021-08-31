import collect from 'collect.js';

export default {

    state : {
        customer : null,
        receipt_date : null,
        invoices : [
            {
                id : null,
                number : null,
                date : null,
                total : null,
                saldo : null,
                status : null,
                cbte_tipo : null
            }
        ],
        cancelation_documents : [
            {
                type_id : null,
                bank_id : null,
                number : null,
                date : null,
                owner : null,
                total : null
            }
        ]

    },

    mutations : {

        CANCELATION_DOCUMENTS_SET_RECEIPT_DATE(state, value)
        {
            state.receipt_date = value;
        },
        
        CANCELATION_DOCUMENTS_SET_TYPE(state, data)
        {
            state.cancelation_documents[data.index].type_id = data.type_id;
        },

        CANCELATION_DOCUMENTS_SET_BANK(state, data)
        {
            state.cancelation_documents[data.index].bank_id = data.bank_id;
        },

        CANCELATION_DOCUMENTS_SET_NUMBER(state, data)
        {
            state.cancelation_documents[data.index].number = data.number;
        },

        CANCELATION_DOCUMENTS_SET_DATE(state, data)
        {
            state.cancelation_documents[data.index].date = data.date;
        },

        CANCELATION_DOCUMENTS_SET_OWNER(state, data)
        {
            state.cancelation_documents[data.index].owner = data.owner;
        },

        CANCELATION_DOCUMENTS_SET_TOTAL(state, data)
        {
            state.cancelation_documents[data.index].total = data.total;
        },

        CANCELATION_DOCUMENTS_REMOVE(state, index)
        {
            state.cancelation_documents.splice(index, 1);
        },

        CUSTOMER_RECIBO_SET_CUSTOMER(state, value)
        {
            state.customer = null;
            state.customer = value;
        },

        CUSTOMER_RECIBO_ADD_INVOICE(state)
        {
            state.invoices.push(
                {
                    id : null,
                    number : null,
                    date : null,
                    total : null,
                    saldo : null,
                    status : null,
                    cbte_tipo : null
                }
            )
        },

        CUSTOMER_RECIBO_ADD_CANCELATION(state)
        {
            state.cancelation_documents.push(
                {
                    type_id : null,
                    bank_id : null,
                    number : null,
                    date : null,
                    owner : null,
                    total : null
                }
            )
        },

        CUSTOMER_RECIBO_ADD_DATA_TO_INVOICE(state, data)
        {
            state.invoices[data.index].id = data.id;
            state.invoices[data.index].total = data.total_raw;
            state.invoices[data.index].cbte_tipo = data.cbte_tipo;
        },

        CUSTOMER_RECIBO_REMOVE_INVOICE(state, index)
        {
            state.invoices.splice(index, 1);
        }
        

    },

    actions : {

        async isSearching (context, data) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + data.token;
                
                let response = await axios.put('/api/sale_invoice/is_searching',
                {
                    invoice : data.invoice_id
                });

                return response

            } catch (e) {
                console.log('error en isSearching action');
                console.log(e);
            }
        },

        async receipt_store (context, token) {
            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/receipt/store',
                {
                    total_invoices_import : context.getters.TotalFromCustomerRecibos,
                    cancelation_documents_import : context.getters.TotalFromCancelationDocuments,
                    receipt_date : context.state.receipt_date,
                    customer : context.state.customer,
                    invoices : context.state.invoices,
                    cancelation_documents : context.state.cancelation_documents,
                });

                return response

            } catch (e) {
                console.log('error en isSearching action');
                console.log(e);
            }
        }
        
    },

    getters : {

        EnableCancelationDocument(state)
        {
            if (state.cancelation_documents[0].bank_id == null && 
                state.cancelation_documents[0].type_id == null &&
                state.cancelation_documents[0].number == null &&
                state.cancelation_documents[0].owner == null &&
                state.cancelation_documents[0].total == null) 
            {
                return true;
            }

            return false;

        },

        CanRemoveInvoice(state)
        {
            let invoices = collect(state.invoices);

            if (invoices.count() > 1) {
                return true;
            }
            return false;
        },

        CanRemoveCancelationDocument(state)
        {
            let cancelation_documents = collect(state.cancelation_documents);

            if (cancelation_documents.count() > 1) {
                return true;
            }
            return false;
        },

        GetCustomerFromCustomerRecibo(state)
        {
            return state.customer;
        },

        GetInvoicesFromCustomerRecibo(state)
        {
            return state.invoices;
        },

        GetCancelationsFromCustomerRecibo(state)
        {
            return state.cancelation_documents;
        },

        TotalFromCustomerRecibos(state)
        {
            if (state.invoices[0].total == null) {
                return 0;
            }

            let invoices = collect(state.invoices);

            return invoices.sum('total');
        },

        TotalFromCancelationDocuments(state)
        {
            if (state.cancelation_documents[0].total == null) {
                return 0;
            }

            let cancelation_documents = collect(state.cancelation_documents);

            return cancelation_documents.sum('total');

            /* return cancelation_documents.sum((i) => {
                if (i.total < 0) {
                    return i.total * -1;
                }
                return i.total
            }); */
        }

    }

}
