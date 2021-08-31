<template>
    <ul class="sidenav level-1">
            <li class="sidenav-heading" v-if="rol.level >= 400 || rol.level == 100">Administrador del Sistema</li>

            <nav_admin v-if="rol.level >= 400"/>
            <!-- <li class="sidenav-heading" v-if="rol.level >= 400 || rol.level == 100">MercadoLibre</li>
            <nav_mercadopago v-if="rol.level >= 400"/> -->

            <!-- <nav_publications_meli v-if="rol.level >= 400" />

            <nav_shoes v-if="rol.level >= 400"/>


            <nav_orders v-if="rol.level >= 400" />
            <nav_variations v-if="rol.level >= 400" /> -->
                <nav_pedidos v-if="rol.level >= 400 || rol.level == 100" />
        
            <nav_categories v-if="rol.level >= 400 || rol.level == 100" />
            <nav_products v-if="rol.level >= 400 || rol.level == 100" />
            <nav_price_list v-if="rol.level >= 400 || rol.level == 100" />

            <!-- <nav_pedidos v-if="rol.level >= 400 || rol.level == 100" /> -->

        <!-- <li class="sidenav-heading" v-if="rol.level >= 400 || rol.level == 100">Clientes</li>
            <nav_customers v-if="rol.level >= 400 || rol.level == 100" />

            <nav_pedidos v-if="rol.level >= 400 || rol.level == 100" /> -->

        <li class="sidenav-heading" v-if="rol.level >= 400 || rol.level == 100">Proveedores</li>
            <nav_providers v-if="rol.level >= 400 || rol.level == 100" />

        <li class="sidenav-heading" v-if="rol.level >= 400">AFIP</li>
            <nav_company v-if="rol.level >= 400" />

        <li class="sidenav-heading" v-if="rol.level >= 400">ARBA</li>
            <nav_arba v-if="rol.level >= 400" />
            
    </ul>
</template>

<script>
    import nav_admin from './nav_admin';
    import auth from './../../../mixins/auth';
    export default {
        props : ['rol'],
        
        mixins : [auth],

        components : {
            nav_admin
        },

        data(){
            return {

            }
        },

        mounted(){
            console.log(this.rol);
        }
    }
</script>

<style lang="scss" scoped>

</style>