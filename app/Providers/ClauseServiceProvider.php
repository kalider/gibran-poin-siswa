<?php

namespace App\Providers;

use App\Services\ClauseService;
use App\Services\Impl\ClauseServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ClauseServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ClauseService::class => ClauseServiceImpl::class
    ];

    public function provides(): array
    {
        return [ClauseService::class];
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
