<template>
    <fade-transition>
        <div class="col-md-12">
            <div class="box">
                <h3 class="text-primary">{{BillText}}</h3>
            </div>
        </div>
    </fade-transition>
</template>
<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import auth from './../../../mixins/auth';
import company from './../../../mixins/company';
import toast_mixin from './../../../mixins/toast-mixin';
export const BILLS = {
    FACTURA_A : '001',
    NOTA_DEBITO_A : '002',
    NOTA_CREDITO_A : '003',
    FACTURA_B : '006',
    NOTA_DE_DEBITO_B : '007',
    NOTA_DE_CREDITO_B : '008',
    FACTURA_C : '011',
    NOTA_DE_DEBITO_C : '012',
    NOTA_DE_CREDITO_C : '013',
}

export default {
    mixins : [auth, company, toast_mixin],
    data() {
        return {
            CbteTipo : null,
            text : null,
            bill_data : {
                PtoVta : null,
                CbteTipo : null,
                CbteNro : null,
            },
            sucursal : null,
            bill_number : null,
            FACTURA_A : '001',
            NOTA_DEBITO_A : '002',
            NOTA_CREDITO_A : '003',
            FACTURA_B : '006',
            NOTA_DE_DEBITO_B : '007',
            NOTA_DE_CREDITO_B : '008',
            FACTURA_C : '011',
            NOTA_DE_DEBITO_C : '012',
            NOTA_DE_CREDITO_C : '013',
        }
    },

    computed : {

        ...mapGetters([
            'ExistCustomer',
            'BillType'
        ]),


        BillText(){

            switch (this.bill_data.CbteTipo) {
                case 1:
                    return 'FACTURA A N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
            
                case 2:
                    return 'NOTA DÉBITO A N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;

                case 3:
                    return 'NOTA CRÉDITO A N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
                
                case 6:
                    return 'FACTURA B N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
                
                case 7:
                    return 'NOTA DÉBITO B N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
                
                case 8:
                    return 'NOTA CRÉDITO B N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
                
                case 11:
                    return 'FACTURA C N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
                
                case 12:
                    return 'NOTA DÉBITO C N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
                
                case 13:
                    return 'NOTA CRÉDITO C N° ' + this.zeroLeft(this.bill_data.PtoVta, 5) + ' - ' + this.zeroLeft(this.bill_data.CbteNro + 1, 8);
                    break;
            }
        }
    },

    watch: {

        ExistCustomer(newVal){
            this.getCbteTipo();
            this.$store.commit('SET_BILL_TYPE', this.CbteTipo);
            this.ultimo_autorizado();
        },

        BillType(newVal){
            this.getCbteTipo();
            this.$store.commit('SET_BILL_TYPE', this.CbteTipo);
            this.ultimo_autorizado();
        },

    },

    methods : {

        zeroLeft (str, max) {
            str = str.toString();
            return str.length < max ? this.zeroLeft("0" + str, max) : str;
        },

        openModalError(){

            Event.$emit('show-modal-error');
        },

        async ultimo_autorizado(){

            let payload = {
                token : this.User.token,
                CteTipo : this.CbteTipo
            }

            let last = await this.$store.dispatch('ultimo_autorizado', payload)
            /* .then((response) => {
                this.bill_data = response.data;
                this.$store.commit('SET_BILL_NUMBER', response.data.CbteNro + 1);
            }) */
            .catch((err) => {
                let e = JSON.parse(err.response.data);
                this.error_message(e[0].Err.Msg, 'Código: '+e[0].Err.Code, 4000);
            });
            this.bill_data = last;
            this.$store.commit('SET_BILL_NUMBER', last.CbteNro + 1);
        },

        getCbteTipo(){
            
            let $vm = this;
            if ($vm.Company.inscription_id == 1 && $vm.ExistCustomer.inscription_id == 1) {
                switch ($vm.BillType) {
                    case 'F':
                        $vm.CbteTipo = '001';
                        break;

                    case 'CREDITO':
                        $vm.CbteTipo = '003';                
                        break;
                    
                    case 'DEBITO':
                        $vm.CbteTipo = '002';                
                        break;
                }
            }

            if ($vm.Company.inscription_id == 1 && $vm.ExistCustomer.inscription_id != 1) {
                switch ($vm.BillType) {
                    case 'F':
                        $vm.CbteTipo = '006';                
                        break;

                    case 'CREDITO':
                        $vm.CbteTipo = '008';               
                        break;
                    
                    case 'DEBITO':
                        $vm.CbteTipo = '007';                
                        break;
                }              
            }

            if ($vm.Company.inscription_id == 6 || $vm.Company.inscription_id == 4) {
                switch ($vm.BillType) {
                    case 'F':
                        $vm.CbteTipo = '011';                
                        break;

                    case 'CREDITO':
                        $vm.CbteTipo = '013';               
                        break;
                    
                    case 'DEBITO':
                        $vm.CbteTipo = '012';               
                        break;
                }
            }
        }
    },
    mounted() {
        Event.$on('update_billing_data', () => {
            this.ultimo_autorizado();
        })
    },
}
</script>