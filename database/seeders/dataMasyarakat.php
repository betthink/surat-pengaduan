<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class dataMasyarakat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisKelaminOptions = ['Laki-laki', 'Perempuan'];
        $faker = Faker::create();
        $jenisKelaminOptions = ['Laki-laki', 'Perempuan'];
        foreach (range(1, 10) as $index) {
            DB::table('masyarakat')->insert([
                'nama' => $faker->name(),
                'username' =>  $faker->userName(),
                'password' => bcrypt('123456'),
                'alamat' =>  $faker->address(),
                'tanggal_lahir' =>  $faker->date(),
                'tempat_lahir' =>  $faker->address(),
                'nik' => $faker->randomNumber(),
                'nomor_telp' => '+628' . $faker->numberBetween($minDigits = 10, $maxDigits = 12),
                'jenis_kelamin' => $faker->randomElement($jenisKelaminOptions),
            ]);
        }
    }
}
