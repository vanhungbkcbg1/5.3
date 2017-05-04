/**
 * Created by 749 on 2017/05/04.
 */
require('laravel-elixir-vueify');
var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.browserify('app.js');
});