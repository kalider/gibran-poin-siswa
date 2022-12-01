<?php

namespace Tests\Feature;

use App\Services\ClassGroupService;
use Database\Seeders\ClassGroupSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ClassGroupServiceTest extends TestCase
{
    use RefreshDatabase;

    private ClassGroupService $classgroupService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->classgroupService = $this->app->make(ClassGroupService::class);
    }

    public function testCreateClassGroup()
    {
        $this->assertIsInt($this->classgroupService->create([
            'class_name' => 'RPL2',
            'homeroom_teacher' => 'asep jemping',
            'major_id'=>0
        ]));
    }

   public function testUpdateClassGroup()
   {
    $this->seed(ClassGroupSeeder::class);

    $this->assertTrue($this->classgroupService->update(1,[
        'class_name' => 'RPL1',
        'homeroom_teacher' => 'Genji'
    ]));
   }

   public function testDeleteClass()
   {
    $this->seed(ClassGroupSeeder::class);

    $this->assertTrue($this->classgroupService->delete(1));
   }

   public function testGetAllClassGroupWithPaging()
   {
    $this->seed(ClassGroupSeeder::class);
    $this->assertInstanceOf(LengthAwarePaginator::class,$this->classgroupService->findAllByPage(10));
   }

   public function testGetClassGroupById()
   {
    $this->seed([ClassGroupSeeder::class]);

    $classgroup = $this->classgroupService->findById(1);

    $this->assertIsObject($classgroup);
    $this->assertSame('X RPL',$classgroup->class_name);
   }
   public function testFindAll()
   {
       $this->seed(ClassGroupSeeder::class);

       $this->assertIsArray($this->classgroupService->findAll());
   }
}
