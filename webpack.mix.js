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

mix.scripts(
['resources/js/assets/vendor/aos/aos.js',
 'resources/js/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
 'resources/js/assets/vendor/glightbox/js/glightbox.min.js',
 'resources/js/assets/vendor/isotope-layout/isotope.pkgd.min.js',
 'resources/js/assets/vendor/php-email-form/validate.js',
 'resources/js/assets/vendor/purecounter/purecounter.js',
 'resources/js/assets/vendor/swiper/swiper-bundle.min.js',
 'resources/js/assets/js/main.js'
],'public/front/js/main.js');
mix.styles(
['resources/css/assets/vendor/aos/aos.css',
 'resources/css/assets/vendor/bootstrap/css/bootstrap.min.css',
 'resources/css/assets/vendor/bootstrap-icons/bootstrap-icons.css',
 'resources/css/assets/vendor/glightbox/css/glightbox.min.css',
 'resources/css/assets/vendor/swiper/swiper-bundle.min.css',
 'resources/css/assets/css/style.css'
] ,'public/front/css/main.css');

