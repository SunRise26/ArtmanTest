<?php

namespace App\Providers;

use App\Services\ReCaptchaService;
use Illuminate\Support\ServiceProvider;

class ReCaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ReCaptchaService', ReCaptchaService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
