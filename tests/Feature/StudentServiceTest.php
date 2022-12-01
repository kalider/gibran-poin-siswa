<?php

namespace Tests\Feature;

use App\Services\StudentService;
use Database\Seeders\StudentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class StudentServiceTest extends TestCase
{
    use RefreshDatabase;
    private StudentService $studentService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->studentService = $this->app->make(StudentService::class);
    }
    
    public function testCreateStudent()
    {
       $this->seed(StudentSeeder::class);

       $this->assertIsInt($this->studentService->create([
            'nis' => '10201061',
            'name' => 'Yustina',
            'bday' => '2005-08-19',
            'bplace' => 'Jakarta',
            'gender' => '2',
            'class_id' => '0',
            'major_id' => '0'

       ]));
    }

    public function testUpdateStudent()
    {
        $this->seed(StudentSeeder::class);

        $this->assertTrue($this->studentService->update(1,[
            'nis'=> '12121121',
            'name'=> 'Iban',
            'bday'=>'2005-08-29',
            'bplace'=>'Jakarta'
        ]));
    }

    public function testDeleteStudent()
    {
        $this->seed(StudentSeeder::class);

        $this->assertTrue($this->studentService->delete(1));
    }

    public function testGetAllStudentWithPaging()
    {
        $this->seed(StudentSeeder::class);
        $this->assertInstanceOf(LengthAwarePaginator::class,
        $this->studentService->findAllByPage(10));
    }

    public function testGetStudentById()
    {
        $this->seed([StudentSeeder::class]);

        $student = $this->studentService->findById(1);

        $this->assertIsObject($student);
        $this->assertSame('M Gibran Fajar', $student->name);
    }
    public function testCustomerCategoryFindAll()
    {
        $this->seed(StudentSeeder::class);

        $this->assertIsArray($this->studentService->findAll());
    }

}
