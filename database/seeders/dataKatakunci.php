<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dataKatakunci extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
        for ($i = 1; $i <= 10; $i++) {
            DB::table('kata_kunci')->insert([
                'kata' => 'kata' . $i,
                'kategori' => 'kategori' . $i,
                'keterangan' => 'keterangan' . $i,
            ]);
        }
    }
}
