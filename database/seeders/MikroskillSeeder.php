<?php

namespace Database\Seeders;

use App\Models\CplMikroskil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MikroskillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CplMikroskil::create([
            'id_kampus' => 1,
            'name' => 'Kreatif Dan Bertakwa',
            'sks' => '3',
        ]);
        CplMikroskil::create([
            'id_kampus' => 1,
            'name' => 'Inovatif Dan Rajin',
            'sks' => '2',
        ]);
        CplMikroskil::create([
            'id_kampus' => 1,
            'name' => 'Pintar Dan manajemen waktu yang baik',
            'sks' => '2',
        ]);
        CplMikroskil::create([
            'id_kampus' => 1,
            'name' => 'ini test aja',
            'sks' => '20',
        ]);
    }
}
