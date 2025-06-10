<?php

namespace Glorax\FilamentRedirect;

use Illuminate\Support\ServiceProvider;

class FilamentRedirectServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/filament-redirect.php', 'filament-redirect');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/filament-redirect.php' => config_path('filament-redirect.php'),
        ], 'filament-redirect-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'filament-redirect-migrations');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament-redirect');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => base_path('lang/vendor/filament-redirect'),
        ], 'filament-redirect-lang');
    }

    public function boot(): void
    {
        //you boot methods here
    }
}
