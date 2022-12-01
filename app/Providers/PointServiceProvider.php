<?php

namespace App\Providers;

use App\Services\Impl\PointServiceImpl;
use App\Services\PointService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PointServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        PointService::class => PointServiceImpl::class
    ];

    public function provides(): array
    {
        return [PointService::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
