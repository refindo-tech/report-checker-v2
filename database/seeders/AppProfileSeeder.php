<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('app_profiles')->insert([
            [
                'app_nama' => 'Simikro',
                'app_deskripsi' => 'Simikro adalah sebuah sistem digital yang dirancang untuk mempermudah evaluasi capaian microskill dalam program Merdeka Belajar Kampus Merdeka (MBKM). Aplikasi ini menyediakan mekanisme yang transparan dan efisien bagi mahasiswa dan dosen dalam menilai, melacak, serta mengonversi capaian microskill ke dalam Sistem Kredit Semester (SKS).',
                'app_tahun' => 2025,
                'app_pengembang' => 'Tim Pengembang',
                'app_icon' => 'simikro2.png',
                'app_logo' => 'simikro2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
