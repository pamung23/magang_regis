<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perusahaan>
 */
class PerusahaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_perusahaan' => $this->faker->company,
            'alamat_perusahaan' => $this->faker->address,
            'kota_kecamatan' => $this->faker->city,
            'email' => $this->faker->unique()->safeEmail,
            'no_perusahaan' => $this->faker->phoneNumber,
            'no_telpn_contact_person' => $this->faker->phoneNumber,
        ];
    }
}
