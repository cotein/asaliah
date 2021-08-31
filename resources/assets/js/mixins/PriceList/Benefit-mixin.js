export default {

    data(){
        return {
            benefit : null,
            spinner_up : false,
            spinner_down : false,
        }
    },

    computed : {

         Benefit(){
             return this.benefit;
         }
    },

    methods : {

        async update_benefit(type){
            
            if (type == 1) {
                
                (this.benefit == 0) ? 0 : this.benefit--;
                this.spinner_down = true;
            }

            if (type == 2) {
                
                this.benefit++;
                this.spinner_up = true;
            }

            this.sleep(50);

            let payload = {
                token : this.User.token,
                price_list_id : this.data.id,
                benefit : this.benefit,
            }

            let pl = await this.$store.dispatch('PriceListEditBenefit', payload)
                .catch(err => {
                    console.log(err, 'esaaaaaaaaaaa');
                }).finally(()=> {
                    this.spinner_up = false
                    this.spinner_down = false
                });
            
            if (pl) {
                console.log('funciona');
            }
        },
        
    },

    beforeMount(){
        this.benefit = parseFloat(this.data.benefit);
    }
    
}