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

mix.less('resources/less/style.less', 'public/css/style.min.css')
  .sourceMaps()
  .webpackConfig({
    devtool: 'source-map'
  })
  .options({
    processCssUrls: false
  })
  .version();
