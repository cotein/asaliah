<template>
    <div class="modal fade "  
    ref="product_modal"
    id="myModal" 
    tabindex="-1" 
    role="dialog" aria-labelledby="myModalLabel"
    data-keyboard="false"
    data-backdrop="false"
    >
    
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Producto</h4>
                </div>
                <div class="modal-body">
                    <RowProduct :index="ProductFromNewOrder.length -1"/>
                </div>
                <div class="modal-footer">
                    <button type="button" id="b-ok" class="btn btn-primary" data-dismiss="modal">Agregar producto</button>
                    <button @click="cancel"
                        type="button" id="b-cancel" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import RowProduct from '../Body/RowProduct.vue';
export default {

    components : {RowProduct},
    
    computed : {

        ...mapGetters([
            'ProductFromNewOrder'
        ])
    },

    methods : {

        cancel(){

            let flag = false;

            if (this.ProductFromNewOrder.length -1 == 0) flag = true;

            this.$store.commit('NEW_ORDER_DELETE_PRODUCT', this.ProductFromNewOrder.length -1)

            if(flag) this.$store.commit('NEW_ORDER_ADD_NEW_ROW_PRODUCT');

        }
    },

    mounted(){
        
        window.addEventListener('keydown', (e) => {

            if (e.key == 'F9') {
                $(this.$refs.product_modal).modal('show');

                if (this.ProductFromNewOrder[0].total > 0) {
                    this.$store.commit('NEW_ORDER_ADD_NEW_ROW_PRODUCT');
                }
                
            }

            if (e.key == 'F10') {
                $(this.$refs.product_modal).modal('hide');
            }

            if (e.key == 'Escape') {
                //this.$store.commit('NEW_ORDER_DELETE_PRODUCT', this.ProductFromNewOrder.length -1)
            }
        });

        $(this.$refs.product_modal).on('shown.bs.modal', function() {

            let name = 'div.multiselect.multiselect_product';
            let multiselect = document.querySelector(name);
            console.log(multiselect);
            console.log(multiselect);
            multiselect.focus(); 
        })

    }
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