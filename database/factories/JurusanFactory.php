<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jurusan;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wadir>
 */
class JurusanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Jurusan::class;

    public function definition()
    {
        return [
            'nama_jurusan' => $this->faker->unique()->randomElement([
                'Perkebunan',
                'Manajemen Hutan',
                'Teknik Dan Informatika',
                'Teknologi Hasi Hutan'
            ]),
        ];
    }
}
