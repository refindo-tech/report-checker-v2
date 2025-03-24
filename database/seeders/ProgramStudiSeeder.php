<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramStudi::create([
            'id_fakultas' => 1,
            'name' => 'Teknik Informatika',
        ]);
        ProgramStudi::create([
            'id_fakultas' => 1,
            'name' => 'Sistem Informasi',
        ]);
        ProgramStudi::create([
            'id_fakultas' => 2,
            'name' => 'Hukum Alam',
        ]);
        ProgramStudi::create([
            'id_fakultas' => 3,
            'name' => 'Ekonomi Makro',
        ]);
    }
}
