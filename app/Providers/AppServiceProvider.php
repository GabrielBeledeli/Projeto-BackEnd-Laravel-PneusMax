<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PneuFactoryInterface;
use App\Reports\Factories\PneuFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
          $this->app->bind(PneuFactoryInterface::class, PneuFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
