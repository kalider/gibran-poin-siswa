<?php

namespace Tests\Feature;

use App\Services\ClauseService;
use Database\Seeders\ClauseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class ClauseServiceTest extends TestCase
{
    use RefreshDatabase;

    private ClauseService $clauseService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clauseService = $this->app->make(ClauseService::class);
    }

    public function testCreateClause()
    {
        $this->assertIsInt($this->clauseService->create([
            'chapter' =>'1A',
            'clause_type' =>'Pelanggaran HAM Ringan',
            'clause_score' => '-20',
        ]));
    }

    public function testUpdateClause()
    {
        $this->seed(ClauseSeeder::class);

        $this->assertTrue($this->clauseService->update(1, [
            'chapter' =>'1A',
            'clause_type' =>'Pelanggaran HAK Ringan',
            'clause_score' => '-20',

        ]));
    }

    public function testDeleteClause()
    {
        $this->seed(ClauseSeeder::class);

        $this->assertTrue($this->clauseService->delete(1));
    }

    public function testGetAllTeacherWithPaging()
    {
        $this->seed(ClauseSeeder::class);
        $this->assertInstanceOf(LengthAwarePaginator::class, $this->clauseService->findAllByPage(10));
    }

    public function testGetClauseById()
    {
        $this->seed([ClauseSeeder::class]);

        $clause = $this->clauseService->findById(1);

        $this->assertIsObject($clause);
        $this->assertSame('1A', $clause->chapter);
    }

}
