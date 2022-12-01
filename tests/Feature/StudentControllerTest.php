<?php

namespace Tests\Feature;

use Database\Seeders\StudentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;
    
    public function testCustomerPage()
    {
        $this->withSession(['username'=>'Gibran'])
             ->get('/student')
             ->assertSeeText('Siswa');
    }
    public function testStudentCreatePost()
    {
       $this->withSession(['username' => 'Gibran'])
       ->post('/student/create',[
        'nis'=>'10203010',
        'name'=>'Gibran',
        'bday'=>'2004-08-04',
        'bplace'=>'Tasikmalaya',
        'gender'=>1,
        'class_id' => 1
       ])
       ->assertRedirect('/student')
       ->assertSessionHas('success');
    }

    public function testStudentEditPost()
    {
        $this->seed(StudentSeeder::class);

        $this->withSession(['username'=>'Gibran'])
        ->post('/student/1/edit',[
            'nis'=>'10203010',
            'name'=>'Gibran Azizah',
            'bday'=>'2004-08-04',
            'bplace'=>'Tasikmalaya',
            'gender'=>1,
            'class_id' => 1
        ])
        ->assertRedirect('/student')
        ->assertSessionHas('success');
    }

    public function testStudentDelete()
    {
        $this->seed(StudentSeeder::class);

        $this->withSession(['username' => 'Gibran'])
            ->post('/student/1/delete')
            ->assertRedirect('/student')
            ->assertSessionHas('success');

    }
}