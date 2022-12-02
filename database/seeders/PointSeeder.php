<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->delete();
        DB::table('points')->insert([
            [
                'student_id'=>1,
                'clause_id'=>1,
                'teacher_id'=>1,
                'point_date'=>date('Y-m-d'),
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'student_id'=>1,
                'clause_id'=>1,
                'teacher_id'=>1,
                'point_date'=>date('Y-m-d'),
                'created_at'=> date('Y-m-d H:i:s')
            ],
        ]);
    }
}
