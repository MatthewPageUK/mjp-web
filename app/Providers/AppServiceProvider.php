<?php

namespace App\Providers;

use App\Services\SettingService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // The SettingService singleton
        $this->app->singleton(SettingService::class, function () {
            return new SettingService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share the settings variable on all views
        View::share('settings', app(SettingService::class));
    }
}
