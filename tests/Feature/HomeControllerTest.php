<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDashboardPage()
    {
        $this->withSession(['username' => 'Gibran'])
        ->get('/')
        ->assertSeeText('Dashboard');
    }
}
