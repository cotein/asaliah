<template>
    <li class="sidenav-item has-subnav" :class="{active:'arba' == parent_name, open:'arba' == parent_name}" >
        <a href="#" >
            <!-- <span class="sidenav-icon icon icon-gears"></span> -->
            <span class="sidenav-label">Categorías</span>
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
                    name : 'Ingresar nueva categoría',
                    url : '/empresa/categorias/nueva',
                    parent_name : 'category'
                },
                {
                    active : false,
                    name : 'Listado de categorías',
                    url : '/empresa/categorias/listado',
                    parent_name : 'category'
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
            sessionStorage.setItem('parent_name', 'category');
        }
    },
    mounted(){
        this.path_name = sessionStorage.getItem('path_name');
        this.parent_name = sessionStorage.getItem('parent_name');
        //sessionStorage.clear()
    }
}
</script>

<style>

</style>
