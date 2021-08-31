<template>
    <div
        class="text-center"
        v-tooltip="(!data.pedido_delivery_address)?'Debe definir un domicilio de entrega para realizar la impresión': 'Imprimir Remito'"
    >
        <button @click="remito_print" 
                class="btn btn-default btn-icon sq-32" 
                :class="{'btn btn-default spinner spinner-inverse spinner-sm' : print_spinner}"
                type="button"
                :disabled="!Enable || data.pedido_delivery_address == []"
                >
            <span class="icon icon-print"></span>
        </button>
    </div>
</template>

<script>
import { collect } from 'collect.js';
    import {mapGetters} from 'vuex';
    import zero_left from './../../../mixins/zero-left';
    import PedidoClientePdf from './../../../src/Pdf/PedidoClientePdf';
    export default {
        props: ['data', 'index'],
        data() {
            return {
                token : null,
                print_spinner : false
            }
        },

        methods : {
            zeroLeft (str, max) {
                str = str.toString();
                return str.length < max ? this.zeroLeft("0" + str, max) : str;
            },

            remito_print()
            {   
                return new Promise(resolve => {

                    this.print_spinner = true;

                    let comments = null;

                    if (this.data.comments) {
                        comments = collect(this.data.comments).map(c => {
                            return c.description;
                        }).toArray();    
                    }else{
                        comments = false;
                    }
                    
                    this.data.print_comments = comments;
                    this.data.company = this.GetCompany;
                    this.data.voucher = 'REMITO';
                    this.data.voucher_number = 'N° 0001-' + this.zeroLeft(this.data.id,8);
                    this.data.text = ['ORIGINAL', 'DUPLICADO', 'TRIPLICADO'];
                    

                    if (this.PCDeliveryAddressGetter) {
                        this.data.delivery_address = this.PCDeliveryAddressGetter;
                    }

                   /*  if (this.PedidoClientesAddNewAddressGetter) {
                        this.data.delivery_address = this.PedidoClientesAddNewAddressGetter;
                    } */
                    console.log('data desde pedidoListCellPrint');
                    console.log(this.data);
                    let pdf = new PedidoClientePdf();
                    pdf.structure_scaffold(this.data);

                    setTimeout(()=>{
                        this.print_spinner = false;
                        resolve('resolved');
                    },1500);
                    pdf.print();
                });
                
            },
        },

        computed : {

            ...mapGetters([
                'GetCompany',
                'PedidoClientesAddNewAddressGetter',
                'PedidosClientesDeliveryAddressGetter',
                'PCDeliveryAddressGetter'
            ]),

            Enable()
            {
                if (this.data.status_id >= 9 && this.data.status_id != 7 ) {
                    return true;
                }
                return false;
            }
        },

        mounted() {
            console.log('mounted PedidoListCellPrint');
            console.log(this.data);
        },
       
    }
</script>