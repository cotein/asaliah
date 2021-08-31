<template>
    <div class="card"  v-if="MeliMessagesGetter"
        :aria-expanded="(open_panel)?'true':'false'" 
        :class="{'card-collapse': open_panel==false}">
        <div class="card-header btn-default">
            <div class="card-actions">
                    <button type="button" 
                        class="btn btn-default btn-xs"
                        @click="open_panel=!open_panel" 
                        :title="(open_panel)?'Cerrar':'Abrir'" 
                        :aria-expanded="(open_panel)?'true':'false'">
                        <strong>{{(open_panel)?'Cerrar Panel':'Abrir Panel'}}</strong>
                        </button>
                        
                  </div>
            <div class="col-md-4" id="scroll-to-pos-venta-sale">
                <strong>Mensajes posVenta</strong>
            </div>
        </div>
        <collapse-transition  :duration="1100" :delay="200">
            <div class="card-body"  :style="{'display':(open_panel)?'block':'none'}">
                <ConversationWrapper />
            </div>
        </collapse-transition>
        <div class="card-footer" :style="{'display':(open_panel)?'block':'none'}">
            <div class="input-group">
                <textarea 
                            class="form-control" 
                            rows="3" 
                            v-model="message" 
                            style="resize:none"
                            ></textarea>
                <span class="input-group-btn" >
                    <button class="btn btn-primary btn-sm" 
                    style="margin-left:10px"
                    :class="{'spinner spinner-inverse spinner-sm' : spinner}"
                    @click="publish_message">
                        Enviar
                    </button>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import auth from './../../../mixins/auth';
import { CollapseTransition } from 'vue2-transitions';
import sleep_mixin from './../../../mixins/sleep-mixin';
import toast_mixin from './../../../mixins/toast-mixin';
import ConversationWrapper from './../mercadolibre/messages/ConversationWrapper';
    export default {
        props : ['data'],

        mixins : [auth, sleep_mixin, toast_mixin],

        components : {CollapseTransition, ConversationWrapper},

        data(){
            return {
                open_panel : false,
                message : '',
                spinner : false,
            }
        },

        computed : {
            ...mapGetters(
                [
                    'MeliMessagesGetter'
                ]
            ),
        },

        methods : {

            async publish_message()
            {
                this.spinner = true;

                this.sleep(500);

                let payload = {
                    token : this.User.token,
                    pack_id : this.data.message_pack_id,
                    seller : this.data.message_seller_id,
                    from_user_id : this.data.message_seller_id,
                    from_email : this.data.message_seller_email,
                    to_user_id : this.data.message_to_user,
                    message : this.message,
                }

                let response = await this.$store.dispatch('publish_message', payload).
                    catch((err) => {
                        console.log(err);
                    }).finally(()=>{
                        this.spinner = false;
                        this.message = '';
                    })

                if (response) {
                    
                    this.success_message('Mensaje enviado correctamente', 'Mensajes');
                    
                }
            }
        }
    }
</script>

<style lang="scss" scoped>

</style>