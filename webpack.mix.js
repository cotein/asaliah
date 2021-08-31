let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js');
   //.sass('resources/assets/sass/app.scss', 'public/css');

//mix.styles([
  //  'resources/assets/css/theme.css',

    /* Se usará luego para el templat de administración contable del sistema 
    'resources/assets/css/application.min.css',
    'resources/assets/css/compose.min.css',
    'resources/assets/css/contacts.min.css',
    'resources/assets/css/dashboard-3.min.css',
    'resources/assets/css/demo.min.css',
    'resources/assets/css/drive.min.css',
    'resources/assets/css/elephant.min.css',
    'resources/assets/css/errors.min.css',
    'resources/assets/css/inbox.min.css',
    'resources/assets/css/landing-page.min.css',
    'resources/assets/css/login-1.min.css',
    'resources/assets/css/login-2.min.css',
    'resources/assets/css/login-3.min.css',
    'resources/assets/css/mail.min.css',
    'resources/assets/css/messenger.min.css',
    'resources/assets/css/my-style.min.css',
    'resources/assets/css/product.min.css',
    'resources/assets/css/profile.min.css',
    'resources/assets/css/shopping-cart.min.css',
    'resources/assets/css/signup-1.min.css',
    'resources/assets/css/signup-2.min.css',
    'resources/assets/css/signup-3.min.css',
    'resources/assets/css/store.min.css',
    'resources/assets/css/vendor.min.css',
    'resources/assets/css/vue-multiselect.min.css', */
//], 'public/css/theme.css');

/* mix.scripts([
    "resources/assets/js/external/jquery/jquery.min.js",
    "resources/assets/js/external/bootstrap/js/bootstrap.min.js",
    "resources/assets/js/external/slick/slick.min.js",
    "resources/assets/js/external/panelmenu/panelmenu.js",
    "resources/assets/js/external/lazyLoad/lazyload.min.js",
    "js/main.js",
], 'public/js/all.js'); */