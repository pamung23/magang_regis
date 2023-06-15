<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'nama_prodi' => 'Teknologi Hasil Perkebunan',
            'nama_singkatan' => 'THP',
            'jenjang' => 'DIII',
            'jurusan_id' => 1, // ID Jurusan yang sesuai
        ]);

        Prodi::create([
            'nama_prodi' => 'Budidaya Tanaman Perkebunan',
            'nama_singkatan' => 'BTP',
            'jenjang' => 'DIII',
            'jurusan_id' => 1, // ID Jurusan yang sesuai
        ]);

        Prodi::create([
            'nama_prodi' => 'Pengelolaan Perkebunan',
            'nama_singkatan' => 'PP',
            'jenjang' => 'DIV',
            'jurusan_id' => 1, // ID Jurusan yang sesuai
        ]);
        Prodi::create([
            'nama_prodi' => 'Pengelolaan Hutan',
            'nama_singkatan' => 'PH',
            'jenjang' => 'DIII',
            'jurusan_id' => 2, // ID Jurusan yang sesuai
        ]);
        Prodi::create([
            'nama_prodi' => 'Pengelolaan Lingkungan',
            'nama_singkatan' => 'PL',
            'jenjang' => 'DIII',
            'jurusan_id' => 2, // ID Jurusan yang sesuai
        ]);
        Prodi::create([
            'nama_prodi' => 'Teknologi Geomatika',
            'nama_singkatan' => 'TG',
            'jenjang' => 'DIII',
            'jurusan_id' => 3, // ID Jurusan yang sesuai
        ]);
        Prodi::create([
            'nama_prodi' => 'Teknologi Rekayasa Perangkat Lunak',
            'nama_singkatan' => 'THP',
            'jenjang' => 'DIV',
            'jurusan_id' => 3, // ID Jurusan yang sesuai
        ]);
        Prodi::create([
            'nama_prodi' => 'Pengelolahan Hasil Hutan',
            'nama_singkatan' => 'PHH',
            'jenjang' => 'DIII',
            'jurusan_id' => 4, // ID Jurusan yang sesuai
        ]);
        Prodi::create([
            'nama_prodi' => 'Rekayasa Kayu',
            'nama_singkatan' => 'RK',
            'jenjang' => 'DIII',
            'jurusan_id' => 4, // ID Jurusan yang sesuai
        ]);
    }
}
