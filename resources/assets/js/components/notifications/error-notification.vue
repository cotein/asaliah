<template>
    
</template>

<script>
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.min.css'; 
export default {
    data() {
        return {
             notificationSystem: {
            options: {
                show: {
                    theme: "dark",
                    icon: "icon-person",
                    position: "topCenter",
                    progressBarColor: "rgb(0, 255, 184)",
                    
                    onOpening: function(instance, toast) {
                    console.info("callback abriu!");
                    },
                    onClosing: function(instance, toast, closedBy) {
                    console.info("closedBy: " + closedBy);
                    }
                },
                ballon: {
                    balloon: true,
                    position: "bottomCenter"
                },
                info: {
                    position: "bottomLeft"
                },
                success: {
                    position: "bottomRight"
                },
                warning: {
                    position: "topLeft"
                },
                error: {
                    position: "topRight"
                },
            
            }
        }
        }
    },
}
</script>

<style>

</style>
