<?php

namespace App\Providers;

use App\Services\Impl\MajorServiceImpl;
use App\Services\MajorService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class MajorServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        MajorService::class => MajorServiceImpl::class
    ];

    public function provides(): array
    {
        return[MajorService::class];
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
