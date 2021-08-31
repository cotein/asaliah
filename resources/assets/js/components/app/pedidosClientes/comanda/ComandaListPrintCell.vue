<template>
    <button @click="print" 
            class="btn btn-default btn-icon sq-32" 
            type="button"
            >
        <span class="icon icon-print"></span>
    </button>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Comanda from './../../../../src/Pdf/Comanda';
    export default {
        props: ['data', 'index'],
        data() {
            return {
                token : null
            }
        },

        methods : {
            async print()
            {
                let data = {
                    customer : this.data.customer,
                    cv : '---------',
                    op : this.data.user_on_list_status[0],
                    address : this.data.customer_address,
                    cellphone : (this.data.customer_cellphone)?this.data.customer_cellphone:'',
                    phone1 : (this.data.customer_phone1)? ' ' + this.data.customer_phone1:'',
                    phone2 : (this.data.customer_phone2)? ' ' +this.data.customer_phone2:'',
                    phone3 : (this.data.customer_phone3)? ' ' + this.data.customer_phone3:'',
                    code : this.data.code,
                    items : this.data.items,
                    delivery_date : this.data.date,
                    emition_date : this.$time(Date.now()).format("DD-MM-YYYY"),
                    origin : (this.data.is_meli_order) ? 'MercadoLibre' : 'Local',
                    comments : this.data.comments

                }

                let comanda = new Comanda;

                comanda.generate(data);
                comanda.print();
            },
        },

        computed : {
            ...mapGetters([
                'GetCompany'
            ]),

            
        },
    }
</script>