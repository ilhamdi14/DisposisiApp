<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MemoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tujuan' => fake()->sentence(),
            'perihal' => fake()->sentence(),
            'sifat_surat' => fake()->randomElement(['Biasa', 'Rahasia', 'Sangat Rahasia']),
            'file' => fake()->sentence(),
            'isi_surat' => fake()->paragraphs(2),
            'tgl_surat' => fake()->dateTime(),
            'no_surat' => fake()->numerify('no-####'),
            'status' => fake()->randomElement(['Dibuat', 'Diproses', 'Selesai']),
        ];
    }
}
