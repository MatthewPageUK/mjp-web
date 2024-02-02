<?php

namespace App\Providers;

use App\Contracts\Settings;
use App\Services\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // The SettingService singleton
        $this->app->singleton(\App\Contracts\Settings::class, function () {
            return new \App\Services\Settings();
        });

        // The PageService singleton
        $this->app->singleton(PageService::class, function () {
            return new PageService();
        });

        $this->app->bind(\App\Contracts\BulletPoints::class, \App\Services\BulletPoints::class);

        $this->app->singleton(\App\Contracts\Homepage::class, function (Application $app) {
            return new \App\Services\Ui\Homepage($app->make(Settings::class));
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
