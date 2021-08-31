<template>
    <div>
        <button  @click="active" class="label" :class="[(Status ?'activo':'inactivo'), (loading ? 'btn btn-primary spinner spinner-inverse spinner-sm' : '')]" >{{data.status}}</button>
    </div>
</template>

<script>
    import {Event} from 'vue-tables-2';
    import sleep from './../../../../mixins/sleep-mixin';
    import toast from './../../../../mixins/toast-mixin';
    export default {
        props: ['data', 'index'],
        mixins : [sleep, toast],
        data() {
            return {
                loading : false
            }
        },

        methods : {

            async active()
            {
                this.loading = true;
                this.sleep(this.random_ms(150,550));
                let payload = {
                    token : this.User.token,
                    user_id : this.data.user_id,
                    active : ! this.data.active
                }

                let user = await this.$store.dispatch('active', payload)
                    .catch((err)=> {
                        this.error_message(err.response.data.message, 'Activación de Usuario');
                    })
                    .finally(()=>this.loading=false);
                
                if (user) {
                    if (user.active) {
                        this.success_message('Usuario activado correctamente', 'Activación de Usuario');
                    }else{
                        this.info_message('Ahora el usuario está inactivo, ya no podrá ingresar al sistema' , 'Activación de Usuario');
                    }

                    Event.$emit('activate_user', user.data);
                }
            }
        },

        computed : {

            Status()
            {
                if (this.data.status == 'ACTIVO') {
                    return true;
                }

                if (this.data.status == 'INACTIVO') {
                    return false;
                }

            }
        },
       
    }
</script>

<style scoped>
    .inactivo{
        background-color: #E91808;
    }
    .activo{
        background-color: #4C8A48;
    }
    
</style>