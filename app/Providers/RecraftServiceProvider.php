<?php

namespace App\Providers;

use App\Services\Recraft\Contracts\RecraftServiceInterface;
use App\Services\Recraft\RecraftService;
use Illuminate\Support\ServiceProvider;

class RecraftServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RecraftServiceInterface::class, RecraftService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
