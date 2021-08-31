import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import InvoiceA from './../src/Pdf/Invoices/InvoiceA';
import InvoiceB from './../src/Pdf/Invoices/InvoiceB';
import InvoiceTransformer from './../src/Transformers/Afip/InvoiceTransformer'
import FECAEDetRequestTransformer from './../src/Transformers/Afip/WSFE/FECAEDetRequestTransformer';
import { collect } from 'collect.js';
import toast_mixin from './toast-mixin';
export default {
    mixins : [toast_mixin],
    data() {
        return {
            FECAEDetRequest : null,
            ImpTotal : 0,
            Tributos : '',
            ImpTrib : 0,
            spinner : false
        }
    },
    methods: {
        openModalError(){

            Event.$emit('show-modal-error');
        },

        tributos(BaseImp, Alic)
        {
            let tributos = collect([]);

            let tributo = {
                'Id' : '7',
                'Desc' : 'Percepción de IIBB',
                'BaseImp' : BaseImp,
                'Alic' : Alic,
                'Importe' : this.impTributo(BaseImp, Alic)
            }

            tributos.push(tributo);
            console.log(tributos.values().all());
            return tributos.values().all();
        },

        impTributo(BaseImp=0, Alic=0)
        {   
            let alicuota = Alic.replace(',', '.');

            return parseFloat((parseFloat(BaseImp) * parseFloat(alicuota)) / 100).toFixed(2);
        },

        async billGenerate(){
            this.spinner = true;
            let alicuota_percepcion = null;
            /////////////////////////////////////////////////
            /** PERCEPCION IIBB */
            this.ImpTotal = parseFloat(this.GrandTotal).toFixed(2);
            if(this.GetCompany.percep_iibb && this.ExistCustomer.addresses[0].state_id == 2 && (this.BillCbteTipo == '001' ||  this.BillCbteTipo == '011'))
            {
                console.log('dentro de perccep IIBB');
                let payload = {
                    token : this.User.token,
                    cuit : this.ExistCustomer.number
                }

                let percep_iibb = await this.$store.dispatch('getAlicuota', payload)
                .catch((err)=>{
                        this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                        return false;
                }).finally(()=>{
                    this.spinner = false;
                });
                
                if (percep_iibb) {
                    if (percep_iibb.hasOwnProperty('codigoError')) {
                        if (percep_iibb.codigoError == 11) {
                            this.error_message('La CUIT no esta inscripta, se aplicará el 8% adicional de IIBB', 'Código: '+percep_iibb.codigojeError, 4000); 
                            alicuota_percepcion = '8,0';
                        }
                    }else{
                        alicuota_percepcion = percep_iibb.contribuyentes.contribuyente.alicuotaPercepcion;
                    }
                }

                this.ImpTrib = this.impTributo(this.Neto, alicuota_percepcion);
                this.Tributos = this.tributos(this.Neto, alicuota_percepcion);
                this.ImpTotal = (parseFloat(this.GrandTotal) + parseFloat(this.impTributo(this.Neto, alicuota_percepcion))).toFixed(2);
                this.$store.commit('SET_PERCEP_IIBB', this.ImpTrib);
            }
            let impoTotConc=0

            if (this.BillCbteTipo == '001' || this.BillCbteTipo == '006' || this.BillCbteTipo == '011') {

                this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                    this.BillSale,
                    this.ImpTotal,
                    this.Neto,
                    this.IvaImport,
                    this.AlicIva,
                    this.BillCbteTipo,
                    this.GetCbtesAsoc,
                    impoTotConc,
                    this.ImpTrib,
                    this.Tributos
                    );
            }else{
                this.ImpTotal = this.TotalInvoices;
                if(this.GetCompany.percep_iibb && this.ExistCustomer.addresses[0].state_id == 2 && (this.BillCbteTipo == '002' || this.BillCbteTipo == '003'))
                {
                    console.log('dentro de perccep IIBB en notas de debito credito');
                    let payload = {
                        token : this.User.token,
                        cuit : this.ExistCustomer.number
                    }

                    let percep_iibb = await this.$store.dispatch('getAlicuota', payload)
                    .catch(err => {
                        this.error_message('Error en la comunicación', 'ARBA', 2500);
                    });
                    if (percep_iibb) {
                        if (percep_iibb.hasOwnProperty('codigoError')) {
                            if (percep_iibb.codigoError == 11) {
                                this.error_message('La CUIT no esta inscripta, se aplicará el 8% adicional de IIBB', 'Código: '+percep_iibb.codigojeError, 4000); 
                                alicuota_percepcion = '8,0';
                            }
                        }else{
                            alicuota_percepcion = percep_iibb.contribuyentes.contribuyente.alicuotaPercepcion;
                        }
                    }

                    let invoices = collect(this.GetInvoices);

                    let total_neto = invoices.sum(i => i.description.neto);
                    let total_iva = invoices.sum(i => i.description.iva);

                    console.log('total_neto');
                    console.log(total_neto);
                    console.log('total_neto');
                    this.ImpTrib = this.impTributo(total_neto, alicuota_percepcion);
                    this.Tributos = this.tributos(total_neto, alicuota_percepcion);
                    this.ImpTotal = (parseFloat(total_neto + total_iva) + parseFloat(this.impTributo(total_neto, alicuota_percepcion))).toFixed(2);
                    this.$store.commit('SET_PERCEP_IIBB', this.ImpTrib);
                }

                let alicIva = collect([]);

                if (this.TotalInvoicesAlicIva21) {
                    alicIva.push(this.TotalInvoicesAlicIva21);
                }

                if (this.TotalInvoicesAlicIva105) {
                    alicIva.push(this.TotalInvoicesAlicIva105);
                }
                let invoices = collect(this.GetInvoices);

                let total_neto = invoices.sum(i => i.description.neto);
                let total_iva = invoices.sum(i => i.description.iva);

                console.log('total_neto');
                console.log(total_neto);
                console.log('total_neto');
                console.log('total_iva');
                console.log(total_iva);
                console.log('total_iva');
                this.ImpTotal = (parseFloat(total_neto + total_iva)).toFixed(2);
                console.log(this.ImpTotal);
                
                this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                    this.BillSale,
                    this.ImpTotal,
                    this.TotalInvoicesNetoImport,
                    this.TotalInvoicesIvaImport,
                    alicIva.toArray(),
                    this.BillCbteTipo,
                    this.GetCbtesAsoc,
                    impoTotConc,
                    this.ImpTrib,
                    this.Tributos
                );
            }
            /*
            * //TODO :
            * 'PtoVta viene de Company mixin'
            * agregar json 'settings a la base'
            */
            
            let FeCabReq = {
                'CantReg'   : 1,
                'PtoVta'    : 6, 
                'CbteTipo'  : this.BillCbteTipo,
            }

            this.loading = true;
            
            let payload = {
                token : this.User.token,
                data : {
                    FECAEDetRequest : this.FECAEDetRequest,
                    FeCabReq : FeCabReq,
                    customer : this.ExistCustomer
                }
            }
            console.log('los datos que se envian a afip');
            console.log(payload);
            let afip_invoice = await this.$store.dispatch('billGenerate', payload).catch((err) => {
                console.log('billGenerate errorrrrrrrrrrrrrrrrrrrrrrrr');
                console.log('err.response.data bilgenerate');
                console.log(err.response.data);
                let e = JSON.parse(err.response.data);
                console.log(e);
                console.log('pppppppppppp');
                if (Array.isArray(err.response.data)) {
                    
                    this.error_message(err.response.data[0].Msg, 'Código: '+err.response.data[0].Code, 4000);
                }else{
                    this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                }
            }).finally(()=>{
                this.spinner = false;
            });

            if (afip_invoice) {
                let data = {
                    afip_invoice : afip_invoice,
                    percep_iibb : this.Tributos,
                    customer : this.ExistCustomer,
                    products : this.BillSale.products,
                    invoices : this.GetInvoices
                }
                
                this.$store.commit('SET_INVOICE', data);
                this.invoice_store();
            }
        },

        async invoice_store(){
            if (this.HasBillData) {
                let $vm = this;
                /**
                 * acá algún transformer
                 */
                let invoice = await $vm.$store.dispatch('invoice_store', $vm.User.token);

                //$vm.$store.commit('SET_INVOICE', invoice);
                if (invoice) {
                    
                    $vm.$toast.success('Generado correctamente', 'Comprobante de venta' , {
                        timeOut : 40000,
                        titleColor : 'black',
                        messageColor : 'black',
                        theme: 'dark',
                        icon: 'icon icon-check',
                        iconColor : 'black',
                        position: 'bottomRight',
                        progressBarColor: 'rgb(0, 255, 184)',
                        pauseOnHover : true,
                        buttons: [
                            ['<button><b>Imprimir</b></button>', function (instance, toast) {
                                
                                $vm.print_invoice();
                                
                                $vm.$store.commit('SET_INITIAL_PRODUCTS');

                                Event.$emit('delete_selected_product');

                                Event.$emit('update_billing_data');
                                
                                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    
                            }, true],
                        ],
                        onClosing: function(instance, toast, closedBy){
                            console.info('Closing | closedBy: ' + closedBy);
                        },
                        onClosed: function(instance, toast, closedBy){
                            console.info('Closed | closedBy: ' + closedBy);
                        }
                    });    
                }
            }
        },

        print_invoice(){
            let data = InvoiceTransformer.transformerData(this.GetInvoice.afip_invoice.FECAESolicitarResult);
            
            data.products = this.InvoiceProducts;
            
            data.customer = this.BillSale.customer;
            
            data.customer.inscription = this.ExistCustomer.inscription;
            
            data.bill_type = this.BillCbteTipo;
            
            data.ptoVta = this.GetInvoice.afip_invoice.FECAESolicitarResult.FeCabResp.PtoVta;
            
            data.cae_vto = this.$time(data.caeVto, 'DD-MM-YYYY').format("YYYYMMDD");

            data.invoices = this.GetInvoices;

            let totals = [];
            
            if (this.BillCbteTipo == '006' || this.BillCbteTipo == '011') {
                
                totals.push({
                    'name' : 'Subtotal',
                    'value' : this.Neto + this.Iva21 + this.Iva105
                });

                totals.push({
                    'name' : 'Total',
                    'value' : this.ImpTotal
                });

            }
            if (this.BillCbteTipo == '001') {

                totals.push({
                    'name' : 'Subtotal',
                    'value' : this.Neto
                });

                if (this.Iva21) {
                    totals.push({
                        'name' : 'Iva 21 %',
                        'value' : this.Iva21
                    });
                }
                if (this.Iva105) {
                    totals.push({
                        'name' : 'Iva 10,5 %',
                        'value' : this.Iva105
                    });
                }

                if (this.Tributos != '') {
                    totals.push({
                        'name' : this.Tributos[0].Desc + ' ' + this.Tributos[0].Alic + ' %',
                        'value' : this.Tributos[0].Importe
                    });
                }

                totals.push({
                    'name' : 'Total',
                    'value' : this.ImpTotal
                });
            }

            if (this.BillCbteTipo == '002' || this.BillCbteTipo == '003') {
                let neto = collect(data.invoices).sum((i => {
                    return i.description.neto;
                }));
                let iva = collect(data.invoices).sum((i => {
                    return i.description.iva;
                }))
                totals.push({
                    'name' : 'Subtotal',
                    'value' : neto
                });

                totals.push({
                    'name' : 'Iva 21 %',
                    'value' : iva
                });
                
                if (this.Tributos != '') {
                    totals.push({
                        'name' : this.Tributos[0].Desc + ' ' + this.Tributos[0].Alic + ' %',
                        'value' : this.Tributos[0].Importe
                    });
                }

                totals.push({
                    'name' : 'Total',
                    'value' : this.ImpTotal
                });
            }

            if (this.BillCbteTipo == '007' || this.BillCbteTipo == '008' || this.BillCbteTipo == '012' || this.BillCbteTipo == '013') {
                totals.push({
                    'name' : 'Total',
                    'value' : this.TotalInvoices
                });
            }

            data.totals = totals;
            
            data.company = this.GetCompany;

            console.log('##############  DATA PDF ##########');
            console.log(data);
            console.log('##############  DATA PDF ##########');
            data.obs = this.GetObs
            data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];

            if (this.BillCbteTipo == '001' || this.BillCbteTipo == '002' || this.BillCbteTipo == '003') {
                let pdf = new InvoiceA();
                pdf.structure_scaffold(data);
    
                this.$store.commit('SET_INITIAL_PRODUCTS');
                this.$store.commit('SET_INITIAL_INVOICES');
    
                pdf.print();
            }else{
                let pdf = new InvoiceB();
                pdf.structure_scaffold(data);
    
                this.$store.commit('SET_INITIAL_PRODUCTS');
                this.$store.commit('SET_INITIAL_INVOICES');
    
                pdf.print();
            }
           
        },
    },

    computed : {
        ...mapGetters([
            'InvoiceProducts',
            'Iva21',
            'Iva105',
            'GrandTotal',
            'Neto',
            //'AlicIva21',
            'BillSale',
            'IvaImport',
            'AlicIva',
            'isGeneralRegime',
            'BillCbteTipo',
            'ExistCustomer',
            'HasBillData',
            'BillType',
            'HasAddress',
            'MessageOk',
            'GetInvoice',
            'GetInvoices',
            'GetCbtesAsoc',
            'GetCompany',
            'TotalInvoices',
            'GetObs',
            'TotalInvoicesIva21',
            'TotalInvoicesIva105',
            'TotalInvoicesIvaImport',
            'TotalInvoicesNetoImport',
            'TotalInvoicesAlicIva21',
            'TotalInvoicesAlicIva105',
            'HasOneProduct',
            'PercepIIBB'
        ]),

        
    },



}