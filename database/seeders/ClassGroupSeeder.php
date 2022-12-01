<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classgroups')->delete();
        DB::table('classgroups')->insert([
            'id' => 1,
            'class_name' => 'X RPL',
            'homeroom_teacher' => 'Kim Dahyun',
            'major_id'=>1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 2,
            'class_name' => 'XI RPL',
            'homeroom_teacher' => 'Oh Haewon',
            'major_id'=>1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 3,
            'class_name' => 'XII RPL',
            'homeroom_teacher' => 'Gotou Hitori',
            'major_id'=>1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 4,
            'class_name' => 'X TKJ',
            'homeroom_teacher' => 'Loid Forger',
            'major_id'=>2,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 5,
            'class_name' => 'XI TKJ',
            'homeroom_teacher' => 'Yor Forger',
            'major_id'=>2,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 6,
            'class_name' => 'XII TKJ',
            'homeroom_teacher' => 'Anya Forger',
            'major_id'=>2,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 7,
            'class_name' => 'X TKRO',
            'homeroom_teacher' => 'Shinichi Sakurai',
            'major_id'=>3,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 8,
            'class_name' => 'XI TKRO',
            'homeroom_teacher' => 'Hana Uzaki',
            'major_id'=>3,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 9,
            'class_name' => 'XII TKRO',
            'homeroom_teacher' => 'Itushito Sakaki',
            'major_id'=>3,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 10,
            'class_name' => 'X TBSM',
            'homeroom_teacher' => 'Minatozaki Sana',
            'major_id'=>4,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' =>11,
            'class_name' => 'XI TBSM',
            'homeroom_teacher' => 'Mina Sharon Myoui',
            'major_id'=>4,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 12,
            'class_name' => 'XII TBSM',
            'homeroom_teacher' => 'Hirai Momo',
            'major_id'=>4,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 13,
            'class_name' => 'X TELLIN',
            'homeroom_teacher' => 'Zeus',
            'major_id'=>5,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 14,
            'class_name' => 'XI TELLIN',
            'homeroom_teacher' => 'Thor',
            'major_id'=>5,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 15,
            'class_name' => 'XII TELLIN',
            'homeroom_teacher' => 'Odin',
            'major_id'=>5,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 16,
            'class_name' => 'X Farmasi',
            'homeroom_teacher' => 'Satou Kazuma',
            'major_id'=>6,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 17,
            'class_name' => 'XI Farmasi',
            'homeroom_teacher' => 'Megumin',
            'major_id'=>6,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 18,
            'class_name' => 'XII Farmasi',
            'homeroom_teacher' => 'Yunyun',
            'major_id'=>6,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 19,
            'class_name' => 'X OTKP',
            'homeroom_teacher' => 'Lalisa Manoban',
            'major_id'=>7,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 20,
            'class_name' => 'XI OTKP',
            'homeroom_teacher' => 'Jennie Kim',
            'major_id'=>7,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('classgroups')->insert([
            'id' => 21,
            'class_name' => 'XII OTKP',
            'homeroom_teacher' => 'Park Chae Young',
            'major_id'=>7,
            'created_at' => date('Y-m-d H:i:s')
        ]);

    }
}
