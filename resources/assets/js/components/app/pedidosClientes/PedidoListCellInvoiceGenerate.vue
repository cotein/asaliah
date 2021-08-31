<template>
    <button 
        v-tooltip="'Generar comprobante de venta'"
        @click="billGenerate"
        class="btn btn-default btn-icon sq-32" 
        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
        type="button">
        <span class="icon icon-dollar"></span>
    </button>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import auth from './../../../mixins/auth';
    import InvoicePdf from './../../../src/Pdf/Invoices/InvoicePdf';
    import toast_mixin from './../../../mixins/toast-mixin';
    import InvoiceTransformer from './../../../src/Transformers/Afip/InvoiceTransformer';
    import FECAEDetRequestTransformer from './../../../src/Transformers/Afip/WSFE/FECAEDetRequestTransformer';
    export default {
        props: ['data', 'index'],

        mixins : [auth, toast_mixin],

        data() {
            return {
                spinner : false,
                FECAEDetRequest : null,
                ImpTrib : 0,
                Tributos : '',
                ImpTotal : 0
            }
        },

        methods : {

            async ultimo_autorizado()
            {
                let payload = {
                    token : this.User.token,
                    CteTipo : this.cbteTipo()
                }

                let ultimo_autorizado = await this.$store.dispatch('ultimo_autorizado', payload).catch((err) => {
                    let e = JSON.parse(err.response.data);
                    this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
                });
                
                return ultimo_autorizado;
            },

            cbteTipo()
            {
                if (this.GetCompany.inscription_id == 1 && this.data.customer_inscription_id == 1) {
                    return '001';
                }

                if (this.GetCompany.inscription_id == 1 && this.data.customer_inscription_id != 1) {
                    return '006';
                }

                if (this.GetCompany.inscription_id == 6 || this.data.customer_inscription_id  == 4) {
                    return '011';
                }
            },

            alicIva(){

                let products = collect(this.data.items);
                
                return products.groupBy('iva_afip_code').map((iva) => {

                    let BaseImp = collect(iva).reduce((acc, item) => {
                        console.log('baseIMP');
                        console.log(item);
                        return acc + parseFloat(item.neto_import)
                    });

                    let Importe = collect(iva).reduce((acc, item) => {
                        return acc + parseFloat(item.iva_import);
                    });

                    let Id = collect(iva).reduce((acc, item) => {
                        return item.iva_afip_code;
                    });

                    return {
                        Id : Id,
                        BaseImp : parseFloat(BaseImp).toFixed(2),
                        Importe : parseFloat(Importe).toFixed(2)
                    }
                    
                }).values().all()
                
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
                let cbteDesde = await this.ultimo_autorizado();

                let data = {
                    cbteDesde : cbteDesde,
                    bill_number : cbteDesde.CbteNro + 1,
                    bill_date : this.$time(Date.now()).format("YYYYMMDD"),
                    bill_date_vto : this.$time(Date.now()).add(30, 'days').format("YYYYMMDD"),
                    customer : 
                        {
                            key_type : this.data.customer_DocTipo,
                            id_number : this.data.customer_document_number,
                        }
                }
                this.ImpTotal = this.data.total_raw;
                let ImpNeto = collect(this.data.items).sum('neto_import');
                let ImpIva = collect(this.data.items).sum('iva_import');
                let AlicIva = this.alicIva();
                console.log('alicIVA');
                console.log(this.alicIva());
                let impoTotConc = 0;
                
                let alicuota_percepcion = null;
                /////////////////////////////////////////////////
                /** PERCEPCION IIBB */
                if(this.GetCompany.percep_iibb && (this.cbteTipo() == '001' || this.cbteTipo() == '011'))
                {
                    console.log('dentro de perccep IIBB');
                    let payload = {
                        token : this.User.token,
                        cuit : this.data.customer_document_number
                    }

                    let percep_iibb = await this.$store.dispatch('getAlicuota', payload)
                    .catch((err)=>{
                        this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                        return false;
                    }).finally(()=>{
                        this.spinner = false;
                    });
                    console.log(percep_iibb);
                    console.log('TRIBUTOS 11111');
                    console.log(this.ImpTrib);
                    console.log(this.Tributos);
                    alicuota_percepcion = percep_iibb.contribuyentes.contribuyente.alicuotaPercepcion;

                    this.ImpTrib = this.impTributo(ImpNeto, alicuota_percepcion);
                    this.Tributos = this.tributos(ImpNeto, alicuota_percepcion);
                    console.log('TRIBUTOS 222222');
                    console.log(this.ImpTrib);
                    console.log(this.Tributos);
                    this.ImpTotal = (parseFloat(this.ImpTotal) + parseFloat(this.impTributo(ImpNeto, alicuota_percepcion))).toFixed(2);
                    console.log('this.imptotal + imptaota');
                    console.log(this.ImpTotal);
                }
                console.log(alicuota_percepcion);
                console.log('//////////////////// CIERRA //////////');
                console.log('//////////////////// CIERRA //////////');
                console.log(data, this.ImpTotal, ImpNeto, ImpIva, AlicIva);
                if (this.cbteTipo() == '006' || this.cbteTipo() == '011') {
                    console.log('estoy en if');
                    this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                        data,
                        this.ImpTotal,
                        ImpNeto,
                        ImpIva,
                        AlicIva,
                        cbteDesde.CbteTipo,
                        [],
                        impoTotConc,
                        this.ImpTrib, 
                        this.Tributos
                        );
                }else{
                    this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                        data,
                        this.ImpTotal,
                        ImpNeto,
                        ImpIva,
                        AlicIva,
                        cbteDesde.CbteTipo,
                        [],
                        impoTotConc,
                        this.ImpTrib,
                        this.Tributos
                        );
                }
                console.log('FECAEDetRequest');
                console.log(this.FECAEDetRequest);

                
                let FeCabReq = {
                    'CantReg'   : 1,
                    'PtoVta'    : 6, 
                    'CbteTipo'  : this.cbteTipo(),
                }

                this.loading = true;
                
                let payload = {
                    token : this.User.token,
                    data : {
                        FECAEDetRequest : this.FECAEDetRequest,
                        FeCabReq : FeCabReq,
                    }
                }
                //////////////////////////
                /** GENERA EL COMPROBANTE */
                let afip_invoice = await this.$store.dispatch('billGenerate', payload)
                .catch((err) => {
                    let e = JSON.parse(err.response.data);
                    this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
                });
                console.log('factura generada');
                if (afip_invoice) {
                    console.log('dentro del if se generó el comprobante');
                    console.log(afip_invoice);
                    let data = {
                        afip_invoice : afip_invoice,
                        customer : this.data.customer_id,
                        products : this.data.items,
                        invoices : null
                    }
                    this.$store.commit('SET_INVOICE', data);
                    let invoice = await this.$store.dispatch('invoice_store', this.User.token);
                    this.success_message('Comprobante generado correctamente', 'Pedidos');
                }
                this.spinner = false;


                /////////////////////////////////
                /** IMPRIMIR COMPROBANTE */
                console.info('imprimir comprobante');
                let data_pdf = InvoiceTransformer.transformerData(afip_invoice.FECAESolicitarResult);
            
                data_pdf.products = this.data.items;
                
                data_pdf.customer = {
                    name : this.data.customer,
                    address : this.data.delivery_address,
                    inscription : this.data.customer_inscription_name,
                    id_number : this.data.customer_document_number
                }

                data_pdf.bill_type = this.cbteTipo();
                
                data_pdf.ptoVta = afip_invoice.FECAESolicitarResult.FeCabResp.PtoVta;
                
                data_pdf.cae_vto = afip_invoice.FECAESolicitarResult.FeDetResp.FECAEDetResponse.CAEFchVto

                let totals = [];
                
                if (this.cbteTipo() == '006' || this.cbteTipo() == '011') {
                    
                    totals.push({
                        'name' : 'Subtotal',
                        'value' : ImpNeto + ImpIva
                    });

                    totals.push({
                        'name' : 'Total',
                        'value' : this.ImpTotal
                    });

                }
                if (this.cbteTipo() == '001') {
                    const IVA21 = 5;
                    const IVA105 = 4;
                    collect(this.FECAEDetRequest.Iva).map((i => {

                        if (i.Id == IVA21) {
                            totals.push({
                                'name' : 'Subtotal 21 %',
                                'value' : i.BaseImp
                            });

                            totals.push({
                                'name' : 'Iva 21 %',
                                'value' : i.Importe
                            });
                        }

                        if (i.Id == IVA105) {
                            totals.push({
                                'name' : 'Subtotal 10,50 %',
                                'value' : i.BaseImp
                            });

                            totals.push({
                                'name' : 'Iva 10,5 %',
                                'value' : i.Importe
                            });
                        }
                    }));
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

                data_pdf.totals = totals;
                
                data_pdf.company = this.GetCompany;
                data_pdf.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                data_pdf.invoices = [];
                console.log('############## data_pdf ##########');
                console.log(data_pdf);
                console.log('############## data_pdf ##########');
                data_pdf.obs = []
            
                let pdf = new InvoicePdf();
                
                pdf.structure_scaffold(data_pdf);

                pdf.print();
            },
        },

        computed : {
            ...mapGetters([
                'GetCompany'
            ])
        },

        mounted() {

            
        },
       
    }
</script>