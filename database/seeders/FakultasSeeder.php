<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fakultas::create([
            'id_kampus' => 1,
            'name' => 'Teknik',
        ]);
        Fakultas::create([
            'id_kampus' => 1,
            'name' => 'Hukum',
        ]);
        Fakultas::create([
            'id_kampus' => 1,
            'name' => 'Ekonomi',
        ]);
        Fakultas::create([
            'id_kampus' => 1,
            'name' => 'Ilmu Komputer',
        ]);
    }
}
