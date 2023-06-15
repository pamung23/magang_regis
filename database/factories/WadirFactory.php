<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wadir>
 */
class WadirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->unique()->randomElement([
                '19700830 199703 1 001',
                '19750808 199903 2 002',
                '19790613 200812 1 003',
                '19830719 200912 1 007'
            ]),
            'nama' => $this->faker->unique()->randomElement([
                'Dr. Heriad Daud Salusu S. Hut. MP',
                'Eva Nurmarini S. Hut. MP',
                'Husmul Beze S. Hut. M.Si',
                'Yulianto S. Kom. M.MT'
            ]),
            'jabatan' => $this->faker->unique()->randomElement([
                'Wakil Direktur I',
                'Wakil Direktur II',
                'Wakil Direktur III',
                'Wakil Direktur IV'
            ]),
        ];
    }
}
