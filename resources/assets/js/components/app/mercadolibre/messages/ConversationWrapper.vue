<template>
    <div class="timeline">
        <div class="timeline-item" v-for="(message, index) in MeliMessagesGetter" :key="index">
            <div class="timeline-segment">
                <avatar :username="is_object(message.from).name"></avatar>
                <!-- <img class="timeline-media img-circle" width="35" height="35" src="/images/default-user.png"  :alt="is_object(message.from).name"> -->
            </div>
            <div class="timeline-content">
                <div class="timeline-row">
                    <span><strong 
                        :class="(is_object(message.from).user_id == '17220993') ? 'text-danger' : 'text-primary'"
                        >{{is_object(message.from).name}}</strong>
                    </span>
                    <small>{{is_object(message).created_at | moment().fromNow()}}</small>
                </div>
                <div class="timeline-row">
                    {{is_object(message.text).plain}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Avatar from 'vue-avatar';
    import Conversation from './Conversation';
    import ConversationContentHeader from './ConversationContentHeader';
    import ConversationWellcome from './ConversationWellcome';
    import ConversationFooter from './ConversationFooter';
    import ConversationFile from './ConversationFile';
    import {mapGetters} from 'vuex';
    export default {
        components : {
            ConversationContentHeader, Conversation, ConversationWellcome,ConversationFooter,
            ConversationFile, Avatar
        },
        data(){
            return {

            }
        },

        computed : {

            ...mapGetters([
                'MeliMessagesGetter'
            ]),
        },

        methods : {

            is_object(data)
            {
                if((typeof data) == 'string')
                {
                    let obj = JSON.parse(data);

                    return obj;
                }

                return data;
            },
        },

        beforeMount(){
            this.$moment.locale('es');
        }


    }
</script>

<style scoped>
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>