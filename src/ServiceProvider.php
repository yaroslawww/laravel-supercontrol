<?php

namespace LaravelSupercontrol;

use LaravelSupercontrol\API\Booking\ApiManager as BookingApiManager;
use LaravelSupercontrol\API\Booking\Client as BookingApiClient;
use LaravelSupercontrol\API\Legacy\ApiManager as LegacyApiManager;
use LaravelSupercontrol\API\Legacy\Client as LegacyApiClient;
use LaravelSupercontrol\API\V1\ApiManager as V1ApiManager;
use LaravelSupercontrol\API\V1\Client as V1ApiClient;
use LaravelSupercontrol\API\V3\ApiManager as V3ApiManager;
use LaravelSupercontrol\API\V3\Client as V3ApiClient;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/supercontrol.php' => config_path('supercontrol.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/supercontrol'),
            ], 'views');

            if (! class_exists('CreateSupercontrolTables')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_supercontrol_tables.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_supercontrol_tables.php'),
                ], 'migrations');
            }

            $this->commands([

            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'supercontrol');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/supercontrol.php', 'supercontrol');

        $this->app->bind(LegacyApiManager::class, function () {
            return new LegacyApiManager(new LegacyApiClient());
        });
        $this->app->bind(V1ApiManager::class, function () {
            return new V1ApiManager(new V1ApiClient());
        });
        $this->app->bind(V3ApiManager::class, function () {
            return new V3ApiManager(new V3ApiClient());
        });
        $this->app->bind(BookingApiManager::class, function () {
            return new BookingApiManager(new BookingApiClient());
        });
    }
}
