<?php

namespace Database\Seeders;

use App\Models\MataKuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataKuliah::create([
           'id_kampus' => 1,
           'id_prodi' => 1,
           'name' => 'Pemrograman Berbasis Objek',
           'sks' => 3
        ]);
        MataKuliah::create([
           'id_kampus' => 1,
           'id_prodi' => 1,
           'name' => 'Pemrograman Berbasis Web',
           'sks' => 2
        ]);
        MataKuliah::create([
           'id_kampus' => 1,
           'id_prodi' => 1,
           'name' => 'Interaksi Manusia Dan Komputer',
           'sks' => 3
        ]);
        MataKuliah::create([
           'id_kampus' => 1,
           'id_prodi' => 1,
           'name' => 'Machine Learning',
           'sks' => 3
        ]);
        MataKuliah::create([
           'id_kampus' => 1,
           'id_prodi' => 1,
           'name' => 'Grafika Komputer',
           'sks' => 2
        ]);
        MataKuliah::create([
           'id_kampus' => 1,
           'id_prodi' => 1,
           'name' => 'Data Mining',
           'sks' => 3
        ]);
    }
}
