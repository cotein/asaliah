<template>
    <div class="text-center">
        <!-- <p>
            {{data.model}}
        </p> -->
        <p>
            {{data.title}}
        </p>
        <div 
            style="margin-top:15px"
            class="label label-default"
            v-tooltip="'Calidad de la publicación'"
            >
            <span class="icon icon-heartbeat icon-fw"></span>
            {{Health}} %
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],
        data() {
            return {
                spinner : false,
                visits : 0,
            }
        },
    
        computed : {

            Health()
            {
                if (this.data.health == '') {
                    return '0';
                }
                return parseFloat(this.data.health) * 100;
            }
        }       
    }
</script>
<style  scoped>
.no-bullets {
  list-style-type: none; /* Remove bullets */
  padding: 0; /* Remove padding */
  margin: 0; /* Remove margins */
}
</style>