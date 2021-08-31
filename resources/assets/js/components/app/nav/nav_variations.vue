<template>
    <li class="sidenav-item has-subnav" :class="{active:'variations' == parent_name, open:'variations' == parent_name}" >
        <a href="#" >
            <span class="sidenav-icon icon icon-works">g</span>
            <span class="sidenav-label">Variantes de artículos</span>
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
                    name : 'Ingreso de variantes',
                    url : '/variacion/nueva',
                    parent_name : 'variations'
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
            sessionStorage.setItem('parent_name', 'variations');

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
