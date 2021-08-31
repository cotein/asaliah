<template>
    <div>
        <button 
            @click="goTo" 
            v-tooltip="'Editar cliente'"
            class="btn btn-default btn-icon sq-32" 
            type="button">
            <span class="icon icon-pencil"></span>
        </button>
    </div>
</template>
<script>
    import {mapGetters} from 'vuex';
    import auth from './../../../mixins/auth';
    export default {
        props: ['data', 'index'],
        data() {
            return {

            }
        },
        mixins : [auth],
        methods : {
            
            goTo()
            {
                let customer_id = this.data.id;
                window.location.href = "/clientes/edicion/" + customer_id;
            }
            
        },

        computed : {
            ...mapGetters([
                
            ])
        },

        

        mounted() {

        },
       
    }
</script>