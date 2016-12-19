const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.styles([

    'bootstrap.min.css',
    'lightbox.min.css',
    'custom.min.css',

],'css/all.css');

mix.scripts([
    'bootstrap.min.js',
    'jquery.flot.js',
    'jquery.flot.pie.js',
    'jquery.flot.time.js',
    'jquery.flot.stack.js',
    'jquery.flot.resize.js',
    'lightbox.min.js',
    'custom.min.js',


],'public/js/all.js');

//mix.version(['css/all.css','js/all.js']);


});
