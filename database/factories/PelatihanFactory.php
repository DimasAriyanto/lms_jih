<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelatihan>
 */
class PelatihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->sentence(),
            'deskripsi' => fake()->paragraph(),
            'image_url' => fake()->imageUrl(),
            'modul_pelatihan' => fake()->fileExtension(),
            'tanggal_pelaksanaan' => fake()->date(),
            'tipe_pelaksanaan' => fake()->randomElement(['online', 'offline']),
            'link_online' => fake()->url(),
            'tempat_pelaksanaan' => fake()->address(),
            'jam_mulai' => fake()->time(),
            'jam_selesai' => fake()->time(),
            'jenis_pelaksanaan' => fake()->randomElement(['terbatas', 'umum']),
            'kuota' => fake()->numberBetween(10, 100),
            'tanggal_mulai_pendaftaran' => fake()->dateTimeBetween('-1 month', 'now'),
            'tanggal_akhir_pendaftaran' => fake()->dateTimeBetween('now', '+1 month'),
            'harga' => fake()->randomFloat(2, 100, 1000),
            'diskon' => fake()->numberBetween(0, 50),
            'status_pendaftaran' => fake()->randomElement(['buka', 'tutup']),
            'status_kuota' => fake()->randomElement(['tersedia', 'penuh']),
            'status_pelaksanaan' => fake()->randomElement(['selesai', 'proses', 'batal']),
            'kategori_id' => fake()->randomElement([1, 5]),
            'user_id' => fake()->randomElement([2, 3]),
        ];
    }
}
