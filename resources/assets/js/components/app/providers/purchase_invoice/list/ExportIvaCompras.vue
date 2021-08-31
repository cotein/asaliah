<template>
    <div class="btn-group dropdown">
        <button 
            class="btn btn-info dropdown-toggle" 
            :class="{'spinner spinner-inverse spinner-sm' : spinner}"
            data-toggle="dropdown" 
            type="button" 
            aria-expanded="true"
        >
            <span class="icon icon-share icon-lg icon-fw"></span>
            Exportar
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="#" @click.prevent="invoices_export">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon icon-file-text icon-lg icon-fw"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">IVA Compras - Comprobantes</span>
                            <small>Necesario para aplicativo AFIP</small>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" @click.prevent="invoices_alicuotas">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon icon-file-code-o icon-lg icon-fw"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">IVA Compras - Alícuotas</span>
                            <small>Necesario para aplicativo AFIP</small>
                        </div>
                    </div>
                </a>
            </li>
            <!-- <li>
                <a href="#" @click.prevent="">
                    <div class="media">
                        <div class="media-left">
                            <span class="icon icon-file-pdf-o icon-lg icon-fw text-danger"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">PDF</span>
                        </div>
                    </div>
                </a>
            </li> -->
            <li>
                <a  href="#" @click.prevent="excel_export" >
                    <div class="media">
                        <div class="media-left">
                            <span class="icon icon-file-pdf-o icon-lg icon-fw text-success"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">EXCEL</span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</template>


<script>
    import {mapGetters} from 'vuex';
    import toast from './../../../../../mixins/toast-mixin';
    import TextFileGenerate from './../../../../../mixins/TextFileGenerate';
    export default {
        mixins : [TextFileGenerate, toast],
        data(){
            return {
                spinner : false,
                from_date : null,
                to_date : null,
            }
        },

        methods : {

            async invoices_export()
            {
                this.spinner = true;

                let payload = {
                    token : this.User.token,
                    from_date : this.$moment(this.IvaComprasFromDateGetter).format('DD/MM/YYYY'),
                    to_date : this.$moment(this.IvaComprasToDateGetter).format('DD/MM/YYYY'),
                }

                let comprobantes = await this.$store.dispatch('iva_compras_comprobantes', payload)
                    .catch((err) => {
                        console.log(err);
                        this.spinner = false
                    });

                if (comprobantes) {

                    return new Promise(resolve => {
                         
                        let text = this.text_proccess(comprobantes.data);
                        
                        setTimeout(()=>{
                            this.spinner = false
                            resolve('resolved');
                        },1500);
                        
                        let file_name = 'IVA COMPRAS - COMPROBANTES DESDE ' + this.from_date + ' HASTA ' + this.to_date;

                        this.txt_generate(text, file_name, 'txt');
                    });
                }
            },

            async invoices_alicuotas()
            {
                this.spinner = true;

                let payload = {
                    token : this.User.token,
                    from_date : this.$moment(this.IvaComprasFromDateGetter).format('DD/MM/YYYY'),
                    to_date : this.$moment(this.IvaComprasToDateGetter).format('DD/MM/YYYY'),
                }

                let alicuotas = await this.$store.dispatch('iva_compras_alicuotas', payload)
                    .catch((err) => {
                        console.log(err);
                        this.spinner = false
                    });

                if (alicuotas) {

                    return new Promise(resolve => {
                         
                        let text = this.text_proccess(alicuotas.data);
                        
                        setTimeout(()=>{
                            this.spinner = false
                            resolve('resolved');
                        },1500);
                        
                        let file_name = 'IVA COMPRAS - ALICUOTAS DESDE ' + this.from_date + ' HASTA ' + this.to_date;

                        this.txt_generate(text, file_name, 'txt');
                    });
                }
            },

            async excel_export()
            {
                this.spinner = true;

                /* let payload = {
                    token : this.User.token,
                    from_date : this.$moment(this.IvaComprasFromDateGetter).format('DD/MM/YYYY'),
                    to_date : this.$moment(this.IvaComprasToDateGetter).format('DD/MM/YYYY'),
                } */

                let xls_file = await axios.post('/api/iva/to_excel', 
                {
                    token : this.User.token,
                    from_date : this.$moment(this.IvaComprasFromDateGetter).format('DD/MM/YYYY'),
                    to_date : this.$moment(this.IvaComprasToDateGetter).format('DD/MM/YYYY'),

                }).catch((err) => {

                    this.error_message(err.response.data.message, 'IVA COMPRAS');

                }).finally(()=>this.spinner = false);

                if(xls_file){
                    const link = document.createElement('a');
                    link.href = xls_file.data;
                    document.body.appendChild(link);
                    link.click();
                }
            }
        },

        watch : {

            IvaComprasFromDateGetter(n)
            {
                this.from_date = this.$time(n).format("DD-MM-YYYY");
            },

            IvaComprasToDateGetter(n)
            {
                this.to_date = this.$time(n).format("DD-MM-YYYY");
            }

        },

        computed : {

            ...mapGetters([
                'IvaComprasFromDateGetter',
                'IvaComprasToDateGetter',
            ])
        }
    }
</script>