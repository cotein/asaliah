<template>
    <div class="modal fade "  
        :ref="'name_' + name" 
        :id="name" 
        tabindex="-1" 
        role="dialog" 
        data-keyboard="false"
        data-backdrop="false"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <slot name="modal-header"></slot>
                </div>
                <div class="modal-body">
                    <slot name="modal-body"></slot>
                </div>
                <div class="modal-footer">
                    <slot name="modal-footer"></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
export default {

    props : {
        name : {
            type : String,
            required : true,
            default() {return ''}
        }
    },

    

}
</script>

<style>
.modal {
    position: absolute;
    top: -410px;
    left: -100px;
    z-index: 10040;
    width: 115%;
}
.modal-dialog{
    width: 80%;
}
div.modal-header{
    background-color: rgb(144, 220, 255);
    color: black
}
.modal-open .modal  {
    overflow: hidden;
}
#b-ok:focus {
    background-color: blue;
}
#b-cancel:focus {
    background-color: crimson;
}
</style>