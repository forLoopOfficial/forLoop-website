
const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss')
       .scripts([
           'bootstrap-tab.js',
           'ie10-viewport-bug-workaround.js',
           'custom.js'
         ]);

    //admin static resources
    mix.sass('custom.scss', 'public/css/admin-app.css')
        .sass('daterangepicker.scss')
        .webpack('admin-main.js')
        .styles([
          "./node_modules/bootstrap/dist/css/bootstrap.min.css",
          "./node_modules/font-awesome/css/font-awesome.min.css",
          "./node_modules/nprogress/nprogress.css"
        ], 'public/css/admin-all.css')
        .copy('node_modules/font-awesome/fonts', 'public/fonts')
        .scripts([
          "smartresize.js",
          "admin-custom.js"
        ], 'public/js/admin-custom.js')
        .scripts([
          "./node_modules/jquery/dist/jquery.js",
          "./node_modules/bootstrap/dist/js/bootstrap.min.js",
          "./node_modules/fastclick/lib/fastclick.js",
          "./node_modules/nprogress/nprogress.js"
        ], 'public/js/admin-all.js');
});
