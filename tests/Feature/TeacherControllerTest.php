<?php

namespace Tests\Feature;

use Database\Seeders\TeacherSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TeacherControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testTeacherPage()
    {
$this->withSession(['username' => 'Gibran'])
    ->get('/teacher')
    ->assertSeeText('Guru');
    }

    public function testTeacherCreatePost()
    {
        $this->withSession(['username' => 'Gibran'])
            ->post('/teacher/create', [
                'nip'=>'10304440',
                'name'=>'Jackson Wang',
                'study_name'=>'Fisika',
                'address'=>'Tasikmalaya',
                'gender'=>'1',
            ])
            ->assertRedirect('/teacher')
            ->assertSessionHas('success');
    }
    public function testTeacherEditPost()
    {
        $this->seed(TeacherSeeder::class);

        $this->withSession(['username' => 'Gibran'])
            ->post('/teacher/1/edit', [
                'nip'=>'10304440',
                'name'=>'Jackson weng',
                'study_name'=>'Kimia',
                'address'=>'Tasikmalaya',
                'gender'=>'1',
            ])
            ->assertRedirect('/teacher')
            ->assertSessionHas('success');
    }
    
    public function testTeacherDelete()
    {
        $this->seed(TeacherSeeder::class);

        $this->withSession(['username' => 'Gibran'])
            ->post('/teacher/1/delete')
            ->assertRedirect('/teacher')
            ->assertSessionHas('success');
    }


}
