<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'user_id' => 9,
            'nim' => '123456789',
            'gender' => 'L',
            'phone' => '08123456789',
            'address' => 'Jl. Jend. Sudirman No. 123, Jakarta Pusat, Indonesia',
            'semester' => '5',
        ]);
    }
}
