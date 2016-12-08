const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

elixir(function(mix) {
  './resources/assets/css/app.css',
    mix.styles([
      './node_modules/bootstrap/dist/css/bootstrap.css',
      './resources/assets/metisMenu/metisMenu.min.css',
      './resources/assets/css/sb-admin-2.css',
      './resources/assets/css/milton.css',
    ], 'public/css/adm.css'),
    mix.styles([
      './resources/assets/font-awesome/css/font-awesome.min.css'
    ], 'public/css/font-awesome.min.css'),
    mix.styles([
      './node_modules/bootstrap/dist/css/bootstrap.css',
      './resources/assets/metisMenu/metisMenu.min.css',
      './resources/assets/css/sb-admin-2.css',
      './resources/assets/css/milton.css'
    ], 'public/css/app.css'),
    mix.scripts([
      './node_modules/jquery/dist/jquery.js',
      './resources/assets/jquery/jquery.mask.min.js',
      './node_modules/bootstrap/dist/js/bootstrap.js',
      './node_modules/vue/dist/vue.js',
      './node_modules/vue-resource/dist/vue-resource.js',
      './resources/assets/metisMenu/metisMenu.min.js',
      './resources/assets/raphael/raphael.min.js',
      './resources/assets/js/sb-admin-2.js',
      './resources/assets/js/milton.js',
      './resources/assets/js/app.js',
    ], 'public/js/adm.js'),
    mix.scripts([
      './node_modules/vue/dist/vue.js',
      './node_modules/vue-resource/dist/vue-resource.js',
      './resources/assets/js/app.js',
    ], 'public/js/vueapp.js'),
    mix.scripts([
      './node_modules/jquery/dist/jquery.js',
      './resources/assets/jquery/jquery.mask.min.js',
      './node_modules/bootstrap/dist/js/bootstrap.js',
      './resources/assets/metisMenu/metisMenu.min.js',
      './resources/assets/js/sb-admin-2.js'
    ], 'public/js/app.js'),
    mix.version([
      "css/app.css",
      "js/app.js",
      "css/adm.css",
      "js/adm.js"
    ]);
});
