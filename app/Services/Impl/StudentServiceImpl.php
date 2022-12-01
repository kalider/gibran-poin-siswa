<?php

namespace App\Services\Impl;

use App\Services\StudentService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class StudentServiceImpl implements StudentService
{
    public function create(array $student): int
    {
        $student['created_at'] = date('Y-m-d H:i:s');
        $student['major_id'] = 0;
        return DB::table('students')->insertGetId($student);
    }

    public function update(int $id, array $student): bool
    {
       $student['updated_at']= date('Y-m-d H:i:s');
       return DB::table('students')->where('id',$id)->update($student); 
    }

    public function delete(int $id ): bool
    {
       return DB::table('students')->where('id',$id)->delete();
    }

    public function findAllByPage(?string $q,int $perpage = 10):LengthAwarePaginator
    {
      return DB::table('students')
      ->leftJoin('classgroups','students.class_id','=','classgroups.id')
      ->leftJoin('majors','classgroups.major_id','=','majors.id')
      ->select('students.*','classgroups.class_name AS class','majors.major_name AS major')
      ->where('students.name', 'LIKE', "%{$q}%")
      ->orWhere('students.nis', 'LIKE', "%{$q}%")
      ->orWhere('classgroups.class_name', 'LIKE', "%{$q}%")
      ->orWhere('majors.major_name', 'LIKE', "%{$q}%")
      ->paginate($perpage);  
    }
    public function findById(int $id): object|null
    {
     return DB::table('students')->find($id);
    }
    public function findAll(): array
    {
        return DB::table('students')->leftJoin('classgroups','students.class_id','=','classgroups.id')->select('students.*','classgroups.class_name AS class')->get()->toArray();
    }
}
