<template>
    <div class="modal fade "  
    ref="add_customer_modal"
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
                    <h4 class="modal-title" id="myModalLabel">Agregar Cliente</h4>
                </div>
                <div class="modal-body">
                    <label for="dni">DNI</label>
                    <input type="text" name="dni" id="dni">
                    <label for="name">NOMBRE</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="modal-footer">
                    <button type="button" 
                    @click="save"
                    id="b-ok" 
                    class="btn btn-primary" 
                    data-dismiss="modal">Agregar cliente</button>
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
    
    data() {
        return {
            dni : null,
            name : null,
            ok : false
        }
    },

    computed : {

        ...mapGetters([
            'ProductFromNewOrder'
        ])
    },

    methods : {

        cancel(){
            $(this.$refs.add_customer_modal).modal('hide');
            this.dni = null;
            this.name = null;
        },

        save(){

        },

        dosomething(){
            console.log('ppppppp');
        }
    },

    mounted(){
        
        window.addEventListener('keydown', (e) => {
            
            if (e.altKey == true && e.key == "g")
                console.log('seeee'); 

            if (e.key == 'F7') {
                $(this.$refs.add_customer_modal).modal('show');

                
            }

            if (e.key == 'F8') {
                $(this.$refs.add_customer_modal).modal('hide');
            }

            if (e.key == 'Escape') {
                //this.$store.commit('NEW_ORDER_DELETE_PRODUCT', this.ProductFromNewOrder.length -1)
            }
        });


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
    background-color: rgb(61, 143, 54);
    color: wheat
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