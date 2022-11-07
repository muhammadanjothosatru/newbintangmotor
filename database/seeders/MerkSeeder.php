<?php

namespace Database\Seeders;

use App\Models\Merk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merk::create([
            'merk' => 'Yamaha',
            'jenis' => 'Sepeda Motor',
        ]);
        Merk::create([
            'merk' => 'Toyota',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Daihatsu',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Honda',
            'jenis' => 'Sepeda Motor',
        ]);
        Merk::create([
            'merk' => 'Honda',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Hyundai',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Mitsubishi',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Suzuki',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Suzuki',
            'jenis' => 'Sepeda Motor',
        ]);
        Merk::create([
            'merk' => 'Wuling',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Nissan',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Isuzu',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Datsun',
            'jenis' => 'Mobil',
        ]);
        Merk::create([
            'merk' => 'Kawasaki',
            'jenis' => 'Sepeda Motor',
        ]);
        Merk::create([
            'merk' => 'Piaggio',
            'jenis' => 'Sepeda Motor',
        ]);
    }
}
