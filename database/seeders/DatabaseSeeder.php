<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            KampusSeeder::class,
            FakultasSeeder::class,
            ProgramStudiSeeder::class,
            MataKuliahSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            AppProfileSeeder::class,
            AppFiturSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
        ]);
    }
}
