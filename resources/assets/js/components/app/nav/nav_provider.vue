<template>
    <li class="sidenav-item has-subnav" :class="{active:'providers' == parent_name, open:'providers' == parent_name}">
        <a href="#" >
            <span class="icon icon-file-text-o"></span>
            <span class="sidenav-label">Compras</span>
        </a>
        <ul class="sidenav level-2" v-for="(link, index) in links" :key="index">
            <li @click="getPathName(link.name)" :class="{active:path_name == link.name}" > <a :href="link.url"  v-text="link.name" ></a></li>
        </ul>
    </li>
</template>

<script>
import collect from 'collect.js';
export default {
    data() {
        return {
            active_li : false,
            open_li : false,
            path_name : false,
            parent_name : false,
            links : [
                {
                    active : false,
                    name : 'Alta de proveedores',
                    url : '/proveedores/nuevo',
                    parent_name : 'providers'
                },
                /* {
                    active : false,
                    name : 'Ingreso de comprobantes',
                    url : '/proveedores/comprobantes/ingreso',
                    parent_name : 'providers'
                },
                {
                    active : false,
                    name : 'Listado de comprobantes',
                    url : '/proveedores/comprobantes/listado',
                    parent_name : 'providers'
                },
                {
                    active : false,
                    name : 'Listado de órdenes de pago',
                    url : '/proveedores/ordenes/listado',
                    parent_name : 'providers'
                },
                {
                    active : false,
                    name : 'Listado de Recibos',
                    url : '/proveedores/recibos/listado',
                    parent_name : 'providers'
                }, */
            ]
        }
    },
    methods : {
        click_link(url){
            let $vm = this;
            let  links = collect($vm.links);
            $vm.active_li = true;
            links.each((l)=>{
                if (l.url == url) {
                    l.active = true;
                }
            })
        },
        click_open_li(){
            this.open_li = !this.open_li
        },
        getPathName(name){
            sessionStorage.setItem('path_name', name);
            sessionStorage.setItem('parent_name', 'providers');
        }
    },
    mounted(){
        this.path_name = sessionStorage.getItem('path_name');
        this.parent_name = sessionStorage.getItem('parent_name');
    }
}
</script>

<style>

</style>
