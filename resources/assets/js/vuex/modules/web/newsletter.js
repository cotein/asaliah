export default {
    state : {

    },

    actions : {
        saveEmail(context, email){
            return new Promise((resolve, reject) => {
                axios.post('/email/store', {'email' : email})
                .then((response) => {
                    resolve(response);
                    //$vm.$toast.info('Suscripción confirmada', 'Felicitaciones', $vm.InfoOk);    
                }, error => {
                    reject(error);
                });
            
            });
        },

       
    }
}