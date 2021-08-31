import collect from 'collect.js';
export default {

    state : {
        account_pay : 0,
        banks : [],
        orders_to_pay : [],
        invoices_to_pay : [],
        total_orders : 0,
        total_paid : 0,
        receipts : false,
        cancelation_documents_receipts : false,
        cancelation_documents : [
            {
                payment_type : null,
                bank : null,
                owner : null,
                number : null,
                expires : null,
                import : 0,
                date : null
            }
        ]
    },

    mutations : {

        RECEIPT_TO_PROVIDERS_SET_IMPORT_INVOICE_TO_PAY(state, payload)
        {

            if (state.orders_to_pay[payload.index_order].data.items[payload.index_invoice].voucher_id !== 3 && state.orders_to_pay[payload.index_order].data.items[payload.index_invoice].voucher_id !== 8 && state.orders_to_pay[payload.index_order].data.items[payload.index_invoice].voucher_id !== 11) {
                
                state.orders_to_pay[payload.index_order].data.items[payload.index_invoice].paid = payload.paid;
            }
            /* else{
                state.orders_to_pay[payload.index_order].data.items[payload.index_invoice].paid = 0;
            } */
            let total_paid = 0;
            let orders = collect(state.orders_to_pay);  
            orders.map(o => {
                collect(o.data.items).map(i => {
                    total_paid = total_paid +  i.paid;
                });
            });
            state.total_paid = total_paid;
        },

        RECEIPT_TO_PROVIDERS_SET_PAY(state, value)
        {
            state.invoices_to_pay;
        },

        RECEIPT_TO_PROVIDERS_SET_ORDERS(state, value)
        {
            state.orders_to_pay = value;
        },

        RECEIPT_TO_PROVIDERS_SET_RECEIPTS(state, value)
        {
            state.receipts = value;
        },

        /* RECEIPT_TO_PROVIDERS_SET_CANCELATION_DOCUMENTS(state, value)
        {
            state.cancelation_documents = value;
        }, */

        RECEIPT_TO_PROVIDERS_ADD_CANCELATION_DOCUMENT(state)
        {
            state.cancelation_documents.push(
                {
                    payment_type_id : null,
                    bank_id : null,
                    owner : null,
                    expires : null,
                    import : 0
                }
            );
        },

        SET_RECEIPT_TO_PROVIDER_PAYMENT_TYPE(state, value)
        {
            state.cancelation_documents[value.index].payment_type = value.payment_type
        },

        SET_RECEIPT_TO_PROVIDER_BANK(state, value)
        {
            state.cancelation_documents[value.index].bank = value.bank;
        },

        SET_RECEIPT_TO_PROVIDER_REMOVE_CANCELATION_DOCUMENT(state, index)
        {
            state.cancelation_documents.splice(index, 1);
        },

        SET_RECEIPT_TO_PROVIDER_CANCELATION_DOCUMENTS_DATE(state, value)
        {
            state.cancelation_documents[value.index].date = value.date
        },

        SET_RECEIPT_TO_PROVIDER_CANCELATION_DOCUMENTS_NUMBER(state, value)
        {
            state.cancelation_documents[value.index].number = value.number
        },

        SET_RECEIPT_TO_PROVIDER_CANCELATION_DOCUMENTS_OWNER(state, value)
        {
            state.cancelation_documents[value.index].owner = value.owner
        },

        SET_RECEIPT_TO_PROVIDER_CANCELATION_DOCUMENTS_IMPORT(state, value)
        {
            state.cancelation_documents[value.index].import = value.import

            let cancelation_documents = collect(state.cancelation_documents);

            let total_paid = cancelation_documents.sum('import');

            let orders = collect(state.orders_to_pay);           
            
            let creditos_importe = 0
            orders.map(o => {
                collect(o.data.items).map(i => {
                    if (!(i.voucher_id !== 3 && i.voucher_id !== 8 && i.voucher_id !== 11)) {
                        console.log('dentro del loop si son notas de credito');
                        console.log(i);
                        creditos_importe = creditos_importe + (i.total_raw *-1);
                    }
                });
            });

            //creditos_importe = creditos_importe *-1;
            
            creditos_importe = creditos_importe + total_paid;
            console.log('creditos_importe');
            console.log(creditos_importe);
            orders.map(o => {
                collect(o.data.items).map(invoice => {
                    if (invoice.voucher_id !== 3 && invoice.voucher_id !== 8 && invoice.voucher_id !== 11) {
                        
                        if (!(creditos_importe == 0)) {
                            
                            if (invoice.total_raw >= creditos_importe) {
                                invoice.paid = creditos_importe;
                                //creditos_importe = creditos_importe - invoice.total_raw;
                                creditos_importe = 0
                            }
                            if (invoice.total_raw < creditos_importe) {
                                invoice.paid = invoice.total_raw;
                                creditos_importe = creditos_importe - invoice.total_raw;
                            }
                        }
                        
                    }
                    console.log('creditos_importe dento del loop');
                    console.log(creditos_importe);
                });
            }); 

            if (creditos_importe > 0) {
                state.account_pay = creditos_importe;
            }
            console.log('creditos_importe antes de salir');
            console.log(creditos_importe);
        },

        SET_RECEIPT_TO_PROVIDER_CANCELATION_DOCUMENTS_RECEIPT(state, value)
        {
            state.cancelation_documents_receipts = value;
        },
        
        SET_RECEIPT_TO_PROVIDER_INITIAL_STATUS(state)
        {
            state = {
                banks : [],
                orders_to_pay : [],
                total_orders : 0,
                receipts : false,
                cancelation_documents_receipts : false,
                cancelation_documents : [
                    {
                        payment_type : null,
                        bank : null,
                        owner : null,
                        number : null,
                        expires : null,
                        import : 0,
                        date : null
                    }
                ]
            }
        },

    },

    actions : {

        async get_receipts_from_provider  ({commit}, payload) {

            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;
                
                let response = await axios.post('/api/provider/receipt/index', {
                    provider_id : payload.provider_id
                });
                
                commit('RECEIPT_TO_PROVIDERS_SET_RECEIPTS', response.data);

                return response;

            } catch (e) {
                console.log('error en get_purchase_invoice action');
                throw e;
            }
        },

        async receipt_provider_store({state, getters}, token){

            let cancelation_documents = collect(state.cancelation_documents);

            let total_paid = cancelation_documents.sum('import');

            try {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
                
                let response = await axios.post('/api/provider/receipt/store', {
                        //total_orders : total_orders,
                        total_orders : getters.ReceiptToProvidersTotalOrders,
                        total_paid : total_paid,
                        orders_to_pay : state.orders_to_pay, 
                        receipts : state.receipts, 
                        cancelation_documents : state.cancelation_documents,
                        cancelation_documents_receipts : state.cancelation_documents_receipts
                });
                
                //commit('RECEIPT_TO_PROVIDERS_SET_RECEIPTS', response.data);

                return response;

            } catch (e) {
                console.log('error en get_purchase_invoice action');
                throw e;
            }
        },

    }, 

    getters : {

        ReceiptToProvidersOrdersGetters(state)
        {
            return state.orders_to_pay
        },

        ReceiptToProvidersPendingReceiptsGetters(state)
        {
            return state.receipts;
        },

        ReceiptToProvidersCancelationDocumentsGetters(state)
        {
            return state.cancelation_documents;
        },

        ReceiptToProvidersPaymentTypeGetters : (state) => (index) => {
            return state.cancelation_documents[index].payment_type;
        },

        ReceiptToProvidersBankGetter : (state) => (index) => {
            return state.cancelation_documents[index].bank
        },

        ReceiptToProvidersBanksGetters(state)
        {
            return state.banks;
        },

        CanRemoveCancelationDocumentReceipToProvider(state)
        {
            let items = collect(state.cancelation_documents);

            if (items.count() > 1) {
                return true;
            }
            return false;
        },

        ReceiptToProvidersTotalOrders(state)
        {
            let receipts = 0;

            if (state.cancelation_documents_receipts) {
                
                receipts = collect(state.cancelation_documents_receipts).sum('value');

            }

            let orders = collect(state.orders_to_pay);

            let orders_total = orders.sum(o => {
                return o.data.total_raw;
            });

            return receipts + orders_total;
        },
        
        ReceiptToProvidersTotalVouchers(state)
        {
            let receipts = 0;

            if (state.cancelation_documents_receipts) {
                
                receipts = collect(state.cancelation_documents_receipts).sum('value');

            }

            let orders = collect(state.orders_to_pay);

            let debitos = 0;
            let creditos = 0;
            orders.map(o => {
                collect(o.data.items).map(invoice => {
                    if (invoice.voucher_id !== 3 && invoice.voucher_id !== 8 && invoice.voucher_id !== 11) {
                        debitos = debitos + invoice.total_raw;
                    }else{
                        creditos = creditos + invoice.total_raw;
                    }
                });
            });

            return {
                creditos : creditos,
                debitos : debitos
            }

        },

        ReceiptToProvidersTotal(state)
        {
            let cancelation_documents = collect(state.cancelation_documents);

            let total_paid = cancelation_documents.sum('import');

            return  total_paid;
        },

        ReceiptToProvidersInvoiceCountGetters(state)
        {
            let orders = collect(state.orders_to_pay);           
            let count = 0
            orders.map(o => {
                collect(o.data.items).map(i => {
                    if (i.voucher_id !== 3 && i.voucher_id !== 8 && i.voucher_id !== 11) {
                        count = count + 1;
                    }
                });
            });

            return count;
        },

        ReceiptToProvidersTotalPaid(state)
        {
            return state.total_paid;
        }

    }
}