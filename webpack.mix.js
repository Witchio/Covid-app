const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/nav.scss", "public/css")
    .sass("resources/sass/homepage.scss", "public/css")
    .sass("resources/sass/admin-users.scss", "public/css")
    .sass("resources/sass/admin-posts.scss", "public/css")
    .sass("resources/sass/stats.scss", "public/css")
    .sass("resources/sass/profile.scss", "public/css")
    .sass("resources/sass/posts.scss", "public/css")
    .sass("resources/sass/add-post.scss", "public/css")
    .sass("resources/sass/post.scss", "public/css")
    .sass("resources/sass/reported-post.scss", "public/css")
    .sass("resources/sass/edit-post.scss", "public/css")
    .sass("resources/sass/login.scss", "public/css")
    .sass("resources/sass/register.scss", "public/css")
    .sass("resources/sass/home.scss", "public/css")
    .sass("resources/sass/password-reset.scss", "public/css")
    .sass("resources/sass/about-us.scss", "public/css");
