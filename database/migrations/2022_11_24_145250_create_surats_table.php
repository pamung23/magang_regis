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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('perihal')->default('Magang Industri');
            $table->enum('status_surat_prodi', ['Pending', 'Di Setujui', 'Di Tolak'])->default('Pending');
            $table->enum('status_surat_akademik', ['Pending', 'Sudah Di Print'])->default('Pending');
            $table->enum('status_surat_akademik2', ['belum', 'Di Setujui', 'Di Tolak'])->default('belum');
            $table->foreignId('prodi_id')->constrained();
            $table->foreignId('perusahaan_id')->constrained();
            $table->unsignedBigInteger('wadir_id')->nullable();
            $table->foreign('wadir_id')->references('id')->on('wadirs')->onDelete('set null');
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
        Schema::dropIfExists('surats');
    }
};
