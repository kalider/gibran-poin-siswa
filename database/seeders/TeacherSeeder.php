<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('teachers')->delete();
    DB::table('teachers')->insert([
        'id'=>1,
        'nip'=>'10304440',
        'name'=>'Jackson Wang',
        'study_name'=>'Fisika',
        'address'=>'Tasikmalaya',
        'gender'=>'1',
        'created_at'=> date('Y-m-d H:i:s')
    ]);
    foreach(range(2, 20) as $id) {
        DB::table('teachers')->insert([
            'nip'=> fake('id_ID')->randomNumber(8, true),
            'name'=>fake('UK')->name(),
            'study_name'=>fake('UK')->jobTitle(),
            'address'=>fake('UK')->city(),
            'gender'=>fake('id_ID')->numberBetween(1,2),
            'created_at'=> date('Y-m-d H:i:s')
        ]); }
    }
}
