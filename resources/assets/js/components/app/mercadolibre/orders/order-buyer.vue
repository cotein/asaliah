<template>
    <div>
        <loading 
            :active.sync="Load" 
            color="#0469c7"
            :height="31"
            :width="31"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="media-middle media-left">
                        <span class="bg-gray sq-32 circle">
                        <span class="icon icon-user"></span>
                        </span>
                    </div>
                    <div class="media-middle media-body" v-if="HasBuyer">
                        <h5 class="media-heading">
                            Comprador
                        </h5>    
                        <h3 class="media-heading">
                            <span class="fw-l">{{GetBuyer.first_name}} {{GetBuyer.last_name}}</span>
                        </h3>
                        <p><small>Nick: {{GetBuyer.nickname}}</small></p>
                        <!-- <p><small>Email: {{GetBuyer.email}}</small></p> -->
                        <p><small>Teléfono: {{GetBuyer.phone.area_code}} - {{GetBuyer.phone.number}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import {mapGetters} from 'vuex';
    import Loading from 'vue-loading-overlay';
    export default {
        components : {
            Loading
        },
        data() {
            return {
                load : null,
                buyer : null
            }
        },
        methods : {
           
        },
        computed : {
            ...mapGetters(['GetBuyer', 'HasBuyer']),

            Load(){
                if ( ! (this.HasBuyer) ) {
                    return true;
                }
                return false
            }
        },
        mounted() {
            
        },

    }
</script>
