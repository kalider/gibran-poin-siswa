<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PointControllerTest extends TestCase
{
    public function testPointPage()
    {
        $this->withSession(['username' => 'Gibran'])
        ->get('/point')
        ->assertSeeText('Poin');
    }
}
