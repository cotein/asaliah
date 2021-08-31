<template>
    <a class="list-group-item" @click.stop="">
        <div class="notification">
            <div class="notification-media">
                <img class="circle" width="36" height="36" src="/images/default-user.png" alt="Ususrio">
            </div>
            <div class="notification-content">
                <small class="notification-timestamp">{{question.date_created | moment().fromNow()}}</small>
                <!-- <h5 class="notification-heading">Daniel Taylor</h5> -->
                <p class="notification-text">
                    <small class="">{{question.text}}</small>
                </p>
                <button 
                    v-if="display_button_responder"
                    style="margin-top:10px"
                    class="btn-xs btn-primary"
                    @click="open_input"
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : open_input_spinner}"
                    >Responder
                </button>
                <fade-transition :duration="500">
                    <div v-if="display_input">
                        <textarea 
                            class="form-control" 
                            rows="3" 
                            :maxlength="max"
                            v-model="answer" 
                            style="resize:none"
                            ></textarea>
                            <div style="margin-top:5px">
                                <span >

                                    <button 
                                        class="btn-xs my-green-button"
                                        type="button"
                                        @click="answer_question"
                                        :class="{'btn btn-default spinner spinner-inverse spinner-sm' : sending_answer}"
                                        >Responder</button>
                                    <button 
                                        class="btn-xs btn-default" 
                                        type="button"
                                        @click="initial_status"
                                        :class="{'btn btn-default spinner spinner-inverse spinner-sm' : display_initial_status}"
                                        >Cancelar
                                    </button>
                                    <span class="pull-right">{{(max - answer.length)}}</span>
                                </span>
                            </div>
                    </div>
                </fade-transition>
            </div>
        </div>
    </a>
</template>

<script>
    import auth from './../../../../mixins/auth';
    import {FadeTransition} from 'vue2-transitions';
    import sleep from './../../../../mixins/sleep-mixin';
    import toast_mixin from './../../../../mixins/toast-mixin';
    export default {
        props : ['question'],
        mixins : [sleep, auth, toast_mixin],
        components : {
            FadeTransition
        },
        data(){
            return {
                open_input_spinner : false,
                display_input : false,
                display_button_responder : true,
                display_initial_status : false,
                answer : '',
                max : 200,
                sending_answer : false
            }
        },

        methods : {

            open_input(){
                
                this.open_input_spinner = true;
                
                setTimeout(() => {
                    this.open_input_spinner = false;
                    this.display_button_responder = false;
                    this.display_input = true;
                }, 350);

            },

            initial_status(){
                this.display_initial_status = true;
                setTimeout(() => {
                    this.open_input_spinner = false;
                    this.display_input = false;
                    this.display_button_responder = true;
                    this.display_initial_status = false;
                    this.answer = '';
                }, 150);
                
            },

            async answer_question()
            {
                this.sending_answer = true;

                let payload = {
                    token : this.User.token,
                    question_id : this.question.meli_id,
                    text : this.answer,
                }

                let response = await this.$store.dispatch('answer_question', payload).catch((error)=>{
                    this.error_message('Error', 'Se ha producido un error vualva a intentarlo')
                }).finally(()=>{
                    this.initial_status();
                    this.sending_answer = false;
                });

                if (response) {
                    this.success_message('Se respondió correctamente', 'Respuesta', 4000, 'topRight');
                }
            }
            
        },

        beforeMount(){
            this.$moment.locale('es');
        }
    }
</script>

<style scoped>
.my-green-button{
    background-color:#008000;
    color: white;
}

</style>