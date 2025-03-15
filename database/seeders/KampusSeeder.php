<?php

namespace Database\Seeders;

use App\Models\Kampus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kampus::create([
            'name' => 'Universitas Bina Bangsa',
            'address' => 'Jl. Raya Serang – Jakarta, KM. 03 No. 1B, Panancangan, Kec. Cipocok Jaya, Kota Serang, Banten 42124',
            'phone' => '(0254) 220158',
            'website' => 'www.binabangsa.ac.id',
            'fax' => '(0254) 220157',
        ]);
        Kampus::create([
            'name' => 'Universitas Faletehan',
            'address' => 'Jl. Palamunan No.72, Pelamunan, Kec. Kramatwatu, Kabupaten Serang, Banten',
            'phone' => '(0254) 230054',
            'website' => 'www.uf.ac.id',
            'fax' => '(0254) 232729',
        ]);
        Kampus::create([
            'name' => 'Universitas Islam Syekh Yusuf',
            'address' => 'Jl. Perintis Kemerdekaan No. 1, Cimone, Kota Tangerang, Banten 15117',
            'phone' => '(021) 5577 0000',
            'website' => 'www.unisyiah.ac.id',
            'fax' => '(021) 5577 0001',
        ]);
        Kampus::create([
            'name' => 'Universitas Mathlaul Anwar',
            'address' => 'Jl. Raya Labuan No. 1, Kaduhejo, Kabupaten Pandeglang, Banten 42211',
            'phone' => '(0253) 201 222',
            'website' => 'www.unma.ac.id',
            'fax' => '(0253) 201 223',
        ]);
        Kampus::create([
            'name' => 'Universitas Pamulang',
            'address' => 'Jl. Surya Kencana No. 1, Pamulang Barat, Kota Tangerang Selatan, Banten 15417',
            'phone' => '(021) 741 0000',
            'website' => 'www.unpam.ac.id',
            'fax' => '(021) 741 0001',
        ]);
        Kampus::create([
            'name' => 'Universitas Tangerang Raya',
            'address' => 'Jl. Raya Serpong No. 1, Kelapa Dua, Kabupaten Tangerang, Banten 15810',
            'phone' => '(021) 5577 0000',
            'website' => 'www.universitastr.ac.id',
            'fax' => '(021) 5577 0001',
        ]);
    }
}
