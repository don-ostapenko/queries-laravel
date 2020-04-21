<?php

namespace App\Providers;

use App\Services\QueryService;
use App\Services\QueryServiceInterface;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryServiceInterface::class, QueryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('menuactive', function ($segment) {
            return request()->segment(1) == $segment;
        });
    }
}
