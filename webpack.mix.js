const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .scripts([
        'node_modules/jquery/dist/jquery.min.js',
    ], 'public/js/all.js');
