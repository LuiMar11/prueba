<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RestCountriesService;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register()
    {
        $this->app->singleton(RestCountriesService::class, function ($app) {
            return new RestCountriesService(new Client());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
