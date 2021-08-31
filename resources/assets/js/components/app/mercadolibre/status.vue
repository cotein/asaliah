<template>
    <div class="text-center">
        <div v-if="data.status == 'under_review' ">
            <span class="label label-danger">BAJO REVISION</span>
        </div >
        <div class="btn-group dropdown" v-else>
            <button class="btn dropdown-toggle" :class="Class" data-toggle="dropdown" type="button" aria-expanded="false" :disabled="loading">
                    {{Status}}
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="#" @click.prevent="changeStatus(Objeto('active'))" :class="{isDisabled : Status == 'Activo'}">
                        <div class="media">
                            <div class="media-left">
                                <span style="color:green" class="icon icon-cloud-upload icon-lg icon-fw text-default"></span>
                            </div>
                            <div class="media-body">
                                <span class="d-b">Activar publicación</span>
                                <small>Reactiva un artículo previamente pausado</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" @click.prevent="changeStatus(Objeto('paused'))" :class="{isDisabled : Status == 'Pausado'}">
                        <div class="media">
                            <div class="media-left">
                                <span style="color:blue" class="icon icon-minus-circle icon-lg icon-fw text-default"></span>
                            </div>
                            <div class="media-body">
                                <span class="d-b">Pausar publicación</span>
                                <small>
                                    <p>Una vez pausado, no será visible para otros usuarios de Mercado Libre,</p> 
                                    <p>pero no se cerrará y se podrá reactivar más tarde.</p>
                                </small>
                            </div>
                        </div>
                    </a>
                </li>

                <!-- <li>
                    <a href="#" @click.prevent="changeStatus(Objeto('closed'))" :class="{isDisabled : Status == 'Cerrado'}">
                        <div class="media">
                            <div class="media-left">
                                <span style="color:red" class="icon icon-ban icon-lg icon-fw text-default"></span>
                            </div>
                            <div class="media-body">
                                <span class="d-b">Finaliza tu publicación.</span>
                                <small>Una vez cerrado, no se puede volver a activar</small>
                            </div>
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
        <p style="margin-top:15px">
            <a class="btn btn-outline-danger btn-icon sq-32" 
                :href="data.permalink"
                v-tooltip="'Ver en Mercado Libre'"
                target="_blank">
                <span class="icon icon-link"></span>
            </a>
        </p>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import auth from './../../../mixins/auth';
    import busVue from './../../../extras/eventBus';
    export default {
        props: ['data', 'index', 'token'],
        mixins : [auth],
        data() {
            return {
                loading : false
            }
        },
        methods : {
            rowNumber(){
                return this.index;
            },

            changeStatus(status){
                let $vm = this;
                
                $vm.loading = true;

                setTimeout(() => {
                    $vm.$store.dispatch('changePublicationStatus', status)
                    .then((response) => {
                        $vm.data.status = response.data.body.status;
                        $vm.loading = false;
                        $vm.data = Object.assign({}, $vm.data);
                        busVue.$emit('change_status', $vm.data);
                        this.$toast.success('Estado de la publicación ' + $vm.data.id + ' ha cambiado de estado.', $vm.Status, this.MessageOk);
                    }).catch((err) => {
                        $vm.loading = false;
                    });
                }, 500);
                
            },

            Objeto(estado){
                return {
                    publication_id : this.data.id, 
                    status : estado, 
                    token : this.User.token
                }
            }
        },
        computed : {
            ...mapGetters([
                'MessageOk'
            ]),

            Status(){
                if (this.data.status == 'paused') {
                    return 'Pausado'
                } 
                if (this.data.status == 'closed') {
                    return 'Cerrado'
                } 
                if (this.data.status == 'active') {
                    return 'Activo'
                } 
            },

            Class(){
                if (this.loading) {
                    return 'spinner spinner-inverse spinner-sm';
                }
                if (this.data.status == 'paused') {
                    return 'btn-primary'
                } 
                if (this.data.status == 'closed') {
                    return 'btn-danger'
                } 
                if (this.data.status == 'active') {
                    return 'btn-success'
                } 
            },
        },

        mounted() {
            setTimeout(() => {
                //this.token = this.$parent.$parent.$options.propsData.token
            }, 100);
        },
    }
</script>
<style scoped>
    .isDisabled {
        color: currentColor;
        cursor: not-allowed;
        opacity: 0.5;
        text-decoration: none;
        pointer-events: none;
    }
    .btn-success{
        background-color: #008000 !important;
    }
</style>
