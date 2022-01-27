<?php

namespace Dystcz\CookieConsentHistory;

use Illuminate\Support\ServiceProvider;

class CookieConsentHistoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('cookie-consent-history.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'cookie-consent-history');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-cookie-consent-history', function () {
            return new CookieConsentHistory;
        });
    }
}
