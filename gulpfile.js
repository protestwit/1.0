var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
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
   mix.browserify('app.js');
   mix
       .copy('vendor/bower_components/bootstrap/dist/js/bootstrap.js','resources/assets/js/bootstrap/bootstrap.js')
       .copy('vendor/bower_components/bootstrap/less/','resources/assets/less/bootstrap/')
       .copy('vendor/bower_components/jquery','resources/assets/js/jquery')
       .less(
           'app.less',
           'public/css/app.css' //Styles that fall under the admin package
       )
       .scripts([
          'bootstrap/bootstrap.js',
          'app.js',
       ], 'public/js/app.js')
       .browserify('app.js')
       .version([
          'css/app.css',
       ])
});
