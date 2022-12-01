<?php

namespace Tests\Feature;

use App\Services\MajorService;
use Database\Seeders\MajorSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class MajorServiceTest extends TestCase
{
    use RefreshDatabase;

    private MajorService $majorService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->majorService = $this->app->make(MajorService::class);
    }

    public function testCreateMajor()
    {
        $this->assertIsInt($this->majorService->create([
            'major_code'=> 'J001',
            'major_name'=>'RPL',
            'major_leader'=>'Goku'
        ]));
    }

    public function testUpdateMajor()
    {
    $this->seed(MajorSeeder::class);

    $this->assertTrue($this->majorService->update(1,[
        'major_code'=>'K002',
        'major_name' => 'RPL',
        'major_leader'=>'Vegeta'
    ]));
    }

    public function testDeleteMajor()
    {
        $this->seed(MajorSeeder::class);
        $this->assertTrue($this->majorService->delete(1));
    }

    public function testGetAllMajorWithPaging()
    {
       $this->seed(MajorSeeder::class);
       $this->assertInstanceOf(LengthAwarePaginator::class,$this->majorService->findAllbyPage(10));
    }

    public function testGetMajorById()
    {
        $this->seed([MajorSeeder::class]);

        $major = $this->majorService->findById(1);

        $this->assertIsObject($major);

        $this->assertSame('J001',$major->major_code);
    }
}
