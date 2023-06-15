<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama_mahasiswa');
            $table->string('jenis_kelamin');
            $table->string('alamat')->nullable();
            $table->integer('semester')->nullable();
            $table->enum('status_daftar', [0, 1])->default(0); //string, enumnya berjalan lancar tanpa harus di kasih nilai default
            $table->foreignId('prodi_id')->constrained('prodis')->onDelete('cascade');
            $table->string('password');
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('last_logout_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};
