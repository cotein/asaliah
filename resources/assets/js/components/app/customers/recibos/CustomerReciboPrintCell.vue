<template>
    <button @click="print" class="btn btn-default btn-icon sq-32" type="button">
        <span class="icon icon-print"></span>
    </button>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import auth from './../../../../mixins/auth';
    import currency from './../../../../mixins/currency';
    import ReciboBasePdf from './../../../../src/Pdf/Recibo/ReciboBasePdf';
    export default {
        
        props: ['data', 'index'],
        
        mixins : [auth, currency],

        data() {
            return {
                token : null
            }
        },

        methods : {

            zeroLeft (str, max) {
                str = str.toString();
                return str.length < max ? this.zeroLeft("0" + str, max) : str;
            },

            print(){
                
                let invoices = collect(this.data.invoices);
                
                let body_receipt_invoices = invoices.map((invoice, index) => {
                    
                    if (invoice.name != 'NOTAS DE CREDITO A' || invoice.name != 'NOTAS DE CREDITO B' || invoice.name != 'NOTAS DE CREDITO C') {
                        return [
                            index + 1,
                            (invoice.name) + ' ' + invoice.number,
                            invoice.date,
                            invoice.total
                        ]
                    }

                }).toArray();

                let receipt_invoices = {
                    headers : ['#', 'Número', 'Fecha', 'Importe'],
                    body : body_receipt_invoices,
                    total : this.CurrencyFormat(this.data.total_invoices_import),
                    startY : 10 * 9.2
                }

                let cancelations_documents = collect(this.data.cancelations_documents);
                let receipt_cancelation_documents = [];
                if (cancelations_documents.count() > 0) {
                    
                    let body_cancelation_documents = cancelations_documents.map((cd, index) => {
                        return [
                            index + 1,
                            (cd.type)?cd.type:'---',
                            (cd.bank)?cd.bank:'---',
                            (cd.number)?cd.number:'---',
                            (cd.import)?cd.import:'---',
                            (cd.owner)?cd.owner:'---',
                            (cd.date)?cd.date:'---',
                        ]
                    }).toArray();
                    
                    receipt_cancelation_documents = {
                        headers : ['#', 'Tipo', 'Banco', 'Número', 'Importe', 'Propietario', 'Expira'],
                        body : body_cancelation_documents,
                        total : this.CurrencyFormat(this.data.cancelation_documents_import),
                        startY : 10 * (9.2 + invoices.count() + 3 )
                    }
                }

                let data = {
                    diff_import : this.data.total_invoices_import - this.data.cancelation_documents_import,
                    receipt_invoices : receipt_invoices,
                    receipt_cancelation_documents : receipt_cancelation_documents,
                    number : 'N° 0001-'+ this.zeroLeft(this.data.number, 8),
                    company :  {
                        name : this.GetCompany.name,
                        address : this.GetCompany.address,
                        inscription : this.GetCompany.inscription,
                        cuit : this.GetCompany.number,
                        iibb : this.GetCompany.iibb_conv,
                        act : this.GetCompany.activity_init,
                    },
                    customer : {
                        name : this.data.customer,
                        address : this.data.customer_address,
                        inscription : this.data.customer_inscription,
                        cuit : this.data.customer_purchaser_document,
                        cuit_number : this.data.customer_purchaser_document_number,
                    },
                    logo : this.GetCompany.logo_base64
                }
                let p = new ReciboBasePdf;
                p.structure_scaffold(data);
                p.print(); 
            
            }
        },

        computed : {
            ...mapGetters([
                'GetCompany',
            ])
        },

        mounted() {

        },
       
    }
</script>