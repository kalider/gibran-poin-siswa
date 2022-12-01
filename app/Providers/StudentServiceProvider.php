<?php

namespace App\Providers;

use App\Services\Impl\StudentServiceImpl;
use App\Services\StudentService;

use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    public array $singletons = [
        StudentService::class => StudentServiceImpl::class
    ];
    
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
