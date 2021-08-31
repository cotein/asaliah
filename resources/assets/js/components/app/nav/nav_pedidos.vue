<template>
    <li class="sidenav-item has-subnav" :class="{active:'pedidos' == parent_name, open:'pedidos' == parent_name}">
        <a href="#" >
            <span class="icon icon-file-text-o"></span>
            <span class="sidenav-label">Pedidos</span>
        </a>
        <ul class="sidenav level-2" v-for="(link, index) in links" :key="index">
            <li @click="getPathName(link.name)" :class="{active:path_name == link.name}" > 
                <a :href="link.url">
                    <span class="icon icon-circle-o fa-lg"></span>
                    <span class="sidenav-label">{{link.name}}</span>
                </a>
            </li>
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
                    name : 'Nuevo',
                    url : '/pedidos/clientes/nuevo',
                    parent_name : 'pedidos'
                },
                {
                    active : false,
                    name : 'Listado',
                    url : '/pedidos/clientes/listado',
                    parent_name : 'pedidos'
                },
/*                 {
                    active : false,
                    name : 'Impresión de comanda',
                    url : '/pedidos/clientes/comanda',
                    parent_name : 'pedidos'
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
            sessionStorage.setItem('parent_name', 'pedidos');
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
