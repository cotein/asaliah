<template>
    <div class="btn-group dropdown">
        <button class="btn dropdown-toggle" 
            data-toggle="dropdown" type="button" 
            aria-expanded="true"
            :class="(Status ?'activo':'inactivo')"
            style="color:white"
        >
            {{StatusText}}
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
            <li>
                <a href="#" :class="{'disabled' : (Status) ? true : false}"
                    @click.prevent="toggleStatus"
                >
                    <div class="media">
                        <div class="media-left">
                            <span class="icon icon-arrow-up"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">Activar</span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" :class="{'disabled' : (Status) ? false : true}"
                    @click.prevent="toggleStatus"
                >
                    <div class="media">
                        <div class="media-left">
                            <span class="icon icon-arrow-down"></span>
                        </div>
                        <div class="media-body">
                            <span class="d-b">Desactivar</span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    import toast from '../../../mixins/toast-mixin';
    import sleep_mixin from '../../../mixins/sleep-mixin';
    import ChangeCategory_mixin from './../../../mixins/Base-Button/ChangeCategory-mixin';
    
    export default {
        props: ['data', 'index'],

        mixins : [sleep_mixin, toast, ChangeCategory_mixin],
       
    }
</script>

<style scoped>
    .inactivo{
        background-color: #E91808;
    }
    .activo{
        background-color: #4C8A48;
    }
    .icon-arrow-up{
        color:  #4C8A48;
    }
    .icon-arrow-down{
        color:  #E91808;
    }
    a.disabled {
        pointer-events: none;
        color: #ccc;
    }
    
</style>