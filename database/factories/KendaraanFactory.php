<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kendaraan::class;
    public function definition()
    {
        return [
            'no_pol' => $this->faker->unique()->numberBetween(),
            'users_id' => mt_rand(1,4),
            'nama_pemilik' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'merk' => $this->faker->randomNumber(),
            'tipe' => $this->faker->randomNumber(),
            'jenis' => $this->faker->randomElement(['Sepeda Motor','Mobil']),
            'model' => $this->faker->words(),
            'tahun_pembuatan' => $this->faker->year(),
            'daya_listrik' => mt_rand(100,200),
            'no_rangka' => $this->faker->randomNumber(),
            'warna' => $this->faker->colorName(),
            'tahun_registrasi' => $this->faker->year(),
            'no_bpkb' => $this->faker->randomNumber(),
            'status_kendaraan' => $this->faker->words(),
            'cabang' => $this->faker->randomElement(['LAMONGAN','BABAT']),
            'harga_beli' => $this->faker->numberBetween(),
            'tanggal_masuk' => $this->faker->date(),
            'supplier' => $this->faker->name(),
            'keterangan' => $this->faker->sentence()
        ];
    }
}
