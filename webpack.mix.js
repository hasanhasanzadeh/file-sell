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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/back-style.scss', 'public/backend/css/back-style.css')
    .sass('resources/sass/front-style.scss', 'public/frontend/css/front-style.css')
    //.sass('resources/sass/font-awesome.scss', 'public/css/font-awesome.css')
    .browserSync('http://effect-success.local')
    .options({processCssUrls: false});
