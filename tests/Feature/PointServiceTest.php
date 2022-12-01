<?php

namespace Tests\Feature;

use App\Services\PointService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class PointServiceTest extends TestCase
{
    use RefreshDatabase;

    private PointService $pointService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pointService = $this->app->make(PointService::class);
    }
}
