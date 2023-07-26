const mix = require("laravel-mix");

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

mix.js("src/js/app.js", "public/dist/js")
    .js("src/js/ckeditor-classic.js", "public/dist/js")
    .js("src/js/ckeditor-inline.js", "public/dist/js")
    .js("src/js/ckeditor-balloon.js", "public/dist/js")
    .js("src/js/ckeditor-balloon-block.js", "public/dist/js")
    .js("src/js/ckeditor-document.js", "public/dist/js")
    .css("dist/css/_app.css", "public/dist/css/app.css")
    .options({
        processCssUrls: false,
    })
    .copyDirectory("src/json", "public/dist/json")
    .copyDirectory("src/fonts", "public/dist/fonts")
    .copyDirectory("src/images", "public/dist/images");
