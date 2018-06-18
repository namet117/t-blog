let mix = require('laravel-mix');
const path = require('path');
const cleanWebpackPlugin = require('clean-webpack-plugin');
function resolve (dir) {
  return path.join(__dirname, '.', dir)
}
mix.webpackConfig({
    devtool: 'source-map',
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
          '@': resolve('resources/assets/js'),
        }
    },
    output: {
        publicPath: "/",
        chunkFilename: 'js/[name].[hash].chunk.js'
    },
    plugins: [
        new cleanWebpackPlugin(['js/*'], {
            root: path.resolve(__dirname, './public/'),
            dry: false,
            verbose: true,
        }),
    ]
});

// 停用通知
mix.disableNotifications();
// 编译js&css
mix
.js('resources/assets/js/app.js', 'public/js')
.sass('resources/assets/sass/app.scss', 'public/css')
.js('resources/assets/js/admin.js', 'public/js')
.version();
