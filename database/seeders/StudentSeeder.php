<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        DB::table('students')->insert([
            'id'=>1,
            'nis'=>'10206010',
            'name'=>'M Gibran Fajar',
            'bday'=>'2004-08-04',
            'bplace'=>'Tasikmalaya',
            'gender'=>'1',
            'class_id'=>3,
            'major_id'=>0,
            'created_at'=> date('Y-m-d H:i:s')
        ]);

        foreach(range(2, 30) as $id) {
            DB::table('students')->insert([
                'nis'=> fake('id_ID')->randomNumber(8, true),
                'name'=>fake('UK')->name(),
                'bday'=>fake('id_ID')->date('Y-m-d','2005-08-19'),
                'bplace'=>fake('UK')->city(),
                'gender'=>fake('id_ID')->numberBetween(1,2),
                'class_id'=>fake('id_ID')->numberBetween(1,21),
                'major_id'=>0,
                'created_at'=> date('Y-m-d H:i:s')
            ]); }

    }
}
