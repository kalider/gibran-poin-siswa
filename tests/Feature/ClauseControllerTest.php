<?php

namespace Tests\Feature;

use Database\Seeders\ClauseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClauseControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testClausePage()
    {
        $this->withSession(['username' => 'Gibran'])
            ->get('/clause')
            ->assertSeeText('Pasal');
    }
    
    public function testClauseCreatePost()
    {
        $this->withSession(['username' => 'Gibran'])
            ->post('/clause/create', [
                'chapter' =>'12A',
                'clause_type' =>'Pelanggaran HAR Ringan',
                'clause_score' => '-20',    
            ])
            ->assertRedirect('/clause')
            ->assertSessionHas('success');
    }

    public function testClauseEditPost()
    {
        $this->seed(ClauseSeeder::class);

        $this->withSession(['username' => 'fatah'])
            ->post('/clause/1/edit', [
                'chapter' =>'1A',
                'clause_type' =>'Kredit',
                'clause_score' => '20',
            ])
            ->assertRedirect('/clause')
            ->assertSessionHas('success');
    }
    
    public function testClauseDelete()
    {
        $this->seed(ClauseSeeder::class);

        $this->withSession(['username' => 'Gibran'])
            ->post('/clause/1/delete')
            ->assertRedirect('/clause')
            ->assertSessionHas('success');
    }
        
}
