<template>
    <div class="row">
        <div class="col-md-12">
            <PedidoEditForm  :code="code"/>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import auth from './../../../mixins/auth';
import PedidoEditForm from './PedidoEditForm';
export default {
    
    props : ['code'],
    
    components : {
        PedidoEditForm
    },
    
    mixins : [auth],

    data() {
        return {
        }
    },


}
</script>

<style scoped>
    .top-15 {
        margin-top: 15px;
    }
</style>