<template>
    <div v-if="data.customer_inscription_id == 1 && data.customer_addresses[0].state_id == 2"
        style="margin:10px" class="pull-left">
        <button 
            class="btn btn-danger btn-xs"
            :class="{'btn btn-danger spinner spinner-inverse spinner-sm' : arba_spinner}" 
            @click="getAlicuota"
            type="button">
            Comprobar alícuota de IIBB
        </button>
        <button 
            @click="billGenerate()"
            class="btn btn-success btn-xs"
            :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}" 
            :disabled="data.status_id != 10"
            type="button" style="background-color:#006400">
            Facturar como consumidor final
        </button>
        <fade-transition>
            <div v-if="HasAlicuota" class="text-left">
                <span>
                    <strong>
                        {{HasAlicuota.contribuyentes.contribuyente.alicuotaPercepcion}} %
                    </strong>
                    X
                    <strong>{{data.total_raw | currency}}</strong>
                    =
                    <strong>{{HasAlicuota.contribuyentes.contribuyente.alicuotaPercepcion * data.total_raw / 100 | currency}} adicionales</strong>
                </span>
            </div>
        </fade-transition>
    </div>
</template>

<script>
//customer_inscription_id == 1 -> RI
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import auth from './../../../mixins/auth';
    import InvoicePdf from './../../../src/Pdf/Invoices/InvoicePdf';
    import toast_mixin from './../../../mixins/toast-mixin';
    import InvoiceTransformer from './../../../src/Transformers/Afip/InvoiceTransformer';
    import FECAEDetRequestTransformer from './../../../src/Transformers/Afip/WSFE/FECAEDetRequestTransformer';
    export default {
        props : ['data'],
        mixins : [auth, toast_mixin, toast_mixin],
        data(){
            return {
                arba_spinner : false,
                spinner : false,
                bill_type : 'F',
                cbte_tipo : '006',
                tributos_import : 0,
                array_tributos : [],
                cbtes_asociados : [],
                total_import : 0,
                FECAEDetRequest : null,
                impo_Tot_Conc : 0,
            }
        },

        computed : {

            ...mapGetters([
                'HasAlicuota',
                'HasAlicuotaError',
                'GetCompany'
            ]),
        },

        methods : {
            openModalError(){

                Event.$emit('show-modal-error');
            },
            cuitToDni(value)
            {
                let cuit = String(value);
                let dni = cuit.slice(2, -1);
                return parseInt(dni);

            },
            async getAlicuota()
            {
                let payload = {
                    token : this.User.token,
                    cuit : parseInt(this.data.customer_document_number)
                }
                this.arba_spinner = true;
                let alicuota = await this.$store.dispatch('getAlicuota', payload)
                    .catch((err)=>{
                    this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                }).finally(()=>{
                    this.arba_spinner = false;
                })

                console.log(alicuota);
                if (alicuota) {
                    if (alicuota.hasOwnProperty('codigoError')) {
                        if (alicuota.codigoError == 11) {
                            this.error_message('La CUIT ingresada no se encuentra en ningun padrón', 'Código: '+alicuota.codigojeError, 4000); 
                        }
                    }
                }
                
            },

            netoImport()
            {
                let products = collect(this.data.items);
                return products.sum('neto_import');
            },

            ivaImport()
            {
                let products = collect(this.data.items);
                return products.sum('iva_import');
            },

            alicIva(){

                let products = collect(this.data.items);
                
                return products.groupBy('iva_afip_code').map((iva) => {

                    let BaseImp = collect(iva).reduce((acc, item) => {
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

            async billGenerate()
            {
                this.spinner = true;
                this.total_import = (this.netoImport() + this.ivaImport() + parseFloat(this.tributos_import));
                 let payload_ultimo_autorizado = {
                    token : this.User.token,
                    CteTipo : this.cbte_tipo
                }

                let last = await this.$store.dispatch('ultimo_autorizado', payload_ultimo_autorizado).catch((err) => {
                    let e = JSON.parse(err.response.data);
                    this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
                }).finally(()=>{
                    this.spinner = false;
                });

                let data = {
                    customer : {
                        key_type : 'DNI',
                        id_number : this.cuitToDni(this.data.customer_document_number)
                    },
                    bill_number : last.CbteNro + 1,
                    bill_date : this.$moment().format("YYYYMMDD"),
                    bill_date_vto : this.$moment().add(10, 'days').format("YYYYMMDD")
                }
                this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                    data,
                    this.total_import,
                    this.netoImport(),
                    this.ivaImport(),
                    this.alicIva(),
                    this.cbte_tipo,
                    this.cbtes_asociados,
                    this.impo_Tot_Conc,
                    '',
                    ''
                    );
                
                let FeCabReq = {
                    'CantReg'   : 1,
                    'PtoVta'    : 6, 
                    'CbteTipo'  : this.cbte_tipo,
                }

                let payload_bill_generate = {
                    token : this.User.token,
                    data : {
                        FECAEDetRequest : this.FECAEDetRequest,
                        FeCabReq : FeCabReq,
                    }
                }
                let afip_invoice = await this.$store.dispatch('billGenerate', payload_bill_generate).catch((err) => {
                    let e = JSON.parse(err.response.data);
                    this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
                }).finally(()=>{
                    this.spinner = false;
                });
                if (afip_invoice) {
                    let data = {
                        afip_invoice : afip_invoice,
                        percep_iibb : null,
                        customer : this.data.customer_id,
                        products : this.data.items,
                        invoices : null,
                    }
                    // Se pasa el cuit real del cliente 
                    // para por que facturé con el dni
                    // y en la ddbb se guarda el CUIT
                    data.afip_invoice.cuit = this.data.customer_document_number
                    this.$store.commit('SET_INVOICE', data);
                    let invoice = await this.$store.dispatch('invoice_store', this.User.token);
                    this.invoice_print(afip_invoice);
                    
                    Event.$emit('cambiar_a_facturado');
                }
            },

            invoice_print(afip_invoice)
            {
                let data = InvoiceTransformer.transformerData(afip_invoice.FECAESolicitarResult);
                data.products = this.data.items;
                data.customer = {
                    name : this.data.customer,
                    address : this.data.delivery_address,
                    inscription : 'CONSUMIDOR FINAL',
                    id_number : this.cuitToDni(this.data.customer_document_number)
                }
                data.bill_type = this.cbte_tipo;
                data.ptoVta = afip_invoice.FECAESolicitarResult.FeCabResp.PtoVta;
                data.cae_vto = afip_invoice.FECAESolicitarResult.FeDetResp.FECAEDetResponse.CAEFchVto;
                let totals = [];
                

                if (this.cbte_tipo == '006') {
                    
                    let items = collect(this.data.items);
                    totals.push({
                        'name' : 'Subtotal',
                        'value' : parseFloat(items.sum('neto_import') + items.sum('iva_import'))
                    });

                    
                    totals.push({
                        'name' : 'Total',
                        'value' : parseFloat(items.sum('neto_import') + items.sum('iva_import'))
                    });

                }
                data.totals = totals;
                data.company = this.GetCompany;
                data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                
                let pdf = new InvoicePdf();
                pdf.structure_scaffold(data);

                pdf.print();
                
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>