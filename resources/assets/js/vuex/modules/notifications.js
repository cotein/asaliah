
export default {
    state : {
        uploadVariationOK : {
            timeOut : 4000,
            color : 'green',
            titleColor : 'black',
            messageColor : 'black',
            theme: 'dark',
            icon: 'icon icon-check',
            iconColor : 'black',
            position: 'bottomRight',
            progressBarColor: 'rgb(0, 255, 184)',
        },

        existVariation : {
            timeOut : 4000,
            color : 'red',
            titleColor : 'black',
            messageColor : 'black',
            theme: 'dark',
            icon: 'icon icon-ban',
            iconColor : 'black',
            position: 'bottomRight',
        },

        errorNotification : {
            timeOut : 6000,
            color : 'red',
            titleColor : 'black',
            messageColor : 'black',
            theme: 'dark',
            icon: 'icon icon-ban',
            iconColor : 'black',
            position: 'bottomRight',
        },

        messageOk : {
            timeOut : 4000,
            color : 'green',
            titleColor : 'black',
            messageColor : 'black',
            theme: 'dark',
            icon: 'icon icon-check',
            iconColor : 'black',
            position: 'bottomRight',
            progressBarColor: 'rgb(0, 255, 184)',
        },

        infoOK : {
            timeOut : 4000,
            color : 'white',
            titleColor : 'black',
            messageColor : 'black',
            theme: 'light',
            icon: 'icon icon-thumbs-o-up',
            iconColor : 'black',
            position: 'bottomRight',
            progressBarColor: 'rgb(0, 255, 184)',
        }


    },
    getters : {
        UploadVariationOK(state){
            return state.uploadVariationOK;
        },

        ExistVariationTrue(state){
            return state.existVariation;
        },

        MessageOk(state){
            return state.messageOk;
        },

        InfoOk(state){
            return state.infoOK;
        },

        ErrorNotification(state){
            return state.errorNotification
        }
    }



}