<template>
<div >
    <div v-for="(button, index) in buttons" :key="index"
        
        v-tooltip="{content : tooltip_message(data, button.status_id, button.tooltip) }"
        style=" float: left"
    >
        <button 
            :data-status="button.status_id"
            @click="button.method"
            class="btn btn-icon sq-32" 
            :disabled="enable_button(button.status_id, status_pedido_cliente) || has_address_or_has_delivery_date(button.status_id, data)"
            :class="[(data.status_id >= button.status_id) ? 'color-pink' : 'btn-default', (spinner && status_number_button == button.status_id) ? 'btn btn-primary spinner spinner-inverse spinner-sm' : '']"
            type="button"
            style="margin-bottom:15px">
            <span :class="'icon icon-' + button.icon" :data-status="button.status_id"></span>
        </button>
    </div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import auth from './../../../mixins/auth';
    import sleep from './../../../mixins/sleep-mixin';
    import toast_mixin from './../../../mixins/toast-mixin';
    import * as constants from './../../../src/const/Status';
    import InvoiceA from './../../../src/Pdf/Invoices/InvoiceA';
    import InvoiceB from './../../../src/Pdf/Invoices/InvoiceB';
    import PedidoClienteTipoPersona from './PedidoClienteTipoPersona';
    import PedidoClientePdf from './../../../src/Pdf/PedidoClientePdf';
    import InvoiceTransformer from './../../../src/Transformers/Afip/InvoiceTransformer';
    import FECAEDetRequestTransformer from './../../../src/Transformers/Afip/WSFE/FECAEDetRequestTransformer';
    import CustomerSearchAfipData from './../../app/customers/CustomerSearchAfipData';

    export default {
        props: ['data'],
        components:{
            CustomerSearchAfipData, PedidoClienteTipoPersona
        },
        mixins : [auth, toast_mixin, sleep],
        data() {
            return {
                spinner : null,
                status_pedido_cliente : null,
                bill_type : 'F',
                cbte_tipo : null,
                tributos_import : 0,
                array_tributos : [],
                total_import : 0,
                FECAEDetRequest : null,
                cbtes_asociados : [],
                impo_Tot_Conc : 0,
                buttons : [
                    {
                        status_id : constants.PRIMER_CONTACTO,
                        tooltip : 'Primer contacto',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'volume-control-phone',
                    },
                    {
                        status_id : constants.LISTADO,
                        tooltip : 'Pedido listo',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'thumbs-o-up',
                    },
                    {
                        status_id : constants.REMITIDO,
                        tooltip : 'Generar remito',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'file-text',
                    },
                    {
                        status_id : constants.FACTURADO,
                        tooltip : 'Facturar',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'dollar',
                    },
                    {
                        status_id : constants.EN_PRODUCCION,
                        tooltip : 'Producir',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'gears',
                    },
                    {
                        status_id : constants.EN_STOCK,
                        tooltip : 'En Stock',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'stack-exchange',
                    },
                    {
                        status_id : constants.CROSS_OVER,
                        tooltip : 'Cross Over',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'building',
                    },
                    {
                        status_id : constants.DESPACHADO,
                        tooltip : 'Despachado',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'truck',
                    },
                    {
                        status_id : constants.ENTREGADO,
                        tooltip : 'Entregado',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'check',
                    },
                    {
                        status_id : constants.REPORTADO,
                        tooltip : 'Reportado',
                        click : 'una función',
                        method : this.set_pedidocliente_data,
                        class : 'btn btn-default btn-icon sq-32',
                        icon : 'gift',
                    },
                ]
            }
        },

        methods : {

            tooltip_message(data, status, default_message)
            {
                if (status && !data.pedido_fiscal_address && !data.pedido_delivery_address && !data.has_delivery_date) {
                    return default_message + ' - Falta definir: Domicilio Fiscal - Domicilio de Entrega - Fecha de Entrega';
                }
                if (status && !data.pedido_fiscal_address && !data.pedido_delivery_address && data.has_delivery_date) {
                    return default_message + ' - Falta definir: Domicilio Fiscal - Domicilio de Entrega';
                }
                if (status && !data.pedido_fiscal_address && data.pedido_delivery_address && !data.has_delivery_date) {
                    return default_message + ' - Falta definir: Domicilio Fiscal - Fecha de Entrega';
                }
                if (status && data.pedido_fiscal_address && !data.pedido_delivery_address && !data.has_delivery_date) {
                    return default_message + ' - Falta definir: Domicilio de Entrega - Fecha de Entrega'; 
                }
                if (status && data.pedido_fiscal_address && data.pedido_delivery_address && data.has_delivery_date) {
                    return default_message; 
                }
                
            },

            openModalError(){

                Event.$emit('show-modal-error');
            },
            netoImport()
            {
                /* let products = collect(this.data.items);
                return products.sum('neto_import'); */
                return collect(this.data.items).map((i) => {
                    return i.neto_import;
                }).sum();
            },

            ivaImport()
            {
                /* let products = collect(this.data.items);
                return products.sum('iva_import'); */

                return collect(this.data.items).map((i) => {
                    return i.iva_import;
                }).sum();
            },

            arrayTributos(BaseImp, Alic)
            {
                let tributos = collect([]);

                let tributo = {
                    'Id' : '7',
                    'Desc' : 'Percepción de IIBB',
                    'BaseImp' : BaseImp,
                    'Alic' : Alic,
                    'Importe' : this.impTributos(BaseImp, Alic)
                }

                tributos.push(tributo);
                console.log('array tributos');
                console.log(tributos.values().all());
                return tributos.values().all();
            },

            impTributos(BaseImp=0, Alic=0)
            {   
                let alicuota = Alic.replace(',', '.');

                return parseFloat((parseFloat(BaseImp) * parseFloat(alicuota)) / 100).toFixed(2);
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

            async set_pedidocliente_data($event)
            {
                let payload = {
                    id : this.data.id,
                    code : this.data.code,
                    status : $event.target.dataset.status
                }

                this.status_number_button = $event.target.dataset.status
                this.$store.commit('SET_PEDIDO_CODE', payload);

                this.spinner = true;
                
                    if ($event.target.dataset.status == constants.PRIMER_CONTACTO) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }

                    }
                    if ($event.target.dataset.status == constants.LISTADO) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }

                    }

                    if ($event.target.dataset.status == constants.REMITIDO) {
                        this.remito_print();
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }

                    }
                    if ($event.target.dataset.status == constants.EN_PRODUCCION) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }
                    }
                    if ($event.target.dataset.status == constants.EN_STOCK) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }
                    }
                    if ($event.target.dataset.status == constants.CROSS_OVER) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }
                    }
                    if ($event.target.dataset.status == constants.DESPACHADO) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }
                    }
                    if ($event.target.dataset.status == constants.ENTREGADO) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }
                    }
                    if ($event.target.dataset.status == constants.REPORTADO) {
                        let pedido = await this.$store.dispatch('status_update', this.User.token);
                        if (pedido) {
                            
                            this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                            Vue.set(this.data, 'status_id', pedido.data.status_id);
                            this.status_pedido_cliente = pedido.data.status_id;
                            Event.$emit('pedido_cliente_list', pedido.data);
                        }
                    }
                    if ($event.target.dataset.status == constants.FACTURADO) {
                        this.cbteTipo();
                        if(this.GetCompany.percep_iibb && this.data.customer_addresses[0].state_id == 2 && (this.cbte_tipo == '001' || this.cbte_tipo == '011'))
                        {
                            let alicuota_percepcion = 0;
                            console.log('dentro de perccep IIBB');
                            let payload_alicuota_iibb = {
                                token : this.User.token,
                                cuit : this.data.customer_document_number
                            }

                            let percep_iibb = await this.$store.dispatch('getAlicuota', payload_alicuota_iibb).catch((err)=>{
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
                            this.tributos_import = this.impTributos(this.netoImport(), alicuota_percepcion);
                            this.array_tributos = this.arrayTributos(this.netoImport(), alicuota_percepcion);
                        }
                        
                        this.total_import = (this.netoImport() + this.ivaImport() + parseFloat(this.tributos_import));

                        let payload_ultimo_autorizado = {
                            token : this.User.token,
                            CteTipo : this.cbte_tipo
                        }

                        let last = await this.$store.dispatch('ultimo_autorizado', payload_ultimo_autorizado).catch((err) => {
                            console.log('PedidoListStatusCEll ultimo_autorizado ' + err);
                            let e = JSON.parse(err.response.data);
                            if (Array.isArray(e)) {
                                this.error_message(e[0].Msg, 'Código: '+e[0].Code, 4000);
                            }else{
                                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                            }
                        }).finally(()=>{
                            this.spinner = false;
                        });

                        let data = {
                            customer : {
                                key_type : this.data.customer_DocTipo,
                                id_number : this.data.customer_document_number
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
                            (this.tributos_import == 0) ? '' : this.tributos_import,
                            (this.tributos_import == 0) ? '' : this.array_tributos
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

                        console.log('"########################################"');
                        console.log('"########################################"');
                        console.log('"########################################"');
                        console.log(payload_bill_generate);
                        console.log('"########################################"');
                        console.log('"########################################"');
                        console.log('"########################################"');

                        let afip_invoice = await this.$store.dispatch('billGenerate', payload_bill_generate).catch((err) => {
                            console.log('billGenerate errorrrrrrrrrrrrrrrrrrrrrrrr');
                            console.log('err.response.data bilgenerate');
                            console.log(err.response.data);
                            let e = JSON.parse(err.response.data);
                            console.log(e);
                            console.log('pppppppppppp');
                            if (Array.isArray(e)) {
                                
                                this.error_message(e[0].Msg, 'Código: '+e[0].Code, 4000);
                            }else{
                                this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                            }
                        }).finally(()=>{
                            this.spinner = false;
                        });
                        
                        if (afip_invoice) {
                            console.log('afip_invoice');
                            let data = {
                                afip_invoice : afip_invoice,
                                percep_iibb : this.array_tributos,
                                customer : this.data.customer_id,
                                products : this.data.items,
                                invoices : null
                            }
                            this.$store.commit('SET_INVOICE', data);
                            this.sleep(250);
                            let invoice = await this.$store.dispatch('invoice_store', this.User.token);
                            console.log(afip_invoice);
                            this.invoice_print(afip_invoice);

                            let pedido = await this.$store.dispatch('status_update', this.User.token);
                            if (pedido) {
                                this.success_message('Actualizado', 'El estado del pedido ahora es ' + pedido.data.status);
                                Vue.set(this.data, 'status_id', pedido.data.status_id);
                                this.status_pedido_cliente = pedido.data.status_id;
                                Event.$emit('pedido_cliente_list', pedido.data);
                            }
                        }
                        
                    }
                    
                this.spinner = false;
            },

            enable_button(button_status_id, status_pedido_cliente)
            {
                if (button_status_id == 8  && status_pedido_cliente == 6) {
                    return false;
                }

                let resto = button_status_id - status_pedido_cliente;

                if ( resto == 1 ) {
                    return false;
                }

                return true;
            },

            has_address_or_has_delivery_date(button_status_id, data)
            {
                if ((!(data.pedido_fiscal_address || data.pedido_delivery_address) && button_status_id > constants.PRIMER_CONTACTO ) || (!data.has_delivery_date && button_status_id > constants.PRIMER_CONTACTO)) {
                    return true;
                }

                return false;
            },
            
            zeroLeft (str, max) {
                str = str.toString();
                return str.length < max ? this.zeroLeft("0" + str, max) : str;
            },

            cbteTipo(){
            
                if (this.GetCompany.inscription_id == 1 && this.data.customer_inscription_id == 1) {
                    switch (this.bill_type) {
                        case 'F':
                            this.cbte_tipo = '001';
                            break;
                    }
                }

                if (this.GetCompany.inscription_id == 1 && this.data.customer_inscription_id != 1) {
                    switch (this.bill_type) {
                        case 'F':
                            this.cbte_tipo = '006';                
                            break;
                    }              
                }

                if (this.GetCompany.inscription_id == 6 || this.GetCompany.inscription_id == 4) {
                    switch (this.bill_type) {
                        case 'F':
                            this.cbte_tipo = '011';                
                            break;
                    }
                }
            },

            remito_print()
            {
                if (! this.data.delivery_address) {
                    this.data.delivery_address = this.$store.state.pedidos_clientes.pedido.delivery_address.name;
                }

                if (this.PedidoClientesAddNewAddressGetter) {
                    this.data.delivery_address = this.PedidoClientesAddNewAddressGetter.name;
                }
                
                this.data.print_comments = this.GetPrintComments;
                this.data.delivery_address = this.PedidosClientesDeliveryAddressGetter;
                this.data.company = this.GetCompany;
                this.data.voucher = 'REMITO';
                this.data.voucher_number = 'N° 0001-' + this.zeroLeft(this.data.id,8);
                this.data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                let pdf = new PedidoClientePdf();
                console.log(this.data);
                pdf.structure_scaffold(this.data);
                pdf.print();
            },

            invoice_print(afip_invoice)
            {
                let data = InvoiceTransformer.transformerData(afip_invoice.FECAESolicitarResult);
                data.products = this.data.items;
                data.customer = {
                    name : this.data.customer,
                    address : this.data.pedido_fiscal_address.name,
                    inscription : this.data.customer_inscription_name,
                    id_number : this.data.customer_document_number
                }
                console.log('invoice_print');
                console.log('invoice_print');
                console.log('invoice_print');
                console.log('invoice_print');
                console.log(data);
                console.log('invoice_print');
                //data.bill_type = this.cbte_tipo;
                data.bill_type = afip_invoice.FECAESolicitarResult.FeCabResp.CbteTipo;
                data.ptoVta = afip_invoice.FECAESolicitarResult.FeCabResp.PtoVta;
                data.cae_vto = afip_invoice.FECAESolicitarResult.FeDetResp.FECAEDetResponse.CAEFchVto;
                let totals = [];
                if (data.bill_type == '001' || data.bill_type == '201') {
                    if (data.bill_type == '201') {
                        data.voucher = 'FACTURA DE CRÉDITO ELECTRÓNICA MiPyME (FCE) A';
                    }else{
                        data.voucher = 'FACTURA A';
                    }

                    data.invoice_letter = 'A';

                    collect(this.alicIva()).each((i)=>{

                        if (i.Id == 4 || i.Id == '4') {
                            totals.push({
                                'name' : 'Subtotal',
                                'value' : i.BaseImp
                            });
                            totals.push({
                                'name' : 'Iva 10,5 %',
                                'value' : i.Importe
                            });
                        }

                        if (i.Id == 5 || i.Id == '5') {
                            totals.push({
                                'name' : 'Subtotal',
                                'value' : i.BaseImp
                            });
                            totals.push({
                                'name' : 'Iva 21 %',
                                'value' : i.Importe
                            });
                        }
                    });
                    
                    if (this.array_tributos != '') {
                        totals.push({
                            'name' : this.array_tributos[0].Desc + ' ' + this.array_tributos[0].Alic + ' %',
                            'value' : this.array_tributos[0].Importe
                        });
                    }

                    totals.push({
                        'name' : 'Total',
                        'value' : this.total_import
                    });

                    
                }

                if (this.cbte_tipo == '006') {
                    
                    let items = collect(this.data.items);

                    let total = items.map((i) => {
                        return (parseFloat(i.neto_import) + parseFloat(i.iva_import));
                    }).sum();

                    totals.push({
                        'name' : 'Subtotal',
                        'value' : total
                    });

                    totals.push({
                        'name' : 'Total',
                        'value' : total
                    });

                }

                if (this.cbte_tipo == '011') {
                    
                    let items = collect(this.data.items);

                    let total = items.map((i) => {
                        return (parseFloat(i.neto_import) + parseFloat(i.iva_import));
                    }).sum();

                    totals.push({
                        'name' : 'Subtotal',
                        'value' : total
                    });
                    if (this.array_tributos != '') {
                        totals.push({
                            'name' : this.array_tributos[0].Desc + ' ' + this.array_tributos[0].Alic + ' %',
                            'value' : this.array_tributos[0].Importe
                        });

                        totals.push({
                            'name' : 'Total',
                            'value' : total + parseFloat(this.array_tributos[0].Importe)
                        });
                    }else{
                        totals.push({
                            'name' : 'Total',
                            'value' : total
                        });
                    }
                }
                data.totals = totals;
                data.company = this.GetCompany;
                data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                console.log('##############  DATA PDF ##########');
                console.log(data);
                console.log('##############  DATA PDF ##########');

                if (this.cbte_tipo == '001' || this.cbte_tipo == '002' || this.cbte_tipo == '003' || this.cbte_tipo == '201'){
                    let pdf = new InvoiceA();
                    pdf.structure_scaffold(data);
                    pdf.print();
                }else{
                    let pdf = new InvoiceB();
                    pdf.structure_scaffold(data); 
                    pdf.print();
                }
                    
            },

            async billGenerate()
            {
                this.cbteTipo();
                console.log('cbte_Tipo ' + this.cbte_tipo);
                if(this.GetCompany.percep_iibb && this.data.customer_addresses[0].state_id == 2 && (this.cbte_tipo == '001' || this.cbte_tipo == '011'))
                {
                    let alicuota_percepcion = 0;
                    console.log('dentro de perccep IIBB');
                    let payload_alicuota_iibb = {
                        token : this.User.token,
                        cuit : this.data.customer_document_number
                    }

                    let percep_iibb = await this.$store.dispatch('getAlicuota', payload_alicuota_iibb).catch((err)=>{
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
                    console.log(percep_iibb);
                    console.log('TRIBUTOS IIBB');
                    console.log(this.tributos_import);
                    console.log('Neto');
                    console.log(this.netoImport());
                    console.log('IVA');
                    console.log(this.ivaImport());
                    console.log('IIBB');
                    this.tributos_import = this.impTributos(this.netoImport(), alicuota_percepcion);
                    console.log(this.tributos_import);
                    this.array_tributos = this.arrayTributos(this.netoImport(), alicuota_percepcion);
                    console.log(this.array_tributos);
                }
                this.total_import = (this.netoImport() + this.ivaImport() + parseFloat(this.tributos_import));
                console.log('IMPORTE TOTAL + TRIBUTOS');
                console.log(this.total_import);
                 let payload_ultimo_autorizado = {
                    token : this.User.token,
                    CteTipo : this.cbte_tipo
                }

                let last = await this.$store.dispatch('ultimo_autorizado', payload_ultimo_autorizado).catch((err) => {
                    let e = JSON.parse(err.response.data);
                    if (Array.isArray(e)) {
                        this.error_message(e[0].Msg, 'Código: '+e[0].Code, 4000);
                    }else{
                        this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                    }
                }).finally(()=>{
                    this.spinner = false;
                });

                if (last) {
                    console.log('ultoiomooooooo');
                    console.log(last);
                }
                let data = {
                    customer : {
                        key_type : this.data.customer_DocTipo,
                        id_number : this.data.customer_document_number
                    },
                    bill_number : last.CbteNro + 1,
                    bill_date : this.$moment().format("YYYYMMDD"),
                    bill_date_vto : this.$moment().add(10, 'days').format("YYYYMMDD")
                }
                console.log('data para FECAEDetRequest');
                console.log(data);
                this.FECAEDetRequest = FECAEDetRequestTransformer.transformerData(
                    data,
                    this.total_import,
                    this.netoImport(),
                    this.ivaImport(),
                    this.alicIva(),
                    this.cbte_tipo,
                    this.cbtes_asociados,
                    this.impo_Tot_Conc,
                    this.tributos_import,
                    this.array_tributos
                    );
                console.log('this.FECAEDetRequest');
                console.log('this.FECAEDetRequest');
                console.log('this.FECAEDetRequest');
                console.log('this.FECAEDetRequest');
                console.log('this.FECAEDetRequest');
                console.log('this.FECAEDetRequest');
                console.log(this.FECAEDetRequest);
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
                console.log('los datos que se envian a afip');
                console.log(payload_bill_generate);
                let afip_invoice = await this.$store.dispatch('billGenerate', payload_bill_generate).catch((err) => {
                    let e = JSON.parse(err.response.data);
                    if (Array.isArray(e)) {
                        this.error_message(e[0].Msg, 'Código: '+e[0].Code, 4000);
                    }else{
                        this.error_message(e.Msg, 'Código: '+e.Code, 4000);
                    }
                }).finally(()=>{
                    this.spinner = false;
                });
                if (afip_invoice) {
                    
                    console.log('y la factura es....');
                    console.log(afip_invoice);

                    this.invoice_print(afip_invoice);
                }
            },
            
        },

        beforeMount() {
              this.status_pedido_cliente = this.data.status_id;
        },

        mounted()
        {
            Event.$on('cambiar_a_facturado', async () => {
                this.status_pedido_cliente = 11
                let payload = {
                    id : this.data.id,
                    code : this.data.code,
                    status : 11
                }
                
                this.$store.commit('SET_PEDIDO_CODE', payload);
                let pedido = await this.$store.dispatch('status_update', this.User.token);
                if (pedido) {
                    
                    Vue.set(this.data, 'status_id', 11);
                    //Event.$emit('pedido_cliente_list', this.data);
                    Event.$emit('pedido_cliente_list', pedido.data);
                }
            })
        },
        computed : {
            ...mapGetters([
                'GetCompany',
                'GetPrintComments',
                'PedidoClientesAddNewAddressGetter',
                'PedidosClientesDeliveryAddressGetter'
            ])
        },
    }
</script>
<style scoped>
    .color-pink{
        background-color: #f0ccd2;
    }
</style>