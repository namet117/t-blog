const mix = require('laravel-mix');
const path = require('path');

// 停用通知
// mix.disableNotifications();
// 编译js&css
mix
  .setPublicPath(path.normalize('/public'))
  .js('resources/assets/js/app.js', 'js')
//  .js('resources/assets/js/detail.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'css');
