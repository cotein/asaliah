<template>
<div>
<div class="row" id="pedido-list-child-row">
    <div class="col-md-12 pull-right">
        <div class="card">
            <div class="card-header" >
                <div class="row">
                    <div>
                        <div class="pull-right col-md-1" 
                            v-tooltip.right-end="{content : (!data.customer_has_afip_data) ? 'Para editar sus datos primero debe consultarlos en AFIP' : 'Editar datos del cliente'}"
                        >
                            <button 
                                @click="open_customer_edit_modal" 
                                data-backdrop="false"
                                :disabled="!data.customer_has_afip_data"
                            >Editar Cliente</button>
                        </div>
                        <Billing_info :data="data" class="pull-right"/>
                    </div>
                    <div class="col-md-7">
                        <span v-if="data.customer_nick_name">Nombre en MercadoLibre: 
                            <strong>{{ data.customer_nick_name}}</strong> -
                        </span>
                        <span v-if="data.customer_document_number">
                                <span>{{ (data.customer_document_number.length < 11) ? 'DNI' : data.customer_DocTipo}}</span>
                                <strong>{{ data.customer_document_number}}</strong>
                                <span v-if="data.customer_inscription_name != 'Falta definir'">
                                    <strong> - {{ data.customer_inscription_name}}</strong>
                                </span>
                        </span>
                        <div >
                            <strong class="label label-default">Domicilio registrado en AFIP </strong>
                            <multiselect placeholder="DOMICILIO FISCAL" 
                                track-by="name" label="name"
                                :options="(data.customer_addresses)?data.customer_addresses:[]"
                                :searchable="false"
                                v-model="fiscal_address"
                                :loading="save_fiscal_address_spinner"
                                :disabled="save_fiscal_address_spinner"
                                @select="save_fiscal_address"
                                @remove="remove_fiscal_address"
                                selectLabel="Seleccionar"
                                selectedLabel="Seleccionado"
                                deselectLabel="Quitar"
                                >
                                <span slot="noOptions">
                                    Lista Vacía
                                </span>
                                <span slot="noResult">
                                        La búsqueda no arrojó resultados
                                </span>
                            </multiselect>
                            <strong style="margin-top:11px" class="label label-danger">Domicilio de entrega</strong>
                            <multiselect placeholder="DOMICILIO DE ENTREGA" 
                                track-by="name" label="name"
                                :options="(data.customer_addresses)?data.customer_addresses:[]"
                                :searchable="false"
                                v-model="delivery_address"
                                :loading="save_delivery_address_spinner"
                                :disabled="save_delivery_address_spinner"
                                @select="save_delivery_address"
                                @remove="remove_delivery_address"
                                selectLabel="Seleccionar"
                                selectedLabel="Seleccionado"
                                deselectLabel="Quitar"
                                >
                                <span slot="noOptions">
                                    Lista Vacía
                                </span>
                                <span slot="noResult">
                                        La búsqueda no arrojó resultados
                                </span>
                            </multiselect>
                        </div>
                        <!-- <div v-else>
                            <strong class="label label-danger">Es necesario registrar domicilios de Entrega y Fiscal</strong>
                        </div> -->

                        <p v-if="(data.cell_phone || data.phone_1 || data.phone_2 || data.phone_3)" style="margin-top:5px"><strong>Teléfonos: </strong> {{(data.cell_phone)?data.cell_phone:''}} {{(data.phone_1)?data.phone_1:''}}  {{(data.phone_2)? '- ' + data.phone_2:''}} {{(data.phone_3)? '- ' + data.phone_3:''}}</p>
                        <p v-if="data.email"><strong>Email: </strong> {{data.email}}</p>
                    </div>
                    <div class="col-md-5 text-center">
                        <p>Estados del pedido</p>
                        <PedidoListCellStatusChange :data="data" />
                        <div>
                            <CustomerSearchAfipData :data="data" :dni_cuil_cuit="data.customer_document_number"/>
                            <PedidoClienteTipoPersona :data="data" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form form-inline">
                        <span class="control-label"><strong>Definir fecha de entrega</strong></span>
                        <div class="form-group">
                            <datepicker
                                :ref="'id_'+data.id" 
                                :language="es"
                                :value="date"
                                input-class="my-input"
                                :format="customFormatter"
                                :disabled-dates="DisabledDates"
                                v-model="date"
                                @selected="update_delivery_date"
                            ></datepicker>
                        </div>
                        <button 
                            @click.prevent="update_date" 
                            class="btn btn-primary btn-xs" 
                            type="button"
                            :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner_date}" 
                            >Actualizar
                        </button>
                        <button 
                            data-toggle="modal" 
                            data-target="#address-new-modal"
                            data-backdrop="false"
                            class="btn btn-primary btn-xs pull-right" 
                            type="button"
                            >Agregar Domicilio
                        </button>
                    </div>
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">#</th>
                        <th class="text-center col-md-5">Producto</th>
                        <th class="text-center col-md-1">Cantidad</th>
                        <th class="text-center col-md-1">P.Unit.</th>
                        <th class="text-center col-md-1">Importe</th>
                        <th class="text-center col-md-1">IVA</th>
                        <th class="text-center col-md-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in data.items" :key="item.product_id" >
                        <td class="text-center">{{index + 1}}</td>
                        <td class="text-left">{{item.product_name}} <strong>{{(item.product_attributes != '') ? ' | ' + item.product_attributes : ''}}</strong></td>
                        <td class="text-center">{{item.quantity}}</td>
                        <td class="text-right">{{(item.neto_import / item.quantity) | currency}}</td>
                        <td class="text-right">{{item.neto_import | currency}}</td>
                        <td class="text-right">{{item.iva_import | currency}}</td>
                        <td class="text-right">{{item.total_raw  | currency}}</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card" v-if="data.payment_data">
            <div class="card-header" style="background-color:#D3D4D4">
                <strong>Detalle de pago</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Estado</th>
                            <!-- <th class="text-center">Estado General</th> -->
                            <th class="text-center">Número - Id</th>
                            <th class="text-center">Confirmado el</th>
                            <th class="text-center">Como</th>
                            <th class="text-center">Cuotas</th>
                            <th class="text-center">Importe cuota</th>
                            <!-- <th class="text-center">Importe total</th> -->
                            <th class="text-center">Pagado</th>
                            <th class="text-center">Envío</th>
                            <th class="text-center">Transaction</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in data.payment_data" :key="item.payment_id" >
                            <td class="text-center">{{index + 1}}</td>
                            <td class="text-center">
                                <span 
                                    class="label"
                                    :class="status_color(item.status)"
                                >{{status(item.status)}}</span>    
                            </td>
                            <!-- <td class="text-center">{{item.status_detail}}</td> -->
                            <td class="text-center">{{item.payment_id}}</td>
                            <td class="text-center">{{$moment(item.date_approved).format("DD-MM-YYYY")}}</td>
                            <td class="text-center">{{payment_type(item.payment_type)}}</td>
                            <td class="text-center">{{item.installments}}</td>
                            <td class="text-center">{{item.installment_amount | currency}}</td>
                            <td class="text-center">{{item.total_paid_amount | currency}}</td>
                            <td class="text-center">{{item.shipping_cost | currency}}</td>
                            <td class="text-center">{{item.transaction_amount | currency}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-header" v-else>
            <strong>Pago no realizado</strong>
        </div>
    </div>
</div>
<div>
    <div class="row" 
        v-if="this.data.status_id > 7"
        style="padding-bottom:15px"
        >
        <div class="col-md-12" >
            <strong><p>Primer contacto:</p></strong>
            <div class="col-md-10">
                <input 
                    class="form-control" 
                    type="text" 
                    placeholder="Ayuda memoria sobre el primer contacto"
                    v-model="first_contact"
                    >
            </div>
            <div class="col-md-1">
                    <button 
                        v-tooltip="'Primer contacto'"
                        @click="status_update"
                        class="btn btn-primary btn-sm" 
                        :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : fisrt_contact_spinner}" 
                        type="button">
                        Guardar
                    </button>
            </div>
            <div class="col-md-1">
                    <button 
                        v-tooltip="'Cancelar contacto'"
                        @click="cancel_pedido"
                        class="btn btn-default btn-sm" 
                        :class="{'btn btn-default spinner spinner-inverse spinner-sm' : spinner}" 
                        type="button">
                        Cancelar
                    </button>
            </div>
        </div>
    </div>
    <div class="card" v-if="GetPedidoCliente.status != 17" 
        :aria-expanded="(card_comments)?'true':'false'" 
        :class="{'card-collapse': card_comments==false}">
        <div class="card-header btn-warning">
            <div class="card-actions">
                    <button type="button" 
                        class="btn btn-warning btn-xs"
                        @click="card_comments=!card_comments" 
                        :title="(card_comments)?'Cerrar':'Abrir'" 
                        :aria-expanded="(card_comments)?'true':'false'">
                        <strong>{{(card_comments)?'Cerrar Panel':'Abrir Panel'}}</strong>
                        </button>
                        
                  </div>
            <div class="col-md-4">
                <strong>Comentarios / Recordatorios del Pedido</strong>
            </div>
        </div>
        
        <div class="card-body" v-if="HasComment" :style="{'display':(card_comments)?'block':'none'}">
            <table class="table" >
                <thead>
                    <tr>
                        <th class="col-md-1 text-center">#</th>
                        <th class="col-md-1 text-center">Imprimir</th>
                        <th class="col-md-2 text-left">Usuario</th>
                        <th class="col-md-7 text-center">Comentario / Observación</th>
                        <th class="col-md-1 text-center">Fecha</th>
                    </tr>
                </thead>
                    <collapse-transition group tag="tbody" :delay="200">
                        <tr v-for="(comment, index) in PedidoClienteGetComments" :key="index" >
                            <td class="text-center">{{index + 1}}</td>
                            <td class="text-center">
                                <input 
                                    :ref="'chk_'+index"
                                    type="checkbox" 
                                    class="form-control" 
                                    :value="comment.description"
                                    v-model="print_comment"
                                    @click="add_comment_to_print_comment"
                                >
                            </td>
                            <td class="text-left">{{comment.name}}</td>
                            <td class="text-left">{{comment.description}}</td>
                            <td class="text-left">{{comment.date}}</td>
                        </tr>
                    </collapse-transition>
            </table>
        </div>
        
        <div class="card-footer" :style="{'display':(card_comments)?'block':'none'}">
            <div class="post-comment-box col-md-10">
                    <div action="#">
                        <input 
                            v-model="comment"
                            class="form-control input-sm" 
                            type="text" 
                            placeholder="Agregar comentario...">
                    </div>
                </div>
                <div class="col-md-2">
                    <button 
                        v-tooltip="'Agregar comentario'"
                        @click="save_comment"
                        class="btn btn-warning btn-sm"
                        :disabled="comment == null" 
                        :class="{'btn btn-warning spinner spinner-inverse spinner-sm' : comment_spinner}" 
                        type="button">
                        Agregar comentario
                    </button>
                </div>
        </div>
    </div>
    <PedidoMessagePanel :data="data"/>
