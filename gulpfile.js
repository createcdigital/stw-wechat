var elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

elixir.config.sourcemaps = true;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.imagemin('./resources/assets/img', 'public/img/');

    mix.copy('resources/assets/fonts', 'public/fonts');

    mix.copy('resources/assets/css', 'public/css');

    mix.copy(['bower_components/html5shiv/dist/html5shiv.min.js',
        'bower_components/respond/dest/respond.min.js',
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/js-cookie/src/js.cookie.js',
    ], 'resources/assets/js/');

    mix.scripts(['html5shiv.min.js', 'respond.min.js'], 'public/js/ie.js')
        .scripts(['jquery.min.js', 'js.cookie.js'], 'public/js/jq.js')
        .scripts('man.js', 'public/js/man.js')
        .scripts('calendar.js', 'public/js/calendar.js');
});