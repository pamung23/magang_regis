<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hurufAwalan = [
            'A' => 'Pengelolaan Hutan',
            'B' => 'Pengelolahan Hasil Hutan',
            'C' => 'Budidaya Tanaman Perkebunan',
            'D' => 'Teknologi Hasil Perkebunan',
            'E' => 'Pengelolaan Lingkungan',
            'F' => 'Teknologi Geomatika',
            'G' => 'Pengelolaan Perkebunan',
            'H' => 'Teknologi Rekayasa Perangkat Lunak',
            'J' => 'Rekayasa Kayu',
        ];

        $prodi = $this->faker->randomElement($hurufAwalan);
        $hurufAwalanProdi = array_search($prodi, $hurufAwalan);

        $nimAwalan = $hurufAwalanProdi;
        $nimAngka = $this->generateUniqueNIM();

        $semester = ($hurufAwalanProdi == 'A' || $hurufAwalanProdi == 'B' || $hurufAwalanProdi == 'C' || $hurufAwalanProdi == 'D' || $hurufAwalanProdi == 'E' || $hurufAwalanProdi == 'F') ? 5 : 7;

        $nim = $nimAwalan . $nimAngka;
        return [
            'nim' => $nim,
            'nama_mahasiswa' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'alamat' => $this->faker->address,
            'semester' => $semester,
            'status_daftar' => '0',
            'prodi_id' => function () use ($prodi) {
                return \App\Models\Prodi::where('nama_prodi', $prodi)->first()->id;
            },
            'password' => bcrypt('password'),
        ];
    }

    private function generateUniqueNIM()
    {
        $nim = null;
        $isUnique = false;

        while (!$isUnique) {
            $nim = $this->faker->numberBetween(200000000, 299999999);
            $isUnique = !Mahasiswa::where('nim', $nim)->exists();
        }

        return $nim;
    }
}
