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

elixir(function(mix) {
    mix.styles([
        './resources/assets/bootstrap/css/bootstrap.min.css',
        './resources/assets/metisMenu/metisMenu.min.css',
        './resources/assets/css/sb-admin-2.css',
        './resources/assets/css/milton.css',
        './resources/assets/datatables-plugins/dataTables.bootstrap.css',
        './resources/assets/datatables-responsive/dataTables.responsive.css',
    ], 'public/css/admtables.css'),
    mix.styles([
        './resources/assets/bootstrap/css/bootstrap.min.css',
        './resources/assets/metisMenu/metisMenu.min.css',
        './resources/assets/css/sb-admin-2.css',
        './resources/assets/css/milton.css',
        './resources/assets/morrisjs/morris.css',
    ], 'public/css/adm.css'),
    mix.styles([
        './resources/assets/font-awesome/css/font-awesome.min.css',
    ], 'public/css/font-awesome.min.css')
    mix.styles([
        './resources/assets/bootstrap/css/bootstrap.min.css',
        './resources/assets/metisMenu/metisMenu.min.css',
        './resources/assets/css/sb-admin-2.css',
        './resources/assets/css/milton.css',
    ], 'public/css/app.css'),
    mix.scripts([
        './resources/assets/jquery/jquery.min.js',
        './resources/assets/bootstrap/js/bootstrap.min.js',
        './resources/assets/metisMenu/metisMenu.min.js',
        './resources/assets/datatables/js/jquery.dataTables.min.js',
        './resources/assets/datatables-plugins/dataTables.bootstrap.min.js',
        './resources/assets/datatables-responsive/dataTables.responsive.js',
        './resources/assets/js/sb-admin-2.js',
        './resources/assets/js/milton.js',
    ], 'public/js/admtables.js'),
    mix.scripts([
        './resources/assets/jquery/jquery.min.js',
        './resources/assets/bootstrap/js/bootstrap.min.js',
        './resources/assets/metisMenu/metisMenu.min.js',
        './resources/assets/raphael/raphael.min.js',
        './resources/assets/morrisjs/morris.min.js',
        './resources/assets/data/morris-data.js',
        './resources/assets/js/sb-admin-2.js',
    ], 'public/js/adm.js'),
    mix.scripts([
        './resources/assets/jquery/jquery.min.js',
        './resources/assets/bootstrap/js/bootstrap.min.js',
        './resources/assets/metisMenu/metisMenu.min.js',
        './resources/assets/js/sb-admin-2.js',
    ], 'public/js/app.js'),
    mix.version([
        "css/app.css",
        "js/app.js",
        "css/adm.css",
        "js/adm.js",
        "css/admtables.css",
        "js/admtables.js",
    ]);
});
