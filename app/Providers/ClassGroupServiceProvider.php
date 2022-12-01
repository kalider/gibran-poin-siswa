<?php

namespace App\Providers;

use App\Services\ClassGroupService;
use App\Services\Impl\ClassGroupServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ClassGroupServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ClassGroupService::class => ClassGroupServiceImpl::class
    ];

    public function provides(): array
    {
        return [ClassGroupService::class];
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