</div>
</div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import auth from './../../../mixins/auth';
    import Multiselect from 'vue-multiselect';
    import Datepicker from 'vuejs-datepicker';
    import {es} from 'vuejs-datepicker/dist/locale';
    import sleep from './../../../mixins/sleep-mixin';
    import { CollapseTransition } from 'vue2-transitions'
    import PedidoMessagePanel from './PedidoMessagePanel';
    import toast_mixin from './../../../mixins/toast-mixin';
    import Payment from './../../../src/MercadoLibre/Payment';
    import PedidoClienteTipoPersona from './PedidoClienteTipoPersona'
    import PedidoListCellStatusChange from './PedidoListCellStatusChange';
    import QuestionWrapper from './../mercadolibre/questions/QuestionWrapper';
    import CustomerSearchAfipData from './../../app/customers/CustomerSearchAfipData';

    //import billing_info from './../../app/mercadolibre/orders/billing_info';
    import Billing_info from '../mercadolibre/orders/billing_info.vue';

    export default {
        name : 'PedidoListChildRow',
        props: ['data'],
        components : {PedidoListCellStatusChange, Datepicker, CustomerSearchAfipData, 
            PedidoClienteTipoPersona, Multiselect, QuestionWrapper, CollapseTransition, PedidoMessagePanel,
                Billing_info
        },
        mixins : [auth, toast_mixin, sleep],
        data() {
            return {
                card_comments : true,
                token : null,
                spinner : false,
                fisrt_contact_spinner : false,
                comment_spinner : false,
                spinner_date : false,
                comment : null,
                es : es,
                print_comment : [],
                //date : new Date((this.data.date == 'Falta fecha') ? this.$moment() : this.$moment(this.data.date).format("DD-MM-YYYY")),
                date : new Date(),
                first_contact : null,
                fiscal_address : null,
                delivery_address : null,
                save_fiscal_address_spinner : false,
                save_delivery_address_spinner : false,
            }
        },

        methods : {
            open_customer_edit_modal()
            {
                let type = {
                    id : this.data.customer_type_id,
                    name : this.data.customer_type,
                }
                this.$store.commit('SET_CUSTOMER_TYPE', type);

                let accounting_account_child = {
                    id : (this.data.customer_type_id == 1) ? 173 : 174,
                    name : (this.data.customer_type_id == 1) ? 'CLIENTES MINORISTAS' : 'CLIENTES MAYORISTAS'
                }
                this.$store.commit('SET_CUSTOMER_SUBLEVEL_ACCOUNTING_ACCOUNT', accounting_account_child);

                this.$store.commit('SET_CUSTOMER_NAME', this.data.customer);
                this.$store.commit('SET_CUSTOMER_ID', this.data.customer_id);
                this.$store.commit('SET_CUSTOMER_CONTACT_EMAIL', this.data.email);

                let inscription = {
                    id : this.data.customer_inscription_id,
                    name : this.data.customer_inscription_name,
                }
                this.$store.commit('SET_CUSTOMER_INSCRIPTION', inscription);

                let purchase_document = {
                    id : this.data.customer_DocTipo_id,
                    name : this.data.customer_DocTipo,
                }

                let accounting_accounts_child = [
                    {
                        id : 173,
                        name : 'CLIENTES MINORISTAS'
                    },
                    {
                        id : 174,
                        name : 'CLIENTES MAYORISTAS'
                    }
                ];

                this.$store.commit('SET_ACCOUNTING_ACCOUNTS', accounting_accounts_child);

                this.$store.commit('SET_CUSTOMER_PURCHASE_DOCUMENT', purchase_document);
                
                this.$store.commit('SET_CUSTOMER_CONTACT_NAME', this.data.customer_contact);

                this.$store.commit('SET_CUSTOMER_CONTACT_CELLPHONE', this.data.customer_cellphone);

                this.$store.commit('SET_CUSTOMER_CONTACT_PHONE1', this.data.customer_phone1);

                this.$store.commit('SET_CUSTOMER_CONTACT_PHONE2', this.data.customer_phone2);

                this.$store.commit('SET_CUSTOMER_CONTACT_PHONE3', this.data.customer_phone3);
                
                this.$store.commit('SET_CUSTOMER_NUMBER', this.data.customer_document_number);

                if (this.data.customer_addresses) {
                    
                    this.data.customer_addresses.forEach((address, index) => {

                        if (index > 0) {
                            this.sleep(150);
                            this.$store.commit('ADD_NEW_ADDRESS');
                            this.sleep(150);
                        }

                        let type = {
                            id : address.type_id,
                            name : address.type,
                        }
                        this.$store.commit('SET_CUSTOMER_ADDRESS_TYPE', {index : index, data : type});
                        
                        let state = {
                            id : address.state_id,
                            name : address.state,
                        }
                        this.$store.commit('SET_CUSTOMER_ADDRESS_PROVINCE', {index : index, data : state});
                        
                        let city = {
                            id : address.city_id,
                            name : address.city,
                        }
                        this.$store.commit('SET_CUSTOMER_ADDRESS_CITY', {index : index, data : city});
                        
                        this.$store.commit('SET_CUSTOMER_ADDRESS_CP', {index : index, data : address.cp});
                        
                        this.$store.commit('SET_CUSTOMER_ADDRESS_NUMBER', {index : index, data : address.number});
                        
                        this.$store.commit('SET_CUSTOMER_ADDRESS_BETWEEN', {index : index, data : address.between_streets});
                        
                        this.$store.commit('SET_CUSTOMER_ADDRESS_OBS', {index : index, data : address.obs});
                        
                        this.$store.commit('SET_CUSTOMER_ADDRESS_ID', {index : index, data : address.id});
                        
                        this.$store.commit('SET_CUSTOMER_ADDRESS_ADDRESS', {index : index, data : address.domicilio});
                            
                    });
                }
                
                Event.$emit('open_customer_edit_modal');
            },

            add_comment_to_print_comment($e)
            {
                if ($e.target.checked) {
                    this.print_comment.push($e.target.value);
                    this.$store.commit('SET_PRINT_COMMENT', this.print_comment);
                }else{
                    let index = this.print_comment.indexOf($e.target.value);
                    this.print_comment.splice(index, 1);
                    this.$store.commit('SET_PRINT_COMMENT', this.print_comment);
                }
            },

            update_delivery_date(value)
            {
                let date = this.$moment(value).format("YYYY-MM-DD");
                let seven_days = this.$moment().add(7, 'days');
                
                if (this.$moment().add(7, 'days').diff(this.$moment(value), 'days') >= 0) {
                    this.info_message('Fecha de entrega', 'La entrega se realizará antes de 7 días')
                }
                
                this.$store.commit('UPDATE_DELIVERY_DATE', date);  

            },

            status(value)
            {
                let payment = new Payment;

                return payment.status(value)
            },

            status_color(value)
            {
                let payment = new Payment;
                return payment.status_color(value);
            },

            payment_type(value)
            {
                let payment = new Payment;

                return payment.payment_type(value)
            },

            async update_date()
            {
                this.spinner_date = true;

                let payload = {
                    token : this.User.token,
                    pedido_id : this.data.id,
                    date : this.$moment(this.date).format("YYYY-MM-DD")
                }
                
                let date = await this.$store.dispatch('update_delivery_date', payload);
                if (date) {
                    Event.$emit('pedido_cliente_update_delivery_date', date);

                    this.success_message('Fecha de entrega actualizada correctamente', 'Pedidos');
                }
                this.spinner_date = false;

            },

            cancel_pedido()
            {
                this.$store.commit('CLEAR_PEDIDO');

                this.error_message('Pedido cancelado', 'Pedidos');
            },

            async status_update()
            {
                this.fisrt_contact_spinner = true;
                let payload = {
                    id : this.data.id,
                    code : this.data.code,
                    status : this.data.status_id
                }
                
                this.$store.commit('SET_PEDIDO_CODE', payload);

                this.$store.commit('SET_FIRST_CONTACT', this.first_contact);

                this.sleep(1500);
                
                let pedido = await this.$store.dispatch('status_update', this.User.token);

                if (pedido) {
                   
                    this.success_message('Estado actualizado', 'Pedidos');

                }

                this.fisrt_contact_spinner = false;
            },

            async save_comment()
            {
                this.spinner = true;
                
                let payload = {
                    token : this.User.token,
                    pedido_id : this.data.id,
                    comment : this.comment
                }

                let comment = await this.$store.dispatch('save_comment', payload)
                .catch(err => {
                    this.error_message('Se ha producido un error, vuelva a intentarlo.', 'Pedidos');
                }).finally(()=>{
                    this.spinner = false;
                    this.comment = null;
                });

                if (comment) {
                    this.success_message('Comentario se agregó correctamente.', 'Pedidos');
                    let comments = {
                        id : this.data.id,
                        comments : comment.data
                    }
                    console.log(this.comment);
                    this.print_comment.push(this.comment);
                    Event.$emit('pedido_cliente_list_update_comments', comments);
                }

            },
            customFormatter(date){
                return this.$moment(date).format("dddd D [de] MMMM [de] YYYY");
            },

            delivery_date(value){

                let date = this.$moment(value).format("YYYYMMDD");
            
                this.$store.commit('SET_DELIVERY_DATE', date);
            },

            async save_fiscal_address(element)
            {
                this.save_fiscal_address_spinner = true;

                let payload = {
                    token : this.User.token,
                    address : element.id,
                    pedido_id : this.data.id
                }

                this.sleep(250);

                let address = await this.$store.dispatch('save_fiscal_address', payload)
                    .catch(err => {
                        console.log(err.response);
                        this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                    }).finally(() => this.save_fiscal_address_spinner = false);
                if (address) {
                    let data = {
                        address : address,
                        pedido_id : this.data.id
                    }
                    Event.$emit('save_fiscal_address', data);
                }

            },

            async remove_fiscal_address(element)
            {
                this.save_fiscal_address_spinner = true;

                let payload = {
                    token : this.User.token,
                    address : element.id,
                    pedido_id : this.data.id
                }

                this.sleep(250);

                let address = await this.$store.dispatch('remove_fiscal_address', payload)
                    .catch(err => {
                        console.log(err.response);
                        this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                    }).finally(() => this.save_fiscal_address_spinner = false);
                if (address) {
                    console.log(address);
                    let data = {
                        pedido_id : this.data.id
                    }
                    Event.$emit('remove_fiscal_address', data);
                }
            },

            async save_delivery_address(element)
            {
                this.save_delivery_address_spinner = true;

                let payload = {
                    token : this.User.token,
                    address : element.id,
                    pedido_id : this.data.id
                }

                this.sleep(250);

                let address = await this.$store.dispatch('save_delivery_address', payload)
                    .catch(err => {
                        console.log(err.response);
                        this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                    }).finally(() => this.save_delivery_address_spinner = false);
                if (address) {
                    console.log(address);
                    let data = {
                        address : address,
                        pedido_id : this.data.id
                    }
                    Event.$emit('save_delivery_address', data);
                }
            },

            async remove_delivery_address(element)
            {
                this.save_delivery_address_spinner = true;

                let payload = {
                    token : this.User.token,
                    address : element.id,
                    pedido_id : this.data.id
                }

                this.sleep(250);

                let address = await this.$store.dispatch('remove_delivery_address', payload)
                    .catch(err => {
                        console.log(err.response);
                        this.error_message(err.response.data, 'Código: '+err.response.status, 4000); 
                    }).finally(() => this.save_delivery_address_spinner = false);
                if (address) {
                    console.log(address);
                    let data = {
                        pedido_id : this.data.id
                    }
                    Event.$emit('remove_delivery_address', data);
                }
            }
        },

        computed : {

            DisabledDates(){
                return {
                    to:  this.$moment(this.Today).toDate(),
                    from: this.$moment(this.Today).add(365, 'days').toDate(), 
                    days : [0]
                } 
            },

            Today(){
                return this.$moment(Date.now());
            },
            ...mapGetters([
                'GetPedidoCliente',
                'GetCustomerAddress',
                'PedidoClientesAddNewAddressGetter',
                'GetCustomersData',
                'PedidosClientesFiscalAddressGetter',
                'PedidosClientesDeliveryAddressGetter'
            ]),

            HasComment()
            {
                let comments = collect(this.data.comments);

                if (comments.count() > 0) {
                    return true;
                }

                return false;
            },

            PedidoClienteGetComments()
            {
                return this.data.comments;
            },

            ThisDataCustomerAddresses()
            {
                return this.data.customer_addresses;
            },

        },

        watch : {

            GetCustomerAddress(n)
            {
                let payload = {
                    data : this.data,
                    address : collect(n).last()
                }
                Event.$emit('set_customer_address', payload);
            },

            GetCustomersData(n)
            {
                this.sleep(150);
                
                this.data.customer_addresses = n.addresses;
                this.sleep(150);
                let payload = {
                    data : this.data,
                    customer_updated_data : n
                }
                Event.$emit('set_customer_data_updated', payload);
            },

        },

        mounted() {

            Event.$emit('open_child_row_component', this.data.id);

            this.$moment.locale('es');

            if (this.PedidoClienteGetComments) {

                collect(this.PedidoClienteGetComments).each(c=> {
                    this.print_comment.push(c.description);
                });

                this.$store.commit('SET_PRINT_COMMENT', this.print_comment);

            }

            this.$store.commit('SET_CUSTOMER_ID', this.data.customer_id);

            this.sleep(250);

            this.first_contact = this.data.first_contact;

            if (this.data.pedido_fiscal_address) {
                
                this.data.customer_addresses.forEach(address => {
                    if (address.id == this.data.pedido_fiscal_address.id) {
                        this.fiscal_address = this.data.pedido_fiscal_address
                    }
                });
            }

            if (this.data.pedido_delivery_address) {
                
                this.data.customer_addresses.forEach(address => {
                    if (address.id == this.data.pedido_delivery_address.id) {
                        this.delivery_address = this.data.pedido_delivery_address
                    }
                });
            }

            this.$store.commit('SET_MELI_MESSAGES', this.data.meli_messages);

            let el = document.querySelector('#pedido-list-child-row');
            this.$scrollTo(el, {duration: 2000 , offset: -100});

        },
       
    }
</script>
<style>
    .my-input{
        background-color: white;
        border-style:solid !important;
        border-color:#5d5d5d !important;
        border-width:1px !important;
        text-align: center;
        width: 250px !important;
    }
    .my-success{
        background-color: #4C8A48;
    }
    .my-danger{
        background-color: #E91808;
    }
    .my-info {
        background-color: #555e7a;
    }
    .my-warning {
        background-color: #ff9c00;
    }
</style>