let user = document.head.querySelector('meta[name="user"]');
let company = document.head.querySelector('meta[name="company"]');

export default {

    methods: {
        
        success_message(first, second, time = 4000, position='bottomRight')
        {
            this.$toast.success(first, second , {
                timeOut : time,
                resetOnHover: true,
                titleColor : 'black',
                messageColor : 'black',
                theme: 'dark',
                icon: 'icon icon-check',
                iconColor : 'black',
                position: position,
                progressBarColor: 'rgb(0, 255, 184)',
                pauseOnHover : false,
            });   
        },

        error_message(first, second, time = 4000, position='bottomRight')
        {
            this.$toast.error(first, second, {
                timeOut : time,
                resetOnHover: true,
                titleColor : 'black',
                messageColor : 'black',
                theme: 'dark',
                icon: 'icon icon-exclamation-triangle',
                iconColor : 'black',
                position: position,
                progressBarColor: 'red',
                pauseOnHover : false,
            });   
        },

        info_message(first, second, time = 4000, position='bottomRight')
        {
            this.$toast.info(first, second, {
                timeOut : time,
                resetOnHover: true,
                icon: 'icon icon-exclamation',
                iconColor : 'black',
                position: position,
                /* buttons: [
                    ['<button><b>Confirmar</b></button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
             
                    }, true],
                    
                ], */
            });   
        },

        question_message(first, second, time = 4000, position='bottomCenter')
        {
            this.$toast.info(first, second, {
                timeOut : time,
                color : 'yellow',
                resetOnHover: true,
                icon: 'icon icon-exclamation',
                iconColor : 'black',
                position: position,
                /* buttons: [
                    ['<button><b>Confirmar</b></button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
             
                    }, true],
                    
                ], */
            });   
        },

        


    },
}