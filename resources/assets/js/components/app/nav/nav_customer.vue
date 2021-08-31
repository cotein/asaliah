<template>
    <li class="sidenav-item has-subnav" :class="{active:'customers' == parent_name, open:'customers' == parent_name}">
        <a href="#" >
            <span class="icon icon-file-text-o"></span>
            <span class="sidenav-label">Ventas</span>
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
                    name : 'Alta de Clientes',
                    url : '/clientes/nuevo',
                    parent_name : 'customers'
                },
                {
                    active : false,
                    name : 'Generar comprobante',
                    url : '/clientes/generar/comprobantes',
                    parent_name : 'customers'
                },

                {
                    active : false,
                    name : 'Listado de comprobantes',
                    url : '/clientes/listado/comprobantes',
                    parent_name : 'customers'
                },

                {
                    active : false,
                    name : 'Listado de Clientes',
                    url : '/clientes/listado',
                    parent_name : 'customers'
                },
                {
                    active : false,
                    name : 'Cancelación de comprobantes',
                    url : '/clientes/generar/recibo',
                    parent_name : 'customers'
                },
                {
                    active : false,
                    name : 'Listado de recibos',
                    url : '/clientes/recibo/listado',
                    parent_name : 'customers'
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
            sessionStorage.setItem('parent_name', 'customers');
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
