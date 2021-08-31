let company = document.head.querySelector('meta[name="company"]');

export default {

    computed: {
        
        Company(){
            return JSON.parse(company.content);
        }
    },

}