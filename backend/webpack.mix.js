const mix = require('laravel-mix');

mix.ts('resources/ts/app.tsx', 'public/js')
.sass('resources/sass/app.scss', 'public/css');

if (mix.inProduction()){
    mix.version();
}
