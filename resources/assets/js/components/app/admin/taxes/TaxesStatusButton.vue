<template>
    <div>
        <button @click="set_active" class="label"  :class="[(Status ?'activo':'pausado'), (loading ? 'btn btn-primary spinner spinner-inverse spinner-sm' : '')]">{{StatusName}}</button>
    </div>
</template>

<script>
    const ACTIVO = 1;
    const PAUSADO = 3;
    import {Event} from 'vue-tables-2';
    import sleep from './../../../../mixins/sleep-mixin';
    import toast from './../../../../mixins/toast-mixin';
    export default {
        props: ['data', 'index'],
        mixins : [sleep, toast],
        data() {
            return {
                loading : false,
                status : null,
                status_name : null,
            }
        },

        methods : {

            async set_active()
            {
                this.loading = true;
                this.sleep(this.random_ms(150,550));
                let payload = {
                    token : this.User.token,
                    tax_id : this.data.id,
                    active : ! this.status
                }

                let tax = await this.$store.dispatch('set_active', payload)
                    .catch((err)=> {
                        this.error_message(err.response.data.message, 'Impuestos');
                    })
                    .finally(()=>this.loading=false);
                
                if (tax) {
                    
                    this.status = tax.status;
                    this.status_name = tax.status_name;

                    if (tax.status) {
                        this.success_message('Impuesto habilitado', 'Impuestos');
                    }else{
                        this.info_message('Impuesto inhabilitado' , 'Impuestos');
                    }

                    Event.$emit('tax_set_active', tax);
                }
            }
        },

        computed : {

            Status()
            {
                return this.status;
            },

            StatusName()
            {
                return this.status_name;
            }
        },

        watch : {

            status(n)
            {
                console.log(n);
            }
        },

        mounted(){

            this.status = this.data.status;
            this.status_name = this.data.status_name;
        }
       
    }
</script>

<style scoped>
    .pausado{
        background-color: #E91808;
    }
    .activo{
        background-color: #4C8A48;
    }
    
</style>