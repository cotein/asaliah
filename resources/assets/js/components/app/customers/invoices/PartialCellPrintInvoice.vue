<template>
    <div>
        <PartialCellDeleteInvoice :data="data"/>
        <button 
            v-tooltip="'Imprimir comprobante de Venta'"
            @click="print" 
            class="btn btn-default btn-icon sq-32" type="button"
            :class="{'btn btn-default spinner spinner-inverse spinner-sm' : print_spinner}"
            >
            <span class="icon icon-print"></span>
        </button>

    </div>
</template>

<script>
import InvoiceA from './../../../../src/Pdf/Invoices/InvoiceA';
import InvoiceB from './../../../../src/Pdf/Invoices/InvoiceB';
import PartialCellDeleteInvoice  from './PartialCellDeleteInvoice';
import InvoiceTransformer from './../../../../src/Transformers/Afip/InvoiceTransformer';
import {mapGetters} from 'vuex';
    export default {
        props: ['data', 'index'],
        components : {
            PartialCellDeleteInvoice
        },
        data() {
            return {
                token : null,
                print_spinner : false,
            }
        },

        methods : {
            print(){
                
                return new Promise(resolve => {

                    this.print_spinner = true;

                    let data = InvoiceTransformer.transformerData(this.data.print.afip_data.FECAESolicitarResult);

                    data.products = this.data.print.products;

                    data.voucher = this.data.print.voucher_name;
                    
                    data.invoice_letter = data.voucher.substr(data.voucher.length - 1)
                    
                    data.customer = this.data.print.customer;
                    
                    data.customer_purchaser_document = this.data.print.customer_purchaser_document

                    data.bill_type = this.data.print.bill_type;
                    
                    data.ptoVta = this.data.print.ptoVta;
                    
                    data.cbte_desde = this.data.print.cbte_desde;
                    
                    data.cae_vto = this.data.print.cae_vto;

                    data.totals = this.data.print.totals;
                    
                    data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                    
                    data.company = this.GetCompany

                    console.log('@@@@@@@@@@@@@@@@@@@@');
                            console.log('@@@@@@@@@@@@@@@@@@@@');
                            console.log('@@@@@@@@@@@@@@@@@@@@');
                            console.log(data);
                            console.log('@@@@@@@@@@@@@@@@@@@@');
                            console.log('@@@@@@@@@@@@@@@@@@@@');
                            console.log('@@@@@@@@@@@@@@@@@@@@');
                    setTimeout(()=>{

                        if (
                            data.bill_type == 1 || 
                            data.bill_type == 2 || 
                            data.bill_type == 3 ||
                            data.bill_type == 92 ||
                            data.bill_type == 93 ||
                            data.bill_type == 94
                            ) {
                            
                            let pdf = new InvoiceA();
                            pdf.structure_scaffold(data);
                            pdf.print();
                        }else{
                            //InvoiceB funciona para las facturas B y C
                            let pdf = new InvoiceB();
                            pdf.structure_scaffold(data);
                            pdf.print();
                        }


                        this.print_spinner = false;
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