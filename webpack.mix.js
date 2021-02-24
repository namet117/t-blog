const mix = require('laravel-mix');


mix
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/detail.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .version();
