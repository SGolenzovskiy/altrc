var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    var bpath = 'node_modules/bootstrap-sass/assets';
    var dragulaPath = 'resources/assets/vendor/dragula.js';
    var jqueryPath = 'resources/assets/vendor/jquery';

    mix.sass('app.scss')
        .copy(jqueryPath + '/dist/jquery.min.js', 'public/js')
        .copy(bpath + '/fonts', 'public/fonts')
        .copy(bpath + '/javascripts/bootstrap.min.js', 'public/js')
        .copy(dragulaPath + '/dist/dragula.min.css', 'public/css')
        .copy(dragulaPath + '/dist/dragula.min.js', 'public/js')
        .copy('resources/assets/vendor/slidereveal/dist/jquery.slidereveal.min.js', 'public/js')
        .copy('resources/assets/vendor/clipboard/dist/clipboard.min.js', 'public/js');

});
