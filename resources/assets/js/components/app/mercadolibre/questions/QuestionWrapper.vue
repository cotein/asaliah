<template>
    <ul class="nav navbar-nav">
        <li class="dropdown" >
            <!-- <button class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
            <button class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true">
                <span class="icon-with-child hidden-xs">
                    <span class="icon icon-envelope-o icon-lg"></span>
                    <span class="badge badge-danger badge-above right">{{quantity}}</span>
                </span>
                <span class="visible-xs-block">
                    <span class="icon icon-envelope icon-lg icon-fw"></span>
                    <span class="badge badge-danger pull-right">{{quantity}}</span>
                    Mensajes
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="dropdown-header">
                    <!-- <a class="dropdown-link" href="compose.html">New Message</a> -->
                    <h5 class="dropdown-heading">Consultas</h5>
                </div>
                <div class="dropdown-body">
                    <div class="custom-scrollable-area" style="position: relative; overflow: hidden; width: 100%; height: 100%;">
                        <div class="list-group list-group-divided custom-scrollbar" style="overflow: hidden; width: 100%; height: 100%;">
                            <question v-for="(question, index) in questions" :key="index" :question="question"/>
                        </div>
                        <div class="custom-scrollbar-gripper" style="background: rgb(0, 0, 0); width: 6px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 5px; height: 189.766px;">

                        </div>
                        <div class="custom-scrollbar-track" style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 5px;">

                        </div>
                    </div>
                </div>
                <div class="dropdown-footer">
                    <a class="dropdown-btn" href="#">Cerrar</a>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    import collect from 'collect.js';
    import Question from './Question';
    
    export default {
        props : ['questions'],
        
        data(){
            return {
                quantity : 0
            }
        },
        components : {
            Question
        },
        mounted(){
            setTimeout(() => {
                this.quantity =  collect(this.questions).count();
            }, 150);
        }
    }
</script>

<style lang="scss" scoped>
    
</style>