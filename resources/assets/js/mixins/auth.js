let user = document.head.querySelector('meta[name="user"]');
let company = document.head.querySelector('meta[name="company"]');

export default {

    computed: {
        
        User(){
            return JSON.parse(user.content);
        },

        IsAuthenticated(){
            return !! user.content;
        },

        Guest(){
            return ! this.IsAuthenticated;
        },
        
        Company(){
            return JSON.parse(company.content);
        }
    },

    methods: {
        
        RedirectIfGuest(){
            if (this.Guest) return window.location.href = '/login'
        }

    },
}