let mix = require('laravel-mix');

// 停用通知
// mix.disableNotifications();
// 编译js&css
mix
.js('resources/assets/js/app.js', 'public/js')
.js('resources/assets/js/detail.js', 'public/js')
.sass('resources/assets/sass/app.scss', 'public/css')
.version();
