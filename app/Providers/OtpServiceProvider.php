<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OtpService;
class OtpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
  
    public function register()
    {
        $this->app->singleton(OtpService::class, function ($app) {
            return new OtpService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
