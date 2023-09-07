const mix = require('laravel-mix');

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

//Frontend
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
    'public/frontend/common-js/jquery-3.1.1.min.js',
    'public/frontend/common-js/tether.min.js',
    'public/frontend/common-js/bootstrap.js',
    'public/frontend/common-js/scripts.js',
],'public/js/front_script.js');

//---backend
mix.sass('resources/sass/backend.scss', 'public/css/backend.css');
mix.js('resources/js/backend.js', 'public/js/backend.js');
mix.scripts([
    'public/backend/assets/js/vendor.min.js',
    'public/backend/assets/libs/flatpickr/flatpickr.min.js',
    'public/backend/assets/libs/selectize/js/standalone/selectize.min.js',
    'public/backend/assets/js/app.min.js',
],'public/js/backend_script.js');

