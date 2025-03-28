<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat permission dengan spatie models
        Permission::create(['name' => 'tambah-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'hapus-user']);
        Permission::create(['name' => 'lihat-user']);

        Permission::create(['name' => 'tambah-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'hapus-role']);
        Permission::create(['name' => 'lihat-role']);

        Permission::create(['name' => 'tambah-permission']);
        Permission::create(['name' => 'edit-permission']);
        Permission::create(['name' => 'hapus-permission']);
        Permission::create(['name' => 'lihat-permission']);

        Permission::create(['name' => 'tambah-laporan-akhir']);
        Permission::create(['name' => 'edit-laporan-akhir']);
        Permission::create(['name' => 'hapus-laporan-akhir']);
        Permission::create(['name' => 'lihat-laporan-akhir']);
        Permission::create(['name' => 'review-laporan-akhir']);

        Permission::create(['name' => 'tambah-mikroskill']);
        Permission::create(['name' => 'edit-mikroskill']);
        Permission::create(['name' => 'hapus-mikroskill']);
        Permission::create(['name' => 'lihat-mikroskill']);

        Permission::create(['name' => 'tambah-kampus']);
        Permission::create(['name' => 'edit-kampus']);
        Permission::create(['name' => 'hapus-kampus']);
        Permission::create(['name' => 'lihat-kampus']);

        Permission::create(['name' => 'tambah-programstudi']);
        Permission::create(['name' => 'edit-programstudi']);
        Permission::create(['name' => 'hapus-programstudi']);
        Permission::create(['name' => 'lihat-programstudi']);

        Permission::create(['name' => 'tambah-fakultas']);
        Permission::create(['name' => 'edit-fakultas']);
        Permission::create(['name' => 'hapus-fakultas']);
        Permission::create(['name' => 'lihat-fakultas']);

        Permission::create(['name' => 'tambah-matakuliah']);
        Permission::create(['name' => 'edit-matakuliah']);
        Permission::create(['name' => 'hapus-matakuliah']);
        Permission::create(['name' => 'lihat-matakuliah']);

        Permission::create(['name' => 'tambah-assessment']);
        Permission::create(['name' => 'edit-assessment']);
        Permission::create(['name' => 'hapus-assessment']);
        Permission::create(['name' => 'lihat-assessment']);
        Permission::create(['name' => 'print-assessment']);

        // buat role dengan spatie models
        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'AdminPT']);
        Role::create(['name' => 'Prodi']);
        Role::create(['name' => 'Mahasiswa']);

        // cari role berdasarkan name
        $roleSuperAdmin = Role::findByName('SuperAdmin');
        $roleAdmin = Role::findByName('AdminPT');
        $roleProdi = Role::findByName('Prodi');
        $roleMahasiswa = Role::findByName('Mahasiswa');

        // memberikan permission ke role
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleAdmin->givePermissionTo('hapus-laporan-akhir');
        $roleAdmin->givePermissionTo('lihat-laporan-akhir');
        $roleAdmin->givePermissionTo('review-laporan-akhir');

        $roleAdmin->givePermissionTo('lihat-role');
        $roleAdmin->givePermissionTo('lihat-permission');

        $roleAdmin->givePermissionTo('tambah-mikroskill');
        $roleAdmin->givePermissionTo('edit-mikroskill');
        $roleAdmin->givePermissionTo('hapus-mikroskill');
        $roleAdmin->givePermissionTo('lihat-mikroskill');

        $roleAdmin->givePermissionTo('tambah-matakuliah');
        $roleAdmin->givePermissionTo('edit-matakuliah');
        $roleAdmin->givePermissionTo('hapus-matakuliah');
        $roleAdmin->givePermissionTo('lihat-matakuliah');

        $roleAdmin->givePermissionTo('tambah-programstudi');
        $roleAdmin->givePermissionTo('edit-programstudi');
        $roleAdmin->givePermissionTo('hapus-programstudi');
        $roleAdmin->givePermissionTo('lihat-programstudi');

        $roleAdmin->givePermissionTo('tambah-fakultas');
        $roleAdmin->givePermissionTo('edit-fakultas');
        $roleAdmin->givePermissionTo('hapus-fakultas');
        $roleAdmin->givePermissionTo('lihat-fakultas');

        $roleAdmin->givePermissionTo('tambah-kampus');
        $roleAdmin->givePermissionTo('edit-kampus');
        $roleAdmin->givePermissionTo('lihat-kampus');
        $roleAdmin->givePermissionTo('print-assessment');




        $roleProdi->givePermissionTo('review-laporan-akhir');
        $roleProdi->givePermissionTo('lihat-laporan-akhir');

        $roleProdi->givePermissionTo('tambah-mikroskill');
        $roleProdi->givePermissionTo('edit-mikroskill');
        $roleProdi->givePermissionTo('lihat-mikroskill');

        $roleProdi->givePermissionTo('tambah-assessment');
        $roleProdi->givePermissionTo('edit-assessment');
        $roleProdi->givePermissionTo('lihat-assessment');
        $roleProdi->givePermissionTo('hapus-assessment');
        $roleProdi->givePermissionTo('print-assessment');

        $roleProdi->givePermissionTo('lihat-kampus');

        $roleProdi->givePermissionTo('tambah-matakuliah');
        $roleProdi->givePermissionTo('edit-matakuliah');
        $roleProdi->givePermissionTo('hapus-matakuliah');
        $roleProdi->givePermissionTo('lihat-matakuliah');


        $roleMahasiswa->givePermissionTo('tambah-laporan-akhir');
        $roleMahasiswa->givePermissionTo('lihat-laporan-akhir');
        $roleMahasiswa->givePermissionTo('print-assessment');

        $roleSuperAdmin->givePermissionTo(Permission::all());
    }
}
