export default {

    methods : {
        getId(id){
            return this.sleep(1000).then(v => id);
        },

        sleep(ms) {
           return new Promise(resolve => setTimeout(resolve, ms));
        },

        random_ms(min, max)
        {
            return Math.random() * (max - min) + min;
        }
    }
}