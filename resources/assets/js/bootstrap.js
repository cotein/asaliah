
window._ = require('lodash');


try {
    //window.$ = window.jQuery = require('jquery');

    //require('bootstrap-sass');
} catch (e) {}

window.axios = require('axios');
//window.axios.defaults.withCredentials = true;
//window.axios.defaults.headers.common['Access-Control-Allow-Credentials'] = true;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['crossDomain'] = true;
window.axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
//window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + '$2y$10$k3kn/ck2U6m2fxhgdira.OA80zKbZdxM3UbAlSwoRF4bLljMXFkv2';

axios.interceptors.request.use(req => {
    //console.log(`${req.method} ${req.url}`);
    // Important: request interceptors **must** return the request.
    return req;
});

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


axios.interceptors.response.use( (response) => {
        return response;
    }, (error) => {
        
        if(error.response.status == 401)
        {
            window.location.replace("/error/401");
        }
    
        throw error;
}); 

//import Echo from 'laravel-echo';

/* window.Pusher = require('pusher-js');

let key;

if (window.location.hostname == 'piamond.sytes.net' || window.location.hostname == 'localhost' || window.location.hostname == 'www.piamond.sytes.net') {
    key = 'c2585b7a074cc034f087';
}
if (window.location.hostname == 'srvtest.com.ar' || window.location.hostname == 'www.srvtest.com.ar' || window.location.hostname == 'www.srvtest.sytes.net' || window.location.hostname == 'srvtest.sytes.net') {
    key = 'd87e7715910de32f47e3';
}
console.log('#######################################################################');
console.log('process.env.MIX_PUSHER_APP_KEY: ' + key);
console.log('window.location.hostname: ' + window.location.hostname);
console.log('#######################################################################');
window.Echo = new Echo({
    broadcaster : 'pusher',
    key : key,
    cluster : 'us2',
    encrypted : true
}) */

