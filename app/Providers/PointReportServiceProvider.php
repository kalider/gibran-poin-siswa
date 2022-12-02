<?php

namespace App\Providers;

use App\Services\Impl\PointReportServiceImpl;
use App\Services\PointReportService;
use Illuminate\Support\ServiceProvider;

class PointReportServiceProvider extends ServiceProvider
{
    public array $singletons = [
        PointReportService::class => PointReportServiceImpl::class
    ];

    public function provides(): array
    {
        return [PointReportService::class];
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
