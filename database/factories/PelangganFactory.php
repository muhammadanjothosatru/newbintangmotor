<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Pelanggan::class;
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'nik' => $this->faker->unique()->randomNumber(9, false),
            'nomor_hp' => $this->faker->phoneNumber(),
            'foto_ktp' => $this->faker->imageUrl(300, 300),
            'foto_ktp2' => $this->faker->imageUrl(300, 300),
     ];
    }
}
