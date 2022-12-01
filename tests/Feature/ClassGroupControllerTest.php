<?php

namespace Tests\Feature;

use Database\Seeders\ClassGroupSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassGroupControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testClassGroupPage()
    {
        $this->withSession(['username' => 'Gibran'])
            ->get('/classgroup')
            ->assertSeeText('Kelas');
    }

    public function testClassGroupCreatePost()
    {
        $this->withSession(['username'=> 'Gibran'])
        ->post('/classgroup/create',[
            'class_name' => 'RPL4',
            'homeroom_teacher' => 'Jihyo',
            'major_id' => 1
        ])
        ->assertRedirect('/classgroup')
        ->assertSessionHas('success');
    }

    public function testClassGroupEditPost()
    {
        $this->seed(ClassGroupSeeder::class);

        $this->withSession(['username' => 'Gibran'])
            ->post('/classgroup/1/edit', [
                'class_name' => 'TIK7',
                'homeroom_teacher' => 'Hana Uzaki',
                'major_id' => 1
            ])
            ->assertRedirect('/classgroup')
            ->assertSessionHas('success');
    }
    
    public function testClassGroupDelete()
    {
        $this->seed(ClassGroupSeeder::class);

        $this->withSession(['username' => 'Gibran'])
            ->post('/classgroup/1/delete')
            ->assertRedirect('/classgroup')
            ->assertSessionHas('success');
    }

}
