export default {

    methods : {
        random_number(min, max) {
            return Math.random() * (max - min) + min;
        }
    }
}