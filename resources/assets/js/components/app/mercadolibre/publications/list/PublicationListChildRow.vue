<template>
    <div>
            <PublicationListAttribute :data="data" v-if="data.attributes" />
            <PublicationListVariation :data="data" v-if="data.variations" />
            <PublicationListWithOutVariation :data="data" v-else />
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import Datepicker from 'vuejs-datepicker';
    import {es} from 'vuejs-datepicker/dist/locale';
    import auth from './../../../../../mixins/auth';
    import toast_mixin from './../../../../../mixins/toast-mixin';
    import PublicationListAttribute from './PublicationListAttribute';
    import PublicationListVariation from './PublicationListVariation';
    import PublicationListWithOutVariation from './PublicationListWithOutVariation';
    export default {
        props: ['data'],
        components : {PublicationListAttribute, PublicationListVariation, PublicationListWithOutVariation},
        mixins : [auth, toast_mixin],
        data() {
            return {
                collapse : false
            }
        },

        methods : {

            collapse_card()
            {
                this.collapse = ! this.collapse
            }
            
        },

        computed : {

            
        },

        watch : {

            
        },

        mounted() {
            
        },
       
    }
</script>
<style>
    .my-input{
        background-color: white;
        border-style:solid !important;
        border-color:#5d5d5d !important;
        border-width:1px !important;
        text-align: center;
        width: 250px !important;
    }
    .my-success{
        background-color: #4C8A48;
    }
    .my-danger{
        background-color: #E91808;
    }
    .my-info {
        background-color: #555e7a;
    }
    .my-warning {
        background-color: #ff9c00;
    }
</style>