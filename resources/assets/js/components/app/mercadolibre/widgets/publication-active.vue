<template>
    <div class="col-md-6 col-lg-3 col-lg-push-0">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="media">
                <div class="media-middle media-left">
                    <span class="bg-primary-inverse circle sq-48">
                    <span class="icon icon-gift"></span>
                    </span>
                </div>
                <div class="media-middle media-body">
                    <h6 class="media-heading">Publicaciones Activas</h6>
                    <h3 class="media-heading">
                        <span class="fw-l">{{PublicationsTotal}}</span>
                    </h3>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
export default {
    props : ['token'],
    data() {
        return {
            count : 0
        }
    },

    methods: {
         
    },

    computed: {
        ...mapGetters([
            'PublicationsTotal',
        ]),

       
    },

    mounted() {
        let $vm = this;

       
    },
}
</script>

<style>

</style>