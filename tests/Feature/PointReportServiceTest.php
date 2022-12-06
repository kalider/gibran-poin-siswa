<?php

namespace Tests\Feature;

use App\Services\PointReportService;
use Database\Seeders\ClassGroupSeeder;
use Database\Seeders\ClauseSeeder;
use Database\Seeders\MajorSeeder;
use Database\Seeders\PointSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\TeacherSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class PointReportServiceTest extends TestCase
{
    use RefreshDatabase;

    private PointReportService $pointReportService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->pointReportService = $this->app->make(PointReportService::class);
    }

    public function testReportPointPerStudent()
    {
        $this->seed([MajorSeeder::class, ClassGroupSeeder::class, StudentSeeder::class, ClauseSeeder::class, TeacherSeeder::class, PointSeeder::class]);

        $data = $this->pointReportService->pointStudentByFilter([]);
        
        $this->assertInstanceOf(LengthAwarePaginator::class, $data);
    }
    
    public function testReportPointPerStudentFilterByNis()
    {
        $this->seed([MajorSeeder::class, ClassGroupSeeder::class, StudentSeeder::class, ClauseSeeder::class, TeacherSeeder::class, PointSeeder::class]);

        $data = $this->pointReportService->pointStudentByFilter(['nis' => '10206010']);
        
        $this->assertSame(1, $data->total());
    }
}
