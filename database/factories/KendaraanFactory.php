<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'no_pol' => $this->faker->unique()->randomNumber(5, false),
            'users_id' => mt_rand(1,5),
            'nama_pemilik' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'merk' => $this->faker->name(),
            'tipe' => $this->faker->name(),
            'jenis' => $this->faker->randomElement(['Sepeda Motor','Mobil']),
            'model' => $this->faker->words(3, true),
            'tahun_pembuatan' => $this->faker->year(),
            'daya_listrik' => $this->faker->realText(rand(10, 20)),
            'no_rangka' => $this->faker->randomNumber(),
            'no_mesin' => $this->faker->randomNumber(),
            'warna' => $this->faker->colorName(),
            'tahun_registrasi' => $this->faker->year(),
            'no_bpkb' => $this->faker->randomNumber(),
            'status_kendaraan' => $this->faker->randomElement(['Tersedia']),
            'cabang' => $this->faker->randomElement(['LAMONGAN','BABAT']),
            'harga_beli' => $this->faker->numberBetween(),
            'tanggal_masuk' => $this->faker->date(),
            'supplier' => $this->faker->name(),
            'keterangan' => $this->faker->sentence(3, true)
        ];
    }
}
