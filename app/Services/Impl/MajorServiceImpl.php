<?php

namespace App\Services\Impl;

use App\Services\MajorService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class MajorServiceImpl implements MajorService
{
    public function create(array $major): int
    {
       $major['created_at']= date('Y-m-d H:i:s');
       return DB::table('majors')->insertGetId($major);
    }

    public function update(int $id, array $major): bool
    {
        $major['updated_at']= date('Y-m-d H:i:s');
        return DB::table('majors')->where('id',$id)->update($major);
    }

    public function delete(int $id): bool
    {
      return DB::table('majors')->where('id',$id)->delete();
    }

    public function findAllbyPage(int $perpage = 10): LengthAwarePaginator
    {
       return DB::table('majors')->paginate($perpage); 
    }

    public function findById(int $id): object|null
    {
        return DB::table('majors')->find($id);
    }

    public function findAll(): array
    {
        return DB::table('majors')->get()->toArray();
    }
}
