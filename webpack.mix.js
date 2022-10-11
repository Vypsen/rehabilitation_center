const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('mix-tailwindcss');
const path = require('path');



mix.js('resources/app.js', 'public/js')
    .vue()
    .css('resources/css/app.css', 'public/css')

    .options({
        css: [tailwindcss('tailwind.config.js')],
    })
    .tailwind();

mix.alias({
    '@': path.join(__dirname, 'resources')
});
