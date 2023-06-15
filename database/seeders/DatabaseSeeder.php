<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Wadir::factory()->create([
            'nip' => '19700830 199703 1 001',
            'nama' => 'Dr. Heriad Daud Salusu S. Hut. MP',
            'jabatan' => 'Wakil Direktur I',
        ]);

        \App\Models\Wadir::factory()->create([
            'nip' => '19750808 199903 2 002',
            'nama' => 'Eva Nurmarini S. Hut. MP',
            'jabatan' => 'Wakil Direktur II',
        ]);

        \App\Models\Wadir::factory()->create([
            'nip' => '19790613 200812 1 003',
            'nama' => 'Husmul Beze S. Hut. M.Si',
            'jabatan' => 'Wakil Direktur III',
        ]);

        \App\Models\Wadir::factory()->create([
            'nip' => '19830719 200912 1 007',
            'nama' => 'Yulianto S. Kom. M.MT',
            'jabatan' => 'Wakil Direktur IV',
        ]);
        \App\Models\Jurusan::factory()->create([
            'nama_jurusan' => 'Perkebunan',
        ]);
        \App\Models\Jurusan::factory()->create([
            'nama_jurusan' => 'Manajemen Hutan',
        ]);
        \App\Models\Jurusan::factory()->create([
            'nama_jurusan' => 'Teknik Dan Informatika',
        ]);
        \App\Models\Jurusan::factory()->create([
            'nama_jurusan' => 'Teknologi Hasil Hutan',
        ]);
        $this->call(ProdiSeeder::class);
        \App\Models\Mahasiswa::factory(500)->create();
        \App\Models\Perusahaan::factory(100)->create();

        \App\Models\User::create([
            'nama' => 'akademik',
            'role' => 'akademik',
            'email' => 'akademik@email.com',
            'prodi_id' => null,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodithp',
            'role' => 'kaprodi',
            'email' => 'kaprodithp@email.com',
            'prodi_id' => 1,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodibtp',
            'role' => 'kaprodi',
            'email' => 'kaprodibtp@email.com',
            'prodi_id' => 2,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodipp',
            'role' => 'kaprodi',
            'email' => 'kaprodipp@email.com',
            'prodi_id' => 3,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodiph',
            'role' => 'kaprodi',
            'email' => 'kaprodiph@email.com',
            'prodi_id' => 4,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodipl',
            'role' => 'kaprodi',
            'email' => 'kaprodipl@email.com',
            'prodi_id' => 5,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaproditg',
            'role' => 'kaprodi',
            'email' => 'kaproditg@email.com',
            'prodi_id' => 6,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaproditrpl',
            'role' => 'kaprodi',
            'email' => 'kaproditrpl@email.com',
            'prodi_id' => 7,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodiphh',
            'role' => 'kaprodi',
            'email' => 'kaprodiphh@email.com',
            'prodi_id' => 8,
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::create([
            'nama' => 'kaprodirk',
            'role' => 'kaprodi',
            'email' => 'kaprodirk@email.com',
            'prodi_id' => 9,
            'password' => bcrypt('password'),
        ]);
    }
}
