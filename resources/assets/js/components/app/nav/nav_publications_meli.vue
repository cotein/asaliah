<template>
    <li class="sidenav-item has-subnav" :class="{active:'meli_publication' == parent_name, open:'meli_publication' == parent_name}">
        <a href="#" >
            <span class="icon icon-cloud-upload"></span>
            <span class="sidenav-label">Mercado Libre</span>
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
                    name : 'Lista de publicaciones',
                    url : '/mercadolibre/listado',
                    parent_name : 'meli_publication'
                },
                {
                    active : false,
                    name : 'Sincronizar publicaciones',
                    url : '/mercadolibre/sincronizar/cuenta',
                    parent_name : 'meli_publication'
                },
                {
                    active : false,
                    name : 'Publicar artículos',
                    url : '/publicacion/nueva',
                    parent_name : 'meli_publication'
                },
                {
                    active : false,
                    name : 'Órdenes de venta',
                    url : '/ordenes/listado',
                    parent_name : 'meli_publication'
                },
               
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
            sessionStorage.setItem('parent_name', 'meli_publication');

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
