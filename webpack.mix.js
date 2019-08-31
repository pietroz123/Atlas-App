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
    .options({
        processCssUrls: false
     });

// MDBootstrap
mix.styles([
    'resources/lib/mdbootstrap/css/bootstrap.css',
    'resources/lib/mdbootstrap/css/mdb.css',
    'resources/lib/mdbootstrap/css/datatables.css',
], 'public/css/mdbootstrap.css');
mix.scripts([
    'resources/lib/mdbootstrap/js/bootstrap.js',
    'resources/lib/mdbootstrap/js/mdb.js',
    'resources/lib/mdbootstrap/js/datatables.js',
], 'public/js/mdbootstrap.js');