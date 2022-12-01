<?php

namespace App\Services\Impl;

use App\Services\ClauseService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ClauseServiceImpl implements ClauseService
{
    public function create(array $clause): int
    {
        $clause['created_at'] = date('Y-m-d H:i:s');
        return DB::table('clauses')->insertGetId($clause);
    }

    public function update(int $id, array $clause): bool
    {
        $clause['updated_at'] = date('Y-m-d H:i:s');
        return DB::table('clauses')->where('id', $id)->update($clause);
    }

    public function delete(int $id): bool
    {
        return DB::table('clauses')->where('id', $id)->delete();
    }

    public function findAllByPage(int $perpage = 10): LengthAwarePaginator
    {
        return DB::table('clauses')->paginate($perpage);
    }

    public function findById(int $id): object|null
    {
        return DB::table('clauses')->find($id);
    }
    public function findByAll(): array
    {
        return DB::table('clauses')->get()->toArray();
 
    }
}
