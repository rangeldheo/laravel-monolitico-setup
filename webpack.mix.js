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
    .copy('vendor/almasaeed2010/adminlte/plugins', 'public/admin_lte/plugins')
    .copy('vendor/almasaeed2010/adminlte/dist', 'public/admin_lte')
    .sass('resources/sass/app.scss', 'public/css');
