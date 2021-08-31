<template >
    <OrderWrapper
    >
        <template #card_header>
            <div class="reference">
                <small>
                    <strong>Tecla F9</strong>
                    <p>Para ingresar un producto a la lista.</p>
                </small>
                <small>
                    <strong>Tecla F10</strong>
                    <p>Cerrar.</p>
                </small>
                <small>
                    <strong>Tecla F7</strong>
                    <p>Para ingresar un nuevo cliente.</p>
                </small>
                <small>
                    <strong>Tecla F10</strong>
                    <p>Cerrar.</p>
                </small>
            </div>
            <Header />
        </template>
        <template #card_body>
            <div class="body-header-container">
                <div class="item-1">
                    <label >Productos</label>
                </div>
                <div class="item-2">
                    <date_delivery title="Fecha de Entrega" />
                </div>
            </div>
            <Body />
        </template>
        <template #card_footer>
            <NewOrderAddProductModal />
            <NewOrderAddCustomerModal />
            <Footer />
            <div class="text-center">
                <button @click="save_order"
                class="btn btn-primary">Guardar Pedido</button>
            </div>
        </template>
    </OrderWrapper>
</template>
<script>
    import Body from './Body/Body';
    import {mapGetters} from 'vuex';
    import Header from './Header/Header';
    import Footer from './Footer/Footer';
    import NewOrderAddProductModal from './Modal/NewOrderAddProductModal';
    import NewOrderAddCustomerModal from './Modal/NewOrderAddCustomerModal';

    import OrderWrapper from './../Base/OrderWrapper';
    import CustomerFunctional from './Header/customer-functional';
    import date_delivery from './Header/date-picker-delivery.vue';
import Vue from 'vue';
    export default {

        components : {
            OrderWrapper, 
            Header, 
            Body, 
            Footer, 
            date_delivery,
            NewOrderAddProductModal,
            NewOrderAddCustomerModal,
            CustomerFunctional,
        },

        methods : {

            addNewRowProduct(){
                this.$store.commit('NEW_ORDER_ADD_NEW_ROW_PRODUCT');
            },

            save_order(){
                console.log(this.NewOrderDataGetter);
            },

            open_modal(){
                let modal = document.getElementById('add_customer_modal');
                modal.modal('show');
            }
        },

        computed : {

            ...mapGetters([
                'NewOrderDataGetter'
            ])
        },

        mounted(){
            this.$store.dispatch('fetchIvas');

            window.addEventListener('keydown', (e) =>{
                if (e.ctrlKey && e.code == 'F9') {
                    this.open_modal()
                }
            })
        }
    }
</script>
<style scoped>
    .body-header-container{
        display: flex;
        padding: 1rem;
        justify-content : space-between;
    }
    .button-right {
        margin-left: auto;
    }
    .reference{
        display: flex;
    }
    small{
        display: flex;
    }
    small p{
        padding :0 1rem;
    }
</style>