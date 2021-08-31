<template>
    <button 
        v-tooltip="'Anular comprobante, se generará una Nota de Crédito'"
        @click="bill_generate" 
        class="btn btn-default btn-icon sq-32" type="button"
        :disabled="(data.voucher_type == 3 || data.voucher_type == '003' || data.voucher_type == 8 || data.voucher_type == '008' || data.voucher_type == 13 || data.voucher_type == '013' || data.voucher_type == 94 || data.voucher_type == '94')"
        :class="{'btn btn-danger spinner spinner-inverse spinner-sm' : spinner}"
        >
        <span class="icon icon-trash"></span>
    </button>
</template>

<script>
import collect from 'collect.js';
import auth from './../../../../mixins/auth';
import InvoiceA from './../../../../src/Pdf/Invoices/InvoiceA';
import InvoiceB from './../../../../src/Pdf/Invoices/InvoiceB';
import sale_invoice from './../../../../mixins/sale_invoice';
import InvoiceTransformer from './../../../../src/Transformers/Afip/InvoiceTransformer';
import FECAEDetRequestTransformer from './../../../../src/Transformers/Afip/WSFE/FECAEDetRequestTransformer'
import {mapGetters} from 'vuex';
    export default {
        props: ['data', 'index'],
        mixins : [auth, sale_invoice],
        data() {
            return {
                spinner : false,
            }
        },

        methods : {

            async bill_generate()
            {
                if (this.data.hasOwnProperty('nota_credito')) {
                    console.log('SE REALIZARÁ UNA NOTA DE CREDITO');
                    
                    this.spinner = true;
                    
                    let payload = {
                        token : this.User.token,
                        CteTipo : Number(this.data.nota_credito.BillSale.bill_type)
                    }

                    let last = await this.$store.dispatch('ultimo_autorizado', payload)
                    .catch((err) => {
                        let e = JSON.parse(err.response.data);
                        this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
                        return false;
                    });
                    
                    console.log('last');
                    console.log(last);
                    console.log('last');

                    this.data.nota_credito.BillSale.bill_number = Number(last.CbteNro) + 1;
                    
                    this.data.nota_credito.BillSale.bill_date = this.$moment(Date.now()).format("YYYYMMDD");

                    this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                        this.data.nota_credito.BillSale,
                        this.data.nota_credito.ImpTotal,
                        this.data.nota_credito.Neto,
                        this.data.nota_credito.IvaImport,
                        collect(this.data.nota_credito.AlicIva).toArray(),
                        this.data.nota_credito.BillSale.bill_type,
                        collect(this.data.nota_credito.CbtesAsoc).toArray(),
                        this.data.nota_credito.impoTotConc,
                        this.data.nota_credito.ImpTrib,
                        this.data.nota_credito.Tributos
                    );

                   
                    collect(this.FECAEDetRequest.CbtesAsoc).map((comprobante) => {
                        comprobante.Cuit = this.GetCompany.cuit;
                    });

                    console.log('this.FECAEDetRequest');
                    console.log(this.FECAEDetRequest);
                    console.log('this.FECAEDetRequest');


                    let FeCabReq = {
                        'CantReg'   : 1,
                        'PtoVta'    : 6, 
                        'CbteTipo'  : this.data.nota_credito.BillSale.bill_type,
                    }

                    let payl = {
                        token : this.User.token,
                        data : {
                            FECAEDetRequest : this.FECAEDetRequest,
                            FeCabReq : FeCabReq,
                            customer : this.data.nota_credito.customer
                        }
                    }

                    console.log('los datos que se envian a afip');
                    console.log(payl);

                    //return false;
                    let afip_invoice = await this.$store.dispatch('billGenerate', payl).catch((err) => {
                        console.log('billGenerate errorrrrrrrrrrrrrrrrrrrrrrrr');
                        console.log(err.response.data);
                        let e = JSON.parse(err.response.data);
                        console.log(e);
                        if (Array.isArray(err.response.data)) {
                            
                            this.error_message(err.response.data[0].Msg, 'Código: '+err.response.data[0].Code, 4000);
                        }else{
                            this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                        }
                    }).finally(()=>{
                        this.spinner = false;
                    });

                    if (afip_invoice) {
                        let items = {};
                        items.quantity = this.data.nota_credito.text.quantity;
                        items.detail = this.data.nota_credito.text.detail;
                        items.ImpTotal = this.data.nota_credito.ImpTotal;
                        items.Neto = this.data.nota_credito.Neto;
                        items.IvaImport = this.data.nota_credito.IvaImport;
                        items.iva_id = this.data.nota_credito.iva_id;

                        let data = {
                            afip_invoice : afip_invoice,
                            percep_iibb : this.data.nota_credito.Tributos,
                            customer : this.data.nota_credito.customer,
                            products : items,
                            invoices : this.GetInvoices
                        }
                        
                        this.$store.commit('SET_INVOICE', data);
                        this.invoice_store();
                    }

                }else{
                    console.log('NO HAY DATOS PARA RALIZAR NOTAS DE CREDITO');
                }
            },

            print(){
                
                return new Promise(resolve => {

                    this.spinner = true;

                    let data = InvoiceTransformer.transformerData(this.data.print.afip_data.FECAESolicitarResult);
                
                    data.products = this.data.print.products;
                    
                    data.customer = this.data.print.customer;
                    
                    data.bill_type = this.data.print.bill_type;
                    
                    data.ptoVta = this.data.print.ptoVta;
                    
                    data.cae_vto = this.data.print.cae_vto;

                    data.totals = this.data.print.totals;
                    
                    data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                    
                    data.company = this.GetCompany
                    
                    
                    
                    setTimeout(()=>{

                        if (data.bill_type == 1 || data.bill_type == 2 || data.bill_type == 3) {
                            
                            let pdf = new InvoiceA();
                            pdf.structure_scaffold(data);
                            pdf.print();
                        }else{
                            //InvoiceB funciona para las facturas B y C
                            let pdf = new InvoiceB();
                            pdf.structure_scaffold(data);
                            pdf.print();
                        }

                        this.spinner = false;
                        resolve('resolved');
                    },1500);
                    
                });

            }
        },

        computed : {
            ...mapGetters([
                'GetCompany'
            ])
        },

        mounted() {
            console.log('partial cell print invoice');
           console.log(this.data);
        },
       
    }
</script>