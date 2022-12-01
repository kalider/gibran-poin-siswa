<?php

namespace App\Services\Impl;

use App\Services\PointService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PointServiceImpl implements PointService
{
    public function create(array $point): int
    {
        $point['created_at'] = date('Y-m-d H:i:s');
        return DB::table('points')->insertGetId($point);
    }

    public function update(int $id, array $point): bool
    {
        $point['updated_at'] = date('Y-m-d H:i:s');
        return DB::table('points')->where('id', $id)->update($point);
    }

    public function delete(int $id): bool
    {
        return DB::table('points')->where('id', $id)->delete();
    }

    public function findAllByPage(int $perpage = 10): LengthAwarePaginator
    {
        return DB::table('points')
        ->leftJoin('students','points.student_id','=','students.id')
        ->leftJoin('clauses','points.clause_id','=','clauses.id')
        ->leftJoin('teachers','points.teacher_id','=','teachers.id')
        ->select('points.*','clauses.chapter AS chapter','clauses.clause_score AS score','teachers.name AS teacher','students.name AS student')
        ->paginate($perpage);
    }

    public function findById(int $id): object|null
    {
        return DB::table('points')->find($id);
    }
    public function findAll(): array
    {
        return DB::table('points')->get()->toArray();
    }
}
