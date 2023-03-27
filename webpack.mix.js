const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js('resources/js/admin/index.js', 'public/js/admin.min.js')
  .react()
  .js('resources/js/auth/auth.js', 'public/js/auth.min.js')
  .react()
  .less('resources/less/style.less', 'public/css/style.min.css')
  .sourceMaps()
  .webpackConfig({
    devtool: 'source-map'
  })
  .options({
    processCssUrls: false
  })
  .version();
