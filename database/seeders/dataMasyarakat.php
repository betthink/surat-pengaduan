<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class dataMasyarakat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $startDate = '1980-01-01';
        // $endDate = '2005-12-31';
        // $randomDate = Str::randomDate($startDate, $endDate);
        // $randomNumber = Str::randomNumber(15);
        for ($i = 1; $i <= 10; $i++) {
            DB::table('masyarakat')->insert([
                'nama' => 'nama' . $i,
                'username' => 'username' . $i,
                'password' => 'password' . $i,
                'alamat' => 'jl.' . $i,
                'tanggal_lahir' => '1980-01-' . $i,
                'tempat_lahir' => 'tempat_lahir' . $i,
                'nik' => $i,
            ]);
        }
    }
}
