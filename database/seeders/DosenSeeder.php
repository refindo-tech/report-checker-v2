<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'user_id' => 8,
            'nip' => '123456789',
            'gender' => 'L',
            'phone' => '08123456789',
            'address' => 'Jl. Jend. Sudirman No. 123, Jakarta Pusat, Indonesia',
        ]);
    }
}
