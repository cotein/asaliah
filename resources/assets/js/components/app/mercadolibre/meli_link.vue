<template>
    <div>
        <a :href="Link()" class="btn btn-outline-primary btn-icon sq-32" type="button" target="_blank">
            <span class="icon icon-edit"></span>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            rowNumber(){
                return this.index;
            },
            Link(){
                return this.data.permalink
            }
        },
        computed : {
            
        },

        mounted() {
            console.log(this.data);
        },
    }
</script>
