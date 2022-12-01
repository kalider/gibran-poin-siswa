<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasal')->delete();
        DB::table('pasal')->insert([
            'id'=>1,
            'pasal' =>'1A',
            'jenis_pasal' =>'Pelanggaran HAM Ringan',
            'nilai_pasal' => '-20',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>2,
            'pasal' =>'2A',
            'jenis_pasal' =>'Pelanggaran HAM Berat',
            'nilai_pasal' => '-50',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>3,
            'pasal' =>'3A',
            'jenis_pasal' =>'Pelanggaran Tata Tertib Ringan',
            'nilai_pasal' => '-10',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>4,
            'pasal' =>'4A',
            'jenis_pasal' =>'Pelanggaran Tata Tertib Berat',
            'nilai_pasal' => '-40',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>5,
            'pasal' =>'5A',
            'jenis_pasal' =>'Tindak Kriminal di Luar Sekolah',
            'nilai_pasal' => '-100',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>6,
            'pasal' =>'6A',
            'jenis_pasal' =>'Meraih Prestasi Tingkat Internasional',
            'nilai_pasal' => '100',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>7,
            'pasal' =>'7A',
            'jenis_pasal' =>'Meraih Prestasi Tingkat Nasional',
            'nilai_pasal' => '90',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>8,
            'pasal' =>'8A',
            'jenis_pasal' =>'Meraih Prestasi Tingkat Provinsi',
            'nilai_pasal' => '60',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>9,
            'pasal' =>'9A',
            'jenis_pasal' =>'Meraih Prestasi Tingkat Kabupaten',
            'nilai_pasal' => '50',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>10,
            'pasal' =>'10A',
            'jenis_pasal' =>'Meraih Prestasi Tingkat Sekolah',
            'nilai_pasal' => '30',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('pasal')->insert([
            'id'=>11,
            'pasal' =>'11A',
            'jenis_pasal' =>'Meraih Prestasi Tingkat Kelas',
            'nilai_pasal' => '20',
            'created_at'=> date('Y-m-d H:i:s')
        ]);

    }
}
