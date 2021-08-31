<template>
    <div>
        <a @click.prevent="www()" href="#" class="btn btn-outline-primary btn-icon sq-32" type="button" target="_blank">
            <span class="icon icon-edit"></span>
        </a>
    </div>
</template>

<script>
    export default {
        props: ['data', 'index'],
       
        methods : {
            www(){
                console.log('ppppppppppppppppp');
            }
        },
        computed : {
            
        },

        mounted() {
            console.log(this.data);
        },
    }
</script>
