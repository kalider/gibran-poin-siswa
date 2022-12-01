<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MajorControllerTest extends TestCase
{
    use RefreshDatabase;

   public function testMajorPage()
   {
   $this->withSession(['username'=>'Gibran'])
    ->get('/major')
    ->assertSeeText('Jurusan');
  }
   

  public function testMajorCreatePost()
  {
    $this->withSession(['username'=>'Gibran'])
    ->post('/major/create',[
        'major_code'=>'J009',
        'major_name'=>'Multimedia',
        'major_leader'=>'Naruto'
    ])
    ->assertRedirect('/major')
    ->assertSessionHas('success');
  }

}
