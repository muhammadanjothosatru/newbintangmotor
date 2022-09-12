<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Navigation;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Dashboard',
            'url' => 'dashboard',
            'icon' => 'fas fa-fire',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Kendaraan',
            'url' => 'kendaraan',
            'icon' => 'fas fa-light fa-car-side',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Tambah-Kendaraan',
            'url' => 'kendaraan/create',
            'icon' => 'fas fa-light fa-car-side',
            'main_menu' => 2,
        ]);
        Navigation::create([
            'name' => 'Detail-Kendaraan',
            'url' => 'kendaraan/detail',
            'icon' => 'fas fa-light fa-car-side',
            'main_menu' => 2,
        ]);
        Navigation::create([
            'name' => 'Pelanggan',
            'url' => 'pelanggan',
            'icon' => 'fas fa-light fa-user',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Tambah-Pelanggan',
            'url' => 'pelanggan/create',
            'icon' => 'fas fa-light fa-user',
            'main_menu' => 3,
        ]);
        Navigation::create([
            'name' => 'Detail-Pelanggan',
            'url' => 'pelanggan/edit',
            'icon' => 'fas fa-light fa-user',
            'main_menu' => 3,
        ]);
        Navigation::create([
            'name' => 'Transaksi',
            'url' => 'transaksi',
            'icon' => 'fas fa-light fa-file',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Laporan',
            'url' => 'laporan',
            'icon' => 'fas fa-folder',
            'main_menu' => null,
        ]);
        Navigation::create([
            'name' => 'Administrasi',
            'url' => 'administrasi',
            'icon' => 'fas fa-users',
            'main_menu' => null,
        ]);
    }
}
