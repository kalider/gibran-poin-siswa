<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('majors')->delete();
       DB::table('majors')->insert([
        'id'=>1,
        'major_code'=>'J001',
        'major_name'=>'RPL',
        'major_leader'=>'Bruce Wayne',
        'created_at' => date('Y-m-d H:i:s')
       ]);

       DB::table('majors')->insert([
        'id'=>2,
        'major_code'=>'J002',
        'major_name'=>'TKJ',
        'major_leader'=>'Son Goku',
        'created_at' => date('Y-m-d H:i:s')
       ]);

       DB::table('majors')->insert([
        'id'=>3,
        'major_code'=>'J003',
        'major_name'=>'TKRO',
        'major_leader'=>'Saitama',
        'created_at' => date('Y-m-d H:i:s')
       ]);

       DB::table('majors')->insert([
        'id'=>4,
        'major_code'=>'J004',
        'major_name'=>'TBSM',
        'major_leader'=>'Rimuru',
        'created_at' => date('Y-m-d H:i:s')
       ]);

       DB::table('majors')->insert([
        'id'=>5,
        'major_code'=>'J005',
        'major_name'=>'TELLIN',
        'major_leader'=>'God Enel',
        'created_at' => date('Y-m-d H:i:s')
       ]);

       DB::table('majors')->insert([
        'id'=>6,
        'major_code'=>'J006',
        'major_name'=>'Farmasi',
        'major_leader'=>'Chopper',
        'created_at' => date('Y-m-d H:i:s')
       ]);

       DB::table('majors')->insert([
        'id'=>7,
        'major_code'=>'J007',
        'major_name'=>'OTKP',
        'major_leader'=>'Senku',
        'created_at' => date('Y-m-d H:i:s')
       ]);

      
    }
}
