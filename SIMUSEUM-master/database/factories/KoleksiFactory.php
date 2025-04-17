<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Koleksi>
 */
class KoleksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_koleksi' => $this->faker->unique()->randomNumber(5),
            'nama_koleksi' => $this->faker->words(3, true),
            'jenis_koleksi' => $this->faker->randomElement(['Buku', 'Lukisan', 'Pahatan', 'Keramik']),
            'ukuran' => json_encode([
                'panjang' => $this->faker->numberBetween(10, 100),
                'lebar' => $this->faker->numberBetween(5, 50),
                'tinggi' => $this->faker->numberBetween(2, 30),
            ]),
            'deskripsi' => $this->faker->paragraph(3),
            'asal' => $this->faker->city,
            'keadaan' => $this->faker->randomElement(['Baik', 'Rusak', 'Sedang']),
            'gambar' => null, // Ubah menjadi path gambar jika ada
        ];
    }
}
