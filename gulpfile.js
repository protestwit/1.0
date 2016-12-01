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
    mix.sass('app.scss');
    mix
        .copy('vendor/bower_components/bootstrap/dist/js/bootstrap.js','resources/assets/js/bootstrap/bootstrap.js')
        .less(
            'app.less',
            'public/css/app.css' //Styles that fall under the admin package
        )
        .scripts([
            'bootstrap/bootstrap.js',
        ], 'public/js/app.js')
        .version([
            'css/app.css',
            'js/app.js',
        ])
});
