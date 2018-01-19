let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.sass('resources/assets/sass/bootstrap.scss', 'public/private/css')
   .sass('resources/assets/sass/font-awesome.scss', 'public/private/css')
   .sass('resources/assets/sass/ionicons.scss', 'public/private/css');

mix.copy('public/vendor/adminlte/dist/css/AdminLTE.min.css', 'public/private/css/admin.css')
   .copy('public/vendor/adminlte/dist/css/skins/_all-skins.min.css', 'public/private/css/skins.css')
   .copy('public/vendor/adminlte/plugins/pace/pace.min.css', 'public/private/css/pace.css')
   .copy('public/vendor/backpack/pnotify/pnotify.custom.min.css', 'public/private/css/notify.css')
   .copy('public/vendor/backpack/backpack.base.css', 'public/private/css/base.css')
   .copy('public/vendor/backpack/overlays/backpack.bold.css', 'public/private/css/bold.css');

mix.copy('public/vendor/backpack/crud/css/crud.css', 'public/private/crud/css/crud.css')
   .copy('public/vendor/backpack/crud/css/form.css', 'public/private/crud/css/form.css');

mix.copy('public/vendor/backpack/pnotify/pnotify.custom.min.js', 'public/private/js/notify.js')
   .copy('public/vendor/adminlte/bootstrap/js/bootstrap.min.js', 'public/private/js/bootstrap.js')
   .copy('public/vendor/adminlte/plugins/pace/pace.min.js', 'public/private/js/pace.js')
   .copy('public/vendor/adminlte/plugins/slimScroll/jquery.slimscroll.min.js', 'public/private/js/slimscroll.js')
   .copy('public/vendor/adminlte/plugins/fastclick/fastclick.js', 'public/private/js/fastclick.js')
   .copy('public/vendor/adminlte/dist/js/app.min.js', 'public/private/js/admin.js');
