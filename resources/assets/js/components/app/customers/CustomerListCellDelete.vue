<template>
    <div>
        <button 
            @click="delete_customer" 
            v-tooltip="'Eliminar cliente'"
            class="btn btn-outline-danger btn-icon sq-32"
            type="button">
            <span class="icon icon-trash"></span>
        </button>
    </div>
</template>
<script>
    import {mapGetters} from 'vuex';
    import auth from './../../../mixins/auth';
    export default {
        props: ['data', 'index'],
        mixins : [auth],
        methods : {
            
            delete_customer()
            {
                
            }
            
        },
    }
</script>