<template>
    <div>
        <multiselect placeholder="Elegir una opción" 
            track-by="name" label="name"
            v-model="rol"
            @select="rol_change"
            :disabled="!data.active"
            :appendToBody = "{optionsZindex: 999, hideScrollLevel: 5}"
            :loading="show_spinner"
            :options="RolesGetteer">
        </multiselect>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';
    import Multiselect from 'vue-multiselect';
    import sleep from './../../../../mixins/sleep-mixin';
    import toast from './../../../../mixins/toast-mixin';
    export default {
        props: ['data', 'index'],
        mixins : [sleep, toast],
        components : {
            Multiselect
        },

        data() {
            return {
                show_spinner : false,
                rol : null,
                old_rol : null
            }
        },

        watch : {

            rol(n, o)
            {
                this.old_rol = o;    
            }   
        },

        methods : {
            
            async rol_change(el)
            {
                this.show_spinner = true;
                this.sleep(this.random_ms(150,550));
                let payload = {
                    token : this.User.token,
                    user_id : this.data.user_id,
                    rol : el
                }

                let new_rol = await this.$store.dispatch('updateUserRol', payload)
                    .catch((err)=> {
                        this.error_message(err.response.data.message, 'Roles');
                        this.rol = this.old_rol;
                    })
                    .finally(()=>this.show_spinner=false);
                
                if (new_rol) {
                    this.success_message('Rol actualizado correctamente', 'Roles');
                }
            }
        },

        computed : {

            ...mapGetters([
                'RolesGetteer'
            ])
           
        },

        mounted() {
            this.rol = this.data.rol
        },
       
    }
</script>

<style scoped>
   
    
</style>