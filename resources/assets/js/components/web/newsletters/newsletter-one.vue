<template>
    <div class="tt-newsletter">
        <div class="tt-mobile-collapse">
            <h4 class="tt-collapse-title">
                SUSCRIBIRSE A NUESTROS ANUNCIOS
            </h4>
            <div class="tt-collapse-content">
                <p>
                    Suscríbete a nuestro email y sé el primero en conocer nuestras ofertas especiales!!!
                </p>
                <div id="newsletterform" class="form-inline form-default" method="post" novalidate="novalidate" action="#">
                    <div class="form-group">
                        <input type="text" v-model="email" name="email" class="form-control" placeholder="Ingresar tu e-mail">
                        <button @click="save()" type="submit" class="btn">SUSCRIBIRME</button>
                    </div>
                    <p class="help-block" v-if="RequiredEmail">El email es requerido</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import { required, email } from 'vuelidate/lib/validators';
export default {
    data(){
        return {
            email : null,
            submitted : false
        }
    },
    methods : {
       
        save(){
            this.submitted = true;
            this.$store.dispatch('saveEmail', this.email)
            .then(response => {
                    this.$toast.info('Suscripción confirmada', 'Felicitaciones', this.InfoOk);    
                    this.email = null;
                    this.submitted = false;
                }, error => {
                    this.$toast.error(error.response.data.errors.email[0], 'Error', this.ErrorNotification);    
                    this.email = null;
                    this.submitted = false;
                })
        }
       
    },
    validations() {
        return {
            email : {
                required,
                email
            }
        }
    },

    computed : {
        ...mapGetters([
            'InfoOk',
            'ErrorNotification'
        ]),

        RequiredEmail(){
            return (this.submitted && !this.$v.email.required);
        },
    },

    mounted(){
       
    
        
    }
}
</script>