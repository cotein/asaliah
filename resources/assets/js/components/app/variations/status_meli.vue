<template>
    <span :class="Class">{{Texto}}</span>
</template>

<script>
    import busVue from './../../../extras/eventBus';
    import {mapGetters} from 'vuex';
    export default {
        props: ['data', 'index', 'token'],
        data() {
            return {
                loading : false
            }
        },
        methods : {
            rowNumber(){
                return this.index;
            },
        },
        computed : {
            ...mapGetters([
                'MessageOk'
            ]),

            Texto(){
                if (this.data.variation_published_meli == false) {
                    return 'No publicado'
                } 
                return 'Publicado';
            },

            Class(){
                if (this.data.variation_published_meli == false) {
                    return 'label label-danger'
                } 
                return 'label label-success';
            },
        },

        mounted() {
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
</style>
