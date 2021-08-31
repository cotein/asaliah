<template>
    <div class="btn-group">
        <button 
        @click="get_billing_info"
            v-tooltip.right-end="{content : 'Actualizar datos del cliente...'}"
            class="btn btn-outline-primary btn-icon sq-32"  type="button" >
            <span class="icon icon-ellipsis-v"></span>
        </button>
        <!-- <button 
            v-tooltip.right-end="{content : 'Más...'}"
            class="btn btn-outline-primary btn-icon sq-32 dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="true">
            <span class="icon icon-ellipsis-v"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right">
            <li>
                <a href="#" @click.prevent="">
                    <div class="media">
                        <div class="media-right">
                            <span class="icon icon-user-plus icon-lg icon-fw"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">Consultar datos de facturación</span>
                            <small>People can sync and edit.</small>
                        </div>
                    </div>
                </a>
            </li>
        </ul> -->
    </div>
</template>

<script>
    import auth from './../../../../mixins/auth';
    import toast from './../../../../mixins/toast-mixin';
    export default {
        props : ['data'],
        mixins : [auth, toast],
        data(){
            return {
                billing_info : null
            }
        },

        methods : {

            async get_billing_info(){

                let payload = {
                    token : this.User.token,
                    order_id : this.data.meli_id
                }

                let billing_info = await this.$store.dispatch('get_billing_info', payload)
                .catch((err) => {
                    console.log(err.response.data);
                });

                if (billing_info) {
                    this.billing_info = billing_info;

                    let customer = this.customer_update_data_from_billing_info();

                    this.success_message('El cliente se actualizó correctamente.', 'Datos del Cliente');
                }

            },

            async customer_update_data_from_billing_info()
            {
                let payload = {
                    token : this.User.token,
                    meli_nick : this.data.customer.trim(),
                    order_id : this.data.meli_id,
                    customer_id : this.data.customer_id,
                    billing_info : this.billing_info
                }

                await this.$store.dispatch('customer_update_data_from_billing_info', payload)
                .then((customer) => {
                    console.log('customer');
                    console.log(customer);
                    return customer;
                })
                .catch((err) => {
                    console.log('/api/customer/customer_update_data_from_billing_info');
                    console.log(err.response.data);
                })

            }


        },

    }
</script>
