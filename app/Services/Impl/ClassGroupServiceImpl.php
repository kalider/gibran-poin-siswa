<?php

namespace App\Services\Impl;

use App\Services\ClassGroupService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ClassGroupServiceImpl implements ClassGroupService
{
    public function create(array $classgroup): int
    {
        $classgroup['created_at'] = date('Y-m-d H:i:s');
        return DB::table('classgroups')->insertGetId($classgroup);
    }

    public function update(int $id, array $classgroup): bool
    {
        $classgroup['updated_at'] = date('Y-m-d H:i:s');
        return DB::table('classgroups')->where('id', $id)->update($classgroup);
    }

    public function delete(int $id): bool
    {
        return DB::table('classgroups')->where('id', $id)->delete();
    }

    public function findAllByPage(int $perpage = 10): LengthAwarePaginator
    {
        return DB::table('classgroups')
                    ->leftJoin('majors','classgroups.major_id','=','majors.id')
                    ->select('classgroups.*','majors.major_name AS major')
                    ->paginate($perpage);
    }

    public function findById(int $id): object|null
    {
        return DB::table('classgroups')->find($id);
    }

    public function findAll(): array
    {
        return DB::table('classgroups')->get()->toArray();
    }
    
}
