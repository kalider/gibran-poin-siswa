<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClauseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clauses')->delete();
        DB::table('clauses')->insert([
            'id'=>1,
            'chapter' =>'1A',
            'clause_type' =>'Pelanggaran HAM Ringan',
            'clause_score' => '-20',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>2,
            'chapter' =>'2A',
            'clause_type' =>'Pelanggaran HAM Berat',
            'clause_score' => '-50',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>3,
            'chapter' =>'3A',
            'clause_type' =>'Pelanggaran Tata Tertib Ringan',
            'clause_score' => '-10',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>4,
            'chapter' =>'4A',
            'clause_type' =>'Pelanggaran Tata Tertib Berat',
            'clause_score' => '-40',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>5,
            'chapter' =>'5A',
            'clause_type' =>'Tindak Kriminal di Luar Sekolah',
            'clause_score' => '-100',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>6,
            'chapter' =>'6A',
            'clause_type' =>'Meraih Prestasi Tingkat Internasional',
            'clause_score' => '100',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>7,
            'chapter' =>'7A',
            'clause_type' =>'Meraih Prestasi Tingkat Nasional',
            'clause_score' => '90',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>8,
            'chapter' =>'8A',
            'clause_type' =>'Meraih Prestasi Tingkat Provinsi',
            'clause_score' => '60',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>9,
            'chapter' =>'9A',
            'clause_type' =>'Meraih Prestasi Tingkat Kabupaten',
            'clause_score' => '50',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>10,
            'chapter' =>'10A',
            'clause_type' =>'Meraih Prestasi Tingkat Sekolah',
            'clause_score' => '30',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('clauses')->insert([
            'id'=>11,
            'chapter' =>'11A',
            'clause_type' =>'Meraih Prestasi Tingkat Kelas',
            'clause_score' => '20',
            'created_at'=> date('Y-m-d H:i:s')
        ]);

    }
}
